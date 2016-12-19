<?php
session_start();
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Register</title>
    </head>
    <body>
        <form id="form-register" method="post" action="resources/lib/register.php">
            Email:<input type="email" name="email">
            Password:<input type="password" name="password">
            Re-Password:<input type="password" name="rePassword">
            <input type="submit" value="Register">
        </form>
        <?php print $_SESSION["message"]; ?>
    </body>
</html>
