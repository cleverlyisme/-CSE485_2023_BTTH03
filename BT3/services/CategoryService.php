<?php
class CategoryService
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get($id)
    {
        $sql = "SELECT ma_tloai, ten_tloai FROM theloai WHERE ma_tloai=:ma_tloai;";

        $arguments = ['ma_tloai' => $id];

        $categoryDB = $this->db->runSQL($sql, $arguments)->fetch();

        $category = new Category($categoryDB['ma_tloai'], $categoryDB['ten_tloai']);

        return $category;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM theloai;";

        $categoriesDB = $this->db->runSQL($sql)->fetchAll();

        $categories = array_map(function ($categoryDB) {
            $category = new Category($categoryDB['ma_tloai'], $categoryDB['ten_tloai']);

            return $category;
        }, $categoriesDB);

        return $categories;
    }

    public function getCount()
    {
        $sql = "SELECT COUNT(*) as count FROM theloai;";

        return $this->db->runSql($sql)->fetch()['count'];
    }

    public function insert()
    {
        if (isset($_POST)) {
            $ten_tloai = $_POST["ten_tloai"];

            if ($ten_tloai == '') {
                header("Location: ../add_category?error='Giá trị không hợp lệ'");
                exit();
            }

            $sql = "INSERT INTO theloai (ten_tloai) VALUE (:ten_tloai);";

            $arguments = ['ten_tloai' => $ten_tloai];

            $result = $this->db->runSQL($sql, $arguments);

            if ($result) {
                header("Location: ../categories");
                exit();
            }
            header("Location: ../add_category?error='Thêm thất bại'");
            exit();
        }
    }

    public function update()
    {
        if (isset($_POST)) {
            $ma_tloai = $_POST["ma_tloai"];
            $ten_tloai = $_POST["ten_tloai"];

            if ($ten_tloai == '') {
                header("Location: ../edit_category?id=$ma_tloai&error='Giá trị không hợp lệ'");
                exit();
            }

            $sql = "UPDATE theloai SET ten_tloai=:ten_tloai WHERE ma_tloai=:ma_tloai;";

            $arguments = ['ma_tloai' => $ma_tloai, 'ten_tloai' => $ten_tloai];

            $result = $this->db->runSql($sql, $arguments);

            if ($result) {
                header("Location: ../categories");
                exit();
            }
            header("Location: ../edit_category?id=$ma_tloai&error='Giá trị không hợp lệ'");
            exit();
        }
    }


    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            header("Location: ../categories");
            exit();
        }

        $sql = "DELETE FROM theloai WHERE ma_tloai=:ma_tloai;";

        $arguments = ['ma_tloai' => $id];

        $result = $this->db->runSql($sql, $arguments);

        if ($result) {
            header("Location: ../categories");
            exit();
        }
        header("Location: ../categories?error='Xóa thất bại'");
        exit();
    }
}
