<?php
include "./configs/Database.php";

$users = [
    ['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => password_hash('admin', PASSWORD_DEFAULT)]
];

function seedUsers($users)
{
    foreach ($users as $user) {
        $sql = "INSERT INTO users (name, email, password) VALUES('{$user['name']}', '{$user['email']}', '{$user['password']}');";

        $db = new Database();

        $result = $db->runSQL($sql);

        if ($result) echo "Seed data for users successfully.";

        else echo "Seed data users failed.";
    };
}

seedUsers($users);
