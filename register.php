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
        <div class="form-wrapper">
            <form id="form-register" method="post" action="resources/lib/comments.php"><br>
                Email:<input type="email" name="email"><br>
                Username:<input type="text" name="username"><br>
                Password:<input type="password" name="password"><br>
                Re-Password:<input type="password" name="rePassword"><br>
                            <input type="hidden" name="table" value="users"><br>
                <input type="submit" value="Register">
            </form>
        </div>
        <?php if(!empty($_SESSION["message"])): print $_SESSION["message"]; endif; ?>
        <script type="text/javascript" src="resources/js/main.js">
        </script>
    </body>
</html>
