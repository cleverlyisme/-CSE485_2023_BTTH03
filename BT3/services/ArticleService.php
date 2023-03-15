<?php
class ArticleService
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get($id)
    {
        $sql = "SELECT * FROM baiviet LEFT JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai LEFT JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia WHERE ma_bviet = :ma_bviet;";

        $arguments = ['ma_bviet' => $id];

        $articleDB = $this->db->runSQL($sql, $arguments)->fetch();

        $article = new Article(
            $articleDB['ma_bviet'],
            $articleDB['tieude'],
            $articleDB['ten_bhat'],
            $articleDB['ma_tloai'],
            $articleDB['ten_tloai'],
            $articleDB['tomtat'],
            $articleDB['noidung'],
            $articleDB['ma_tgia'],
            $articleDB['ten_tgia'],
            $articleDB['ngayviet'],
            $articleDB['hinhanh']
        );

        return $article;
    }

    public function getByName($name)
    {
        $sql = "SELECT * FROM baiviet LEFT JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai LEFT JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia WHERE tieude REGEXP :tieude;";

        $arguments = ['tieude' => $name];

        $articlesDB = $this->db->runSQL($sql, $arguments)->fetchAll();

        $articles = array_map(function ($articleDB) {
            $article = new Article(
                $articleDB['ma_bviet'],
                $articleDB['tieude'],
                $articleDB['ten_bhat'],
                $articleDB['ma_tloai'],
                $articleDB['ten_tloai'],
                $articleDB['tomtat'],
                $articleDB['noidung'],
                $articleDB['ma_tgia'],
                $articleDB['ten_tgia'],
                $articleDB['ngayviet'],
                $articleDB['hinhanh']
            );

            return $article;
        }, $articlesDB);

        return $articles;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM baiviet LEFT JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai LEFT JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia;";

        $articlesDB = $this->db->runSQL($sql)->fetchAll();

        $articles = array_map(function ($articleDB) {
            $article = new Article(
                $articleDB['ma_bviet'],
                $articleDB['tieude'],
                $articleDB['ten_bhat'],
                $articleDB['ma_tloai'],
                $articleDB['ten_tloai'],
                $articleDB['tomtat'],
                $articleDB['noidung'],
                $articleDB['ma_tgia'],
                $articleDB['ten_tgia'],
                $articleDB['ngayviet'],
                $articleDB['hinhanh']
            );

            return $article;
        }, $articlesDB);

        return $articles;
    }

    public function getCount()
    {
        $sql = "SELECT COUNT(*) as count FROM baiviet;";

        return $this->db->runSQL($sql)->fetch()['count'];
    }

    public function insert()
    {
        $target_dir = "./assets/images/songs/";
        $target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST["submit"])) {
            $tieude = $_POST["tieude"];
            $ten_bhat = $_POST["ten_bhat"];
            $ma_tloai = $_POST["ma_tloai"];
            $tomtat = $_POST["tomtat"];
            $noidung = $_POST["noidung"];
            $ma_tgia = $_POST["ma_tgia"];
            $ngayviet = $_POST["ngayviet"];

            if ($tieude == '' || $ten_bhat == '' || $tomtat == '' || $ngayviet == '') {
                header("Location: ../add_article?error='Giá trị không hợp lệ'");
                exit();
            }

            if (!basename($_FILES["imgUpload"]["name"])) {
                $sql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet) VALUE (:tieude, :ten_bhat, :ma_tloai, :tomtat, :noidung, :ma_tgia, :ngayviet);";

                $result = $this->db->runSQL($sql, [
                    'tieude' => $tieude,
                    'ten_bhat' => $ten_bhat,
                    'ma_tloai' => $ma_tloai,
                    'tomtat' => $tomtat,
                    'noidung' => $noidung,
                    'ma_tgia' => $ma_tgia,
                    'ngayviet' => $ngayviet,
                ]);

                if ($result) {
                    header("Location: ../articles");
                    exit();
                }
                header("Location: ../add_article?error='Thêm thất bại'");
                exit();
            } else {
                $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);

                if (!$check) {
                    header("Location: ../add_article?error='File is not an image.'");
                    exit();
                }

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    header("Location: ../add_article?error='Sorry, only JPG, JPEG, PNG & GIF files are allowed.'");
                    exit();
                }

                if (move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $target_file)) {
                    $sql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh) VALUE (:tieude, :ten_bhat, :ma_tloai, :tomtat, :noidung, :ma_tgia, :ngayviet, :hinhanh);";

                    $arguments = [
                        'tieude' => $tieude,
                        'ten_bhat' => $ten_bhat,
                        'ma_tloai' => $ma_tloai,
                        'tomtat' => $tomtat,
                        'noidung' => $noidung,
                        'ma_tgia' => $ma_tgia,
                        'ngayviet' => $ngayviet,
                        'hinhanh' => basename($_FILES["imgUpload"]["name"])
                    ];

                    $result = $this->db->runSQL($sql, $arguments);

                    if ($result) {
                        header("Location: ../articles");
                        exit();
                    }
                    header("Location: ../add_article?error='Thêm thất bại'");
                    exit();
                }
                header("Location: ../add_article?error='Thêm thất bại'");
                exit();
            }
        }
    }

    public function update()
    {
        $target_dir = './assets/images/songs/';
        $target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST["submit"])) {
            $ma_bviet = $_POST["ma_bviet"];
            $tieude = $_POST["tieude"];
            $ten_bhat = $_POST["ten_bhat"];
            $ma_tloai = $_POST["ma_tloai"];
            $tomtat = $_POST["tomtat"];
            $noidung = $_POST["noidung"];
            $ma_tgia = $_POST["ma_tgia"];
            $ngayviet = $_POST["ngayviet"];

            if ($tieude == '' || $ten_bhat == '' || $tomtat == '' || $ngayviet == '') {
                header("Location: ../edit_article?id=$ma_bviet&error='Giá trị không hợp lệ'");
                exit();
            }

            if (!basename($_FILES["imgUpload"]["name"])) {
                $sql = "UPDATE baiviet SET tieude=:tieude, ten_bhat=:ten_bhat, ma_tloai=:ma_tloai, tomtat=:tomtat, noidung=:noidung, ma_tgia=:ma_tgia, ngayviet=:ngayviet WHERE ma_bviet=:ma_bviet;";

                $arguments = [
                    'tieude' => $tieude,
                    'ten_bhat' => $ten_bhat,
                    'ma_tloai' => $ma_tloai,
                    'tomtat' => $tomtat,
                    'noidung' => $noidung,
                    'ma_tgia' => $ma_tgia,
                    'ngayviet' => $ngayviet,
                    'ma_bviet' => $ma_bviet
                ];

                $result = $this->db->runSQL($sql, $arguments);

                if ($result) {
                    header("Location: ../articles");
                    exit();
                }
                header("Location: ../edit_article?id=$ma_bviet&error='Cập nhật thất bại'");
                exit();
            } else {
                $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);
                if (!$check) {
                    header("Location: ../edit_article?id=$ma_bviet&error='File is not an image.'");
                    exit();
                }

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    header("Location: ../edit_article?id=$ma_bviet&error='Sorry, only JPG, JPEG, PNG & GIF files are allowed.'");
                    exit();
                }

                if (move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $target_file)) {
                    $sql = "UPDATE baiviet SET tieude=:tieude, ten_bhat=:ten_bhat, ma_tloai=:ma_tloai, tomtat=:tomtat, noidung=:noidung, ma_tgia=:ma_tgia, ngayviet=:ngayviet, hinhanh=:hinhanh WHERE ma_bviet=:ma_bviet;";

                    $arguments = [
                        'tieude' => $tieude,
                        'ten_bhat' => $ten_bhat,
                        'ma_tloai' => $ma_tloai,
                        'tomtat' => $tomtat,
                        'noidung' => $noidung,
                        'ma_tgia' => $ma_tgia,
                        'ngayviet' => $ngayviet,
                        'hinhanh' => basename($_FILES["imgUpload"]["name"]),
                        'ma_bviet' => $ma_bviet
                    ];

                    $result = $this->db->runSQL($sql, $arguments);

                    if ($result) {
                        header("Location: ../articles");
                        exit();
                    }
                    header("Location: ../edit_article?id=$ma_bviet&error='Cập nhật thất bại'");
                    exit();
                }
                header("Location: ../edit_article?id=$ma_bviet&error='Cập nhật thất bại'");
                exit();
            }
        }
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) header("Location: ../articles");

        $sql = "DELETE FROM baiviet WHERE ma_bviet=:ma_bviet;";

        $arguments = ['ma_bviet' => $id];

        $result = $this->db->runSql($sql, $arguments);

        if ($result) {
            header("Location: ../articles");
            exit();
        }
        header("Location: ../articles?error='Xóa thất bại'");
        exit();
    }
}
