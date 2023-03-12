<?php
class AuthorService {
    private $authorModel;

    public function __construct() {
        $this->authorModel = new Author();
    }
    public function get($id) {
        
        return $this->authorModel->get($id);
    }
    public function getAll() {
        return $this->authorModel->getAll();
    }
    
    public function getCount() {
        return $this->authorModel->getCount();
    }

    public function insert() {
        $target_dir = "./assets/images/author/";
        $target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if(isset($_POST)) {
            $ten_tgia = $_POST["ten_tgia"];
            if ($ten_tgia == '') {
                header("Location: ?controller=author&action=add&error='Giá trị không hợp lệ'");
                exit();
            }

            if (!basename($_FILES["imgUpload"]["name"])) {    
                $result = $this->authorModel->insertWithoutImg([
                    'ten_tgia' => $ten_tgia, 
                ]);

                    if ($result) header("Location: ?controller=author");
                    else header("Location: ?controller=author&error='Thêm thất bại'");
                    header("Location: ?controller=author&error='Thêm thất bại'");
                } else {
                    $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);
                    if(!$check) 
                        header("Location: ?controller=author&action=edit&id=$ma_tgia&error='File is not an image.'");
                    
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) 
                        header("Location: ?controller=author&action=edit&id=$ma_tgia&error='Sorry, only JPG, JPEG, PNG & GIF files are allowed.'");
                
                    if (move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $target_file)) {
                        $result = $this->authorModel->insert([
                            'ten_tgia' => $ten_tgia, 
                            'hinh_tgia' => basename($_FILES["imgUpload"]["name"])
                        ]);
                        if ($result) header("Location: ?controller=author");
                        else header("Location: ?controller=author&error='Thêm thất bại'");
                    } else {
                        header("Location: ?controller=author&error='Thêm thất bại'");
                    }
                }
    }

}
public function update() {
    $target_dir = './assets/images/author/';
    $target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
        $ma_tgia = $_POST["ma_tgia"];
        $ten_tgia = $_POST["ten_tgia"];

        if ($ten_tgia == '') {
            header("Location: ?controller=author&action=edit&id=$ma_tgia&error='Giá trị không hợp lệ'");
            exit();
        }

        if (!basename($_FILES["imgUpload"]["name"])) {
            $result = $this->authorModel->updateWithoutImg([
                'ma_tgia' => $ma_tgia, 
                'ten_tgia' => $ten_tgia, 
            ]);

            if ($result) header("Location: ?controller=author");
            else header("Location: ?controller=author&error='Cập nhật thất bại'");
        } else {
            $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);
            if(!$check) 
                header("Location: ?controller=author&action=edit&id=$ma_tgia&error='File is not an image.'");
            
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) 
                header("Location: ?controller=author&action=edit&id=$ma_tgia&error='Sorry, only JPG, JPEG, PNG & GIF files are allowed.'");

            if (move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $target_file)) {
                $result = $this->authorModel->update([
                    'ma_tgia' => $ma_tgia, 
                    'ten_tgia' => $ten_tgia, 
                    'hinh_tgia' => basename($_FILES["imgUpload"]["name"])

                ]);

                if ($result) header("Location: ?controller=author");
                else header("Location: ?controller=author&error='Cập nhật thất bại'"); 
            } else {
                header("Location: ?controller=author&error='Cập nhật ảnh thất bại'");
            }
        }
    }
}
public function delete() {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if (!$id) header("Location: ?controller=author");

   $result = $this->authorModel->delete(['ma_tgia' => $id]);

   if ($result) header("Location: ?controller=author");
    else header("Location: ?controller=author&error='Xóa thất bại'");
}
}