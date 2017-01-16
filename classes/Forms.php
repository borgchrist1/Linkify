<?php
require "Database.php";
class Forms
{

    public function cleanData ($data)
    {
        return trim(stripcslashes($data));

    }

    Public function checkEmail ($email)
    {

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
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

    public function checkForms($arr)
    {
       foreach ($arr as $key => $value){
           if ($key !== "password") {
               trim(stripcslashes($value));

           }
           if ($key === "email"){
               if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                   return false;
                   break;
               }

               $arr["email"] = $this->uniqueEmail($value);
               if (empty($arr["email"])){
                   return "email finns redan";
                   break;
               }

           }

           if ($key === "rePassword"){
               if ($arr["password"] !== $arr["rePassword"]){
                   return false;
                   break;
               }
           }
           if ($key === "password"){
                $arr["password"] = $this->encryptPassword($value);
               print "3d <br>" . $value;
           }

       }

       return $arr;
    }

    Public function uniqueEmail ($email){
        $db = new Database();

        $query = $db->query("SELECT * FROM users
            WHERE email='".$email."'");

        if (count($query) !== 0){
            print "false";
            return false;
        }
        return true;
    }

}