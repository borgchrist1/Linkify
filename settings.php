<?php

session_start();
require "classes/User.php";
require "classes/Database.php";
$userObject = new User();
$users = $userObject->getUserObject($_SESSION["id"]);
$user = null;
foreach ($users as $key){
    $user = $key;
}
//print_r($user);
?>
<html>
    <?php require "resources/blocks/head.php"; ?>

    <body>
        <?php //require "resources/blocks/big-header.php";
        require "resources/blocks/header.php";
        require "resources/blocks/left-panel.php";
        ?>
        <div class="page-wrapper">
            <?php require "resources/blocks/message.php";?>
            <div class="wrapper">
            <div class="avatar-wrapper">
                <div class="avatar">
                    <img src="resources/img/users/<?php print $user->getID() . "/" . $user->getAvatar(); ?>"
                </div>

            </div>

            <div class="right-side">
                <div class="form-wrapper">
                    <h2>Edit info</h2>

                       <form id="settings-form" method="post" action="resources/lib/settings.php" enctype="multipart/form-data">
                        Avatar:<input type="file" name="file" accept="img/*"><br>
                            Username<input type="text" name="username" value="<?php print $user->getUsername(); ?>"><br>
                            Email:<input type="email" name="email" value="<?php print $user->getEmail(); ?>"><br>
                            Password:<input type="password" name="password"><br>
                            <input type="hidden" name="oldEmail" value="<?php print $user->getEmail(); ?>"><br>
                            <input type="submit" value="Save">

                    </form>
                </div>
                <div class="form-wrapper">
                    <h2>Change password</h2>
                    <form id="change-password" method="post" action="resources/lib/settings.php">
                        Old password:<input type="password" name="oldPassword"><br>
                        New password:<input type="password" name="password"><br>
                        Re-New password:<input type="password" name="rePassword"><br>
                        <input type="submit" value="save">
                    </form>
                </div>
            </div>
            </div>
        </div>

        <script type="text/javascript" src="resources/js/main.js">
        </script>
    </body>
</html>
