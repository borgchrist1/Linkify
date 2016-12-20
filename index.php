<?php
session_start();
require "classes/Post.php";
require "classes/Database.php";
?>
<html>
    <head>
        <meta charset="UTF8">
        <title>Home</title>
    </head>
    <body>
<?php if (empty($_SESSION["id"])): ?>
<form id="login" method="post" action="resources/lib/login.php">
    email:<input type="email" name="email">
    Password:<input type="password" name="password">
    <input type="hidden" name="token" value="linkify-protection" />
    <input type="submit" value="Login">
</form>
<a href="register.php">Register</a>
<?php else: ?>
<form id="logout" method="post" action="logout.php">
    <input type="submit" value="Logout">
</form>
<a href="post.php">Creat new post</a>
<?php endif; ?>
<p><?php if(!empty($_SESSION["message"])): print $_SESSION["message"]; endif; ?></p>
    <?php
        $posts = Post::getPosts();
        print_r($posts);
    ?>
    </body>
</html>
