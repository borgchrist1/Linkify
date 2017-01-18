<?php

session_start();
require "classes/User.php";
require "classes/Database.php";
$userObject = new User();
$user = $userObject->getUserObject($_SESSION["id"]);
?>
<html>
    <?php require "resources/blocks/head.php"; ?>

    <body>
        <?php require "resources/blocks/big-header.php";
        require "resources/blocks/header.php";
        require "resources/blocks/left-panel.php";
        ?>
        <div class="page-wrapper">
            <form id="settings-form" method="post" action="resources/lib/settings.php" enctype="multipart/form-data">

                Avatar:<input type="file" name="file" accept="img/*">
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
        </div>
        <script type="text/javascript" src="resources/js/main.js">
        </script>
    </body>
</html>
