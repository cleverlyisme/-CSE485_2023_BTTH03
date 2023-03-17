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
        $sql = "SELECT * FROM users WHERE name=:username OR email=:username";

        $arguments = ['username' => $username];

        $user = $this->db->runSQL($sql, $arguments)->fetch();

        if (!$user) return null;

        if (!password_verify($password, $user['password'])) return null;

        return $user;
    }

    public function getCount()
    {
        $sql = "SELECT COUNT(*) as count FROM users;";

        return $this->db->runSQL($sql)->fetch()['count'];
    }

    public function get($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id;";

        $arguments = ['id' => $id];

        $userDB = $this->db->runSQL($sql, $arguments)->fetch();

        $user = new User(
            $userDB['id'],
            $userDB['name'],
            $userDB['email'],
            $userDB['password']
        );

        return $user;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM users;";

        $usersDB = $this->db->runSQL($sql)->fetchAll();

        $users = array_map(function ($userDB) {
            $user = new User(
                $userDB['id'],
                $userDB['name'],
                $userDB['email'],
                $userDB['password']
            );

            return $user;
        }, $usersDB);

        return $users;
    }

    public function insert()
    {
        if (isset($_POST)) {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $re_enter_password = $_POST["re_enter_password"];

            if ($password !== $re_enter_password) {
                header("Location: ../add_user?error='Mật khẩu không khớp'");
                exit();
            }

            if ($username == '' || $email == '' || $password == '') {
                header("Location: ../add_user?error='Giá trị không hợp lệ'");
                exit();
            }

            $password_hashed = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (name, email, password) VALUE (:name, :email, :password);";

            $arguments = [
                'name' => $username,
                'email' => $email,
                'password' => $password_hashed,
            ];

            $result = $this->db->runSQL($sql, $arguments);

            if ($result) {
                header("Location: ../users");
                exit();
            }
            header("Location: ../add_user?error='Thêm thất bại'");
            exit();
        }
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            header("Location: ../users");
            exit();
        }

        $sql = "DELETE FROM users WHERE id=:id;";

        $arguments = ['id' => $id];

        $result = $this->db->runSql($sql, $arguments);

        if ($result) {
            header("Location: ../users");
            exit();
        }
        header("Location: ../users?error='Xóa thất bại'");
        exit();
    }
}