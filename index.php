<?php
session_start();
require "classes/Post.php";
require "classes/Database.php";
$postObjects = new Post();
$posts = $postObjects->getPosts();
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
          <li><img src="resources/img/design/home.png" alt="Home">HOME</li>
          <li><img src="resources/img/design/profile.png" alt="Profile">PROIFILE</li>
          <li><img src="resources/img/design/settings.png" alt="">SETTINGS</li>
          <?php if (!empty($_SESSION["id"])): ?>
          <li><img src="resources/img/design/logout.png." alt="LOGOUT">LOGOUT</li>
          <?php else: ?>
            <li><img src="resources/img/design/login.png." alt="LOGIN">LOGIN</li>
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
                <?php else: ?>
                <form id="logout" method="post" action="logout.php">
                    <input type="submit" value="Logout">
                </form>
                <a href="post.php">Creat new post</a>
                <?php endif; ?>
                <p><?php if(!empty($_SESSION["message"])): print $_SESSION["message"]; endif; ?></p>
                    <?php foreach ($posts as $post): ?>
                <div>
                    <a href="topick.php?id=<?php print $post->id; ?>"><?php print $post->getHead(); ?></a><br>
                </div>
                <?php endforeach; ?>
      </div>
  <!-- <footer ></footer> -->
  <script type="text/javascript" src="resources/js/main.js">
  </script>
    </body>
  </html>
    </body>
</html>
