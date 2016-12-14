<?php


session_start();
//session_unset();
require "Database.php";
require "Login.php";

$db = new Database();
$login = new Login();

$token = "linkify-protection";
$_SESSION["token"] = $token;
$main_token = $_SESSION["token"];

if (isset($_POST["email"]) && isset($_POST["password"])) {
   if ($_POST["token"] == $main_token) {
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
    //die("No email and/or password");
}
print $main_token;

?>

<html>
    <head>
        <meta charset="UTF8">
        <title>Home</title>
    </head>
<form id="login" method="post">
    email:<input type="email" name="email">
    Password:<input type="password" name="password">
    <input type="hidden" name="token" value="linkify-protection" />
    <input type="submit" value="Login">
</form>
<p><?php if(isset($_SESSION["message"])): print $_SESSION["message"]; endif; ?></p>
</html>
