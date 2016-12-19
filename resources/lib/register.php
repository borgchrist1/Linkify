<?php
session_start();
require "../../classes/Register.php";
require "../../classes/Database.php";
$_SESSION["message"] = "";
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $_SESSION["message"] = "";
    $newUser = new Register();
    $correctEmail = $newUser->checkEmail($_POST["email"]);
    if ($correctEmail){
        $correctEmail = $newUser->uniqueEmail($_POST["email"]);
        if ($correctEmail) {
            $correctPassword = $newUser->checkPassword($_POST["password"], $_POST["rePassword"]);
            if ($correctPassword){
                $encryptedPassword = $newUser->encryptPassword($_POST["password"]);
                $result = $newUser->addUser($_POST["email"], $encryptedPassword);
                $_SESSION["message"] = "success";
                header("Location: ../../register.php");
            }else {
                $_SESSION["message"] = "Your passwords does not match";
                header("Location: ../../register.php");
            }
        } else {
            $_SESSION["message"] = "The email you typed in already exists in our database";
            header("Location: ../../register.php");
        }
    } else {
        $_SESSION["message"] = "Your email does not appear to be correct";
        header("Location: ../../register.php");
    }
}

//header("Location: /");