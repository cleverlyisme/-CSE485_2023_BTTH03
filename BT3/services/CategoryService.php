<?php
class CategoryService {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new Category();
    }

    public function get($id) {
        return $result =  $this->categoryModel->get($id);

    }

    public function getAll() {
        return $this->categoryModel->getAll();
    }

    public function getCount() {
        return $this->categoryModel->getCount();
    }
    
    public function insert() {
        if(isset($_POST)) {
            $ten_tloai = $_POST["ten_tloai"];

            if ($ten_tloai == '') {
                header("Location: ?controller=category&action=add&error='Giá trị không hợp lệ'");
                exit();
            }
            
                    $result = $this->categoryModel->insert([
                        'ten_tloai' => $ten_tloai,
                    ]);
 
                    if ($result) header("Location: ?controller=category");
                    else header("Location: ?controller=category&error='Thêm thất bại'");
                    header("Location: ?controller=category&error='Thêm thất bại'");
                }
    }

    public function update() {
        if(isset($_POST)) {
            $ma_tloai = $_POST["ma_tloai"];
            $ten_tloai = $_POST["ten_tloai"];

            if ($ten_tloai == '' ) {
                header("Location: ?controller=article&action=edit&id=$ma_bviet&error='Giá trị không hợp lệ'");
                exit();
            }
                
                    $result = $this->categoryModel->update([
                        'ma_tloai' => $ma_tloai, 
                        'ten_tloai' => $ten_tloai,
                        
                    ]);

                    if ($result) header("Location: ?controller=category");
                    else header("Location: ?controller=category&error='Cập nhật thất bại'"); 
                } 
    }


    public function delete() {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) header("Location: ?controller=category");

       $result = $this->categoryModel->delete(['ma_tloai' => $id]);

       if ($result) header("Location: ?controller=category");
        else header("Location: ?controller=category&error='Xóa thất bại'");
    }

}