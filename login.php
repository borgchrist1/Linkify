<?php

class Login{

    public function loginUser ($email, $password)
    {
        $db = new Database();
        $query = $db->query("SELECT * FROM users
            WHERE email='".$email."' AND password='".$password."'");

        if (count($query) === 1){
            return "Susses!";
        }
            return "Wrong password or email";

    }

    public  function encryptPassword ($password)
    {
        return md5($password);
    }

    public function cleanData ($data)
    {
        return trim(stripcslashes($data));

    }
}
