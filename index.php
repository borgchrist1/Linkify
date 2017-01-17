<?php
session_start();
require "classes/Post.php";
require "classes/Database.php";
require "classes/User.php";
require "classes/Query.php";
require "resources/lib/index-get-user.php";
$postObjects = new Query();
$posts = $postObjects->getObjects("posts", "Post");

?>
<html>
    <head>
        <meta charset="UTF8">
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="style.css">
        <title>Home</title>
    </head>
    <body>
        <div class="big-header">
            <h1>Linkify</h1>
        </div>
        <header id="header">
            <div class="menu-button">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </header>
        <div class="left-panel">
            <ul>
                <a href="index.php"><li><img src="resources/img/design/home.png" alt="Home">HOME</li></a>
                <?php if (!empty($_SESSION["id"])): ?>
                    <a href="post.php"><li><img src="resources/img/design/post.png" alt="Profile">NEW POST</li></a>
                    <li><img src="resources/img/design/profile.png" alt="Profile">PROIFILE</li>
                    <a href="settings.php"><li><img src="resources/img/design/settings.png" alt="">SETTINGS</li></a>
                    <a href="logout.php"><li><img src="resources/img/design/logout.png" alt="LOGOUT">LOGOUT</li></a>
                <?php else: ?>
                    <li><img src="resources/img/design/login.png" alt="LOGIN">LOGIN</li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="page-wrapper">
            <?php if (empty($_SESSION["id"])): ?>
                <form id="login" method="post" action="resources/lib/login.php">
                    email:<input type="email" name="email">
                    Password:<input type="password" name="password">
                    <input type="hidden" name="token" value="linkify-protection" />
                    <input type="submit" value="Login">
                </form>
                <a href="register.php">Register</a>
            <?php endif; ?>
            <div class="message"><?php if(!empty($_SESSION["message"])): print $_SESSION["message"]; endif; ?></div>
            <?php foreach ($posts as $post):
                $user = getAuthor($post->getUser_id()); ?>

                <!--<a href="topick.php?id=<?php print $post->id; ?>"><?php print $post->getHead(); ?></a><br>-->
                <div class="post-wrapper">
                    <div class="post-head">
                        <h2><a href="topick.php?id=<?php print $post->id; ?>"><?php print $post->getHead(); ?></a></h2>
                    </div>
                    <div class="post-avatar">
                        <img src="resources/img/users/<?php print $user->getId() . "/" . $user->getAvatar(); ?>" height="100">
                    </div>
                    <div class="post-content">
                        <p><?php print $post->getPost(); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- <footer ></footer> -->
        <script type="text/javascript" src="resources/js/main.js">
        </script>
    </body>
</html>

