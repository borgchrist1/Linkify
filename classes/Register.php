<?php
class Register {

    Public Function addUser ($email, $password){
        $db = new Database();

        $query = $db->query("INSERT INTO users (email, password) 
            VALUES ('".$email."','".$password."')");

        return $query;
    }

    Public function checkEmail ($email){

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }
    Public function checkPassword ($password, $rePassword) {
        if ($password !== $rePassword){
            return false;
        }

        return true;
    }

    public  function encryptPassword ($password)
    {
        return md5($password);
    }

    Public function uniqueEmail ($email){
        $db = new Database();

        $query = $db->query("SELECT * FROM users
            WHERE email='".$email."'");

        if (count($query) !== 0){
            return false;
        }
        return true;
    }

}