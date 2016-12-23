<?php

session_start();
require "classes/User.php";
require "classes/Database.php";
$userObject = User::getUserObject($_SESSION["id"]);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Settings</title>
    </head>
    <body>
        <form id="settings-form" method="post" action="resources/lib/settings.php">
            <?php foreach ($userObject as $user): ?>
            Name:<input type="text" name="name" value="<?php print $user->getName(); ?>">
            Username<input type="text" name="username" value="<?php print $user->getUsername(); ?>">
           Email:<input type="email" name="email" value="<?php print $user->getEmail(); ?>">
            Password:<input type="password" name="password">
            <input type="submit" value="Save">
            <?php endforeach; ?>
        </form>
        <form id="change-password" method="post" action="resources/lib/settings.php">
            Old password:<input type="password" name="oldPassword">
            New password:<input type="password" name="newPassword">
            Re-New password:<input type="password" name="rePassword">
            <input type="submit" value="save">
        </form>
    </body>
</html>
