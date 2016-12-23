<?php
class User
{
    private $name;
    private $email;
    private $username;
    private $password;

    public function __construct($name = null, $email = null, $username = null, $password = null)
    {
        if ($name !== null) $this->name = $name;
        if ($email !== null) $this->email = $email;
        if ($username !== null) $this->username = $username;
        if ($password !== null) $this->password = $password;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getUserObject($id)
    {
        $db = new Database();
        $query = $db->getObjects("SELECT name, username, email FROM users
            WHERE id ='".$id."'", "User");
    }

    public function insertChanges ($id)
    {
        $db = new Database();
        $query = $db->query("INSERT INTO ");
    }

}