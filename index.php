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
    <?php require "resources/blocks/head.php"; ?>
    <body>
    <?php require "resources/blocks/big-header.php";
          require "resources/blocks/header.php";
          require "resources/blocks/left-panel.php";
    ?>
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
            <div class="post-wrapper">
                    <div class="post-head">
                        <h2><a href="<?php if(!empty($post->getUrl())) print $post->getUrl(); else print "#"; ?>"><?php print $post->getHead(); ?></a></h2>
                    </div>
                   <div class="content-wrapper">
                    <div class="post-avatar">
                        <img src="resources/img/users/<?php print $user->getId() . "/" . $user->getAvatar(); ?>" height="100">
                        <p><?php print $user->getUsername(); ?></p>
                    </div>
                    <div class="post-content">
                        <p><?php print $post->getPost(); ?></p>
                    </div>
                    <div class="likes">
                        <a href="resources/lib/vote.php?id=<?php print $post->getId(); ?>&vote=1&table=posts&class=Post">Up Vote</a>
                        <p><?php if($post->getVotes() !== null) print $post->getVotes(); else print 0; ?></p>
                        <a href="resources/lib/vote.php?id=<?php print $post->getId(); ?>&vote=-1&table=posts&class=Post">Down Vote</a>
                    </div>
                </div>
                <div class="more"><a href="topick.php?id=<?php print $post->getId(); ?>">Comment</a></div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- <footer ></footer> -->
        <script type="text/javascript" src="resources/js/main.js">
        </script>
    </body>
</html>

