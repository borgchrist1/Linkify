<?php
session_start();

?>

<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
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
    <form id="form-post" method="post" action="resources/lib/post.php">
        Head:<input type="text" name="head">
    </form>
    <textarea name="post" form="form-post">Write your post here.....</textarea>
    <button type="submit" form="form-post">Post</button>
<?php endif; ?>
<p><?php if(!empty($_SESSION["message"])): print $_SESSION["message"]; endif; ?></p>

</body>
</html>
