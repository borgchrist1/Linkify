<?php
session_start();
?>

<html>
    <?php require "resources/blocks/head.php"; ?>
    <body>
        <?php require "resources/blocks/big-header.php";
        require "resources/blocks/header.php";
        require "resources/blocks/left-panel.php";
        ?>
        <div class="post-wrapper">
            <form id="form-register" method="post" action="resources/lib/comments.php">
                Email:<input type="email" name="email">
                Password:<input type="password" name="password">
                Re-Password:<input type="password" name="rePassword">
                            <input type="hidden" name="table" value="users">
                <input type="submit" value="Register">
            </form>
        </div>
        <?php if(!empty($_SESSION["message"])): print $_SESSION["message"]; endif; ?>
        <script type="text/javascript" src="resources/js/main.js">
        </script>
    </body>
</html>
