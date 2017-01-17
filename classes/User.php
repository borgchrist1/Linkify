<?php
class User
{
    private $id;
    private $name;
    private $email;
    private $username;
    private $password;
    private $avatar;

//    public function __construct($name = null, $email = null, $username = null, $password = null, $avatar = null)
//    {
//        if ($name !== null) $this->name = $name;
//        if ($email !== null) $this->email = $email;
//        if ($username !== null) $this->username = $username;
//        if ($password !== null) $this->password = $password;
//        if ($avatar !== null) $this->avatar = $avatar;
//    }

    public function getId()
    {
        return  $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
      return  $this->email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function getUserObject($id)
    {
        $db = new Database();
        $query = $db->getObjects("SELECT * FROM users
            WHERE id ='".$id."'", "User");

        return $query;
    }

    public function insertChanges ($id, $name, $email, $username)
    {
        $db = new Database();
        $query = $db->query("UPDATE users
            SET name='".$name."'
            SET email='".$email."'
            SET username='".$username."'
            WHERE id='".$id."'");
    }

    //return new self(name, email, username, password, avatar);

}