<?php
class AuthorService
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get($id)
    {
        $sql = "SELECT ma_tgia, ten_tgia, hinh_tgia FROM tacgia WHERE ma_tgia=:ma_tgia;";

        $arguments = ['ma_tgia' => $id];

        $authorDB = $this->db->runSql($sql, $arguments)->fetch();

        $author = new Author($authorDB['ma_tgia'], $authorDB['ten_tgia'], $authorDB['hinh_tgia']);

        return $author;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM tacgia;";

        $authorsDB = $this->db->runSql($sql)->fetchAll();

        $authors = array_map(function ($authorDB) {
            $author = new Author($authorDB['ma_tgia'], $authorDB['ten_tgia'], $authorDB['hinh_tgia']);

            return $author;
        }, $authorsDB);

        return $authors;
    }

    public function getCount()
    {
        $sql = "SELECT COUNT(*) as count FROM tacgia;";

        return $this->db->runSql($sql)->fetch()['count'];
    }

    public function insert()
    {
        $target_dir = "./assets/images/author/";
        $target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (isset($_POST)) {
            $ten_tgia = $_POST["ten_tgia"];

            if ($ten_tgia == '') {
                header("Location: ../add_author?error='Giá trị không hợp lệ'");
                exit();
            }

            if (!basename($_FILES["imgUpload"]["name"])) {
                $sql = "INSERT INTO tacgia (ten_tgia) VALUE (:ten_tgia);";

                $arguments = ['ten_tgia' => $ten_tgia];

                $result = $this->db->runSql($sql, $arguments);

                if ($result) {
                    header("Location: ../authors");
                    exit();
                }

                header("Location: ../authors?error='Thêm thất bại'");
                exit();
            } else {
                $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);

                if (!$check)
                    header("Location: ../add_author?error='Ảnh không hợp lệ'");
                exit();

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    header("Location: ../add_author?error='Ảnh không hợp lệ'");
                    exit();
                }

                if (move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $target_file)) {
                    $sql = "INSERT INTO tacgia (ten_tgia, hinh_tgia) VALUE (:ten_tgia, :hinh_tgia);";

                    $arguments = [
                        'ten_tgia' => $ten_tgia,
                        'hinh_tgia' => basename($_FILES["imgUpload"]["name"])
                    ];

                    $result = $this->db->runSQL($sql, $arguments);

                    if ($result) {
                        header("Location: ../authors");
                        exit();
                    }
                    header("Location: ../add_category?error='Thêm thất bại'");
                    exit();
                }

                header("Location: ../add_category?error='Thêm thất bại'");
                exit();
            }
        }
    }

    public function update()
    {
        $target_dir = './assets/images/authors/';
        $target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST["submit"])) {
            $ma_tgia = $_POST["ma_tgia"];
            $ten_tgia = $_POST["ten_tgia"];

            if ($ten_tgia == '') {
                header("Location: ?controller=author&action=edit&id=$ma_tgia&error='Giá trị không hợp lệ'");
                exit();
            }

            if (!basename($_FILES["imgUpload"]["name"])) {
                $sql = "UPDATE tacgia SET ten_tgia=:ten_tgia WHERE ma_tgia=:ma_tgia;";

                $arguments = ['ma_tgia' => $ma_tgia, 'ten_tgia' => $ten_tgia,];

                $result =  $this->db->runSQL($sql, $arguments);

                if ($result) {
                    header("Location: ../authors");
                    exit();
                }
                header("Location: ../edit_author?id=$ma_tgia&error='Cập nhật thất bại'");
                exit();
            } else {
                $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);
                if (!$check) {
                    header("Location: ../edit_author?id=$ma_tgia&error='Ảnh không hợp lệ'");
                    exit();
                }

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    header("Location: ../edit_author?id=$ma_tgia&error='Không phải ảnh'");
                    exit();
                }

                if (move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $target_file)) {
                    $sql = "UPDATE tacgia SET ten_tgia=:ten_tgia, hinh_tgia=:hinh_tgia WHERE ma_tgia=:ma_tgia;";

                    $arguments = [
                        'ma_tgia' => $ma_tgia,
                        'ten_tgia' => $ten_tgia,
                        'hinh_tgia' => basename($_FILES["imgUpload"]["name"])
                    ];

                    $result = $this->db->runSql($sql, $arguments);

                    if ($result) {
                        header("Location: ../authors");
                        exit();
                    }
                    header("Location: ../edit_author?id=$ma_tgia&error='Cập nhật thất bại'");
                    exit();
                }
                header("Location: ?controller=author&error='Cập nhật ảnh thất bại'");
                exit();
            }
        }
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) header("Location: ../authors");

        $sql = "DELETE FROM tacgia WHERE ma_tgia=:ma_tgia;";

        $arguments = ['ma_tgia' => $id];

        $result = $this->db->runSql($sql, $arguments);

        if ($result) {
            header("Location: ../authors");
            exit();
        }

        header("Location: ../add_category?error='Xóa thất bại'");
    }
}
