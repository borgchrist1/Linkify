<?php

class Login{

    public function loginUser ($email, $password)
    {
        $db = new Database();
        $query = $db->query("SELECT * FROM users
            WHERE email='".$email."' AND password='".$password."'");

        $count = $query->rowCount();

        if ($count === 1){
            return "Successfully logedin";
        } else {
            return "Wrong email or password";
        }
    }

    public  function encryptPassword ($password)
    {
        return md5($password);
    }

    public function cleanData ($data)
    {
        $data = trim(stripcslashes($data));
        return $data;
    }
}
