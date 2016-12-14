<?php


session_start();
require "Database.php";
require "Login.php";

$db = new Database();
$login = new Login();

$token = crypt("linkify-protection");
$_SESSION["token"] = $token;
$main_token = crypt($_SESSION["token"]);

if (isset($_POST["email"]) && isset($_POST["password"])){
    if ($_POST["token"] === $main_token){
        $email = $login->cleanData($_POST["email"]);
        $password = $login->cleanData($_POST["password"]);

        if ($email !== "" && $password !== ""){
            $password = $login->encryptPassword($password);
            $_SESSION["message"] = $login->loginUser($email, $password);
        }
    }
}

?>

<html>
    <head>
        <meta charset="UTF8">
        <title>Home</title>
    </head>
<form method="post">
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="hidden" name="token" value="linkify-protection">
    <input type="submit">
</form>
<p><?php if(isset($_SESSION["message"])): print $_SESSION["message"]; endif; ?></p>
</html>
