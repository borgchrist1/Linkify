<?php


session_start();
//session_unset();
require "Database.php";
require "Login.php";

$db = new Database();
$login = new Login();

$token = "linkify-protection";
$_SESSION["token"] = md5($token);
$main_token = md5($_SESSION["token"]);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        if (isset($_POST["token"]) == $main_token) {
            $email = $login->cleanData($_POST["email"]);
            $password = $login->cleanData($_POST["password"]);

            if ($email !== "" && $password !== "") {
                $password = $login->encryptPassword($password);
                $_SESSION["message"] = $login->loginUser($email, $password);
            }
        } else {
            print "error token";
        }
    } else {
        die("No email and/or password");
    }
}

header("Location: /");
die();