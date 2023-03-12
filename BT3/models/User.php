<?php
class User
{
    private $id;
    private $name;
    private $email;
    private $password;

    public function __construct($name, $email, $password)
    {
      $this->name = $name;
      $this->email = $email;
      $this->password = $password;
    }

    public function getId()
    {
      return $this->id;
    }

    public function getName()
    {
      return $this->name;
    }

    public function getEmail()
    {
      return $this->email;
    }

    public function getPassword()
    {
      return $this->password;
    }

    public function save()
    {
      // Insert or update the user in the database
      // ...
    }

    public static function getById($id)
    {
      // Retrieve the user with the given ID from the database
      // ...
    }

    public static function getAll()
    {
      // Retrieve all users from the database
      // ...
    }

    public function delete()
    {
      // Delete the user from the database
      // ...
    }
}