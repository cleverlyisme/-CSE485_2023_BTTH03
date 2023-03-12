<?php
class Category {
    private $db;

    public function __construct() {
        $this->db = new Database();                               
    }

    public function get($id) { 

        $sql = "SELECT ma_tloai, ten_tloai FROM theloai WHERE ma_tloai=:ma_tloai;" ;

       $arguments = ['ma_tloai' => $id];

       return $this->db->runSql($sql, $arguments)->fetch();
    }

    public function getAll(){
        $this->db = new Database();                               

        $sql = "SELECT * FROM theloai;";

        return $this->db->runSql($sql)->fetchAll();
    }

    public function getCount() {
        $sql = "SELECT COUNT(*) as count FROM theloai;";

        return $this->db->runSql($sql)->fetch()['count'];
    }
    
    public function insert($arguments) {
        $sql = "INSERT INTO theloai (ten_tloai) VALUE (:ten_tloai);";

       return $this->db->runSql($sql, $arguments);
    }

    public function update($arguments) {
        $sql = "UPDATE theloai SET ten_tloai=:ten_tloai WHERE ma_tloai=:ma_tloai;";
        
       return $this->db->runSql($sql, $arguments);
    }

    public function delete($arguments) {
        $sql = "DELETE FROM theloai WHERE ma_tloai=:ma_tloai;";

       return $this->db->runSql($sql, $arguments);
    }
}