<?php
class UserService
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($username, $password)
    {
        $sql = "SELECT * FROM users WHERE (name=:username OR email=:username) and password=:password";

        $arguments = ['username' => $username, 'password' => $password];

        return $this->db->runSQL($sql, $arguments)->fetch();
    }

    public function getCount()
    {
        $sql = "SELECT COUNT(*) as count FROM users;";

        return $this->db->runSQL($sql)->fetch()['count'];
    }
}
