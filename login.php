<?php

class Login{
    public function loginUser ($email, $password)
    {
        $db = new Database();
        $query = $db->query("SELECT * FROM users
            WHERE email='".$email."' AND password='".$password."'");

        $_SESSION["id"] = $query[0]["id"];

        if (count($query) === 1){
            return "Secsess";
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
