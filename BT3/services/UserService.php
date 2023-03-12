<?php
class UserService {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();                               
    }

    public function login($username, $password) {
        return $this->userModel->get($username, $password);
    }
    
    public function getCount() {
        return $this->userModel->getCount();
    }
}