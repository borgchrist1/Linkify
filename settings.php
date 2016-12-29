<?php

session_start();
require "classes/User.php";
require "classes/Database.php";
$userObject = new User();
$user = $userObject->getUserObject($_SESSION["id"]);
var_dump($user);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Settings</title>
    </head>
    <body>
        <form id="settings-form" method="post" action="resources/lib/settings.php">

            Avatar:<input type="file" name="avatar" accept="img/*">
            Name:<input type="text" name="name" value="">
            Username<input type="text" name="username" value="">
           Email:<input type="email" name="email" value="">
            Password:<input type="password" name="password">
            <input type="submit" value="Save">

        </form>
        <form id="change-password" method="post" action="resources/lib/settings.php">
            Old password:<input type="password" name="oldPassword">
            New password:<input type="password" name="newPassword">
            Re-New password:<input type="password" name="rePassword">
            <input type="submit" value="save">
        </form>
    </body>
</html>
