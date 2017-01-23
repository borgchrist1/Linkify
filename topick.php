<?php

session_start();
require "classes/Post.php";
require "classes/Database.php";
require "classes/Comment.php";
require "classes/Query.php";
$postId = $_GET["id"];
$objects = new Query();
$posts = $objects->getObjectById($postId, "posts", "Post");
$comments = $objects->getObjectByPostId($postId, "comments", "Comment");
$previous = $_SERVER["REQUEST_URI"];

?>

<html>
    <?php require "resources/blocks/head.php"; ?>
    <body>
        <?php require "resources/blocks/big-header.php";
        require "resources/blocks/header.php";
        require "resources/blocks/left-panel.php";
        ?>
        <div class="page-wrapper">
            <?php foreach ($posts as $post):?>
                <div class="post-wrapper">
                    <div class="post-head">
                        <h2><?php print $post->getHead();?></h2>
                    </div>
                    <div>
                        <div class="post-avatar">

                        </div>
                        <div class="post-content">
                            <p><?php print $post->getPost(); ?></p>
                        </div>
                        <div class="likes">
                            <a href="resources/lib/vote.php?id=<?php print $post->getId(); ?>&vote=1&table=posts&class=Post">Up Vote</a>
                            <p><?php if($post->getVotes() !== null) print $post->getVotes(); ?></p>
                            <a href="resources/lib/vote.php?id=<?php print $post->getId(); ?>&vote=-1&table=posts&class=Post">Down Vote</a>
                        </div>
                        <div class="edit">
                        <?php if($_SESSION["id"] === $post->getUser_id()):?>
                            <a href="edit-post.php?id=<?php print $postId; ?>">edit</a>
                            <a href="resources/lib/delete-post.php?id=<?php print $postId; ?>">Delete</a>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php
            foreach ($comments as $comment):?>
                <div class="post-wrapper">
                    <div>
                        <div class="post-avatar">

                        </div>
                        <div class="post-content">
                            <p><?php print $comment->getComment(); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>






            <form id="comment-form" method="post" action="resources/lib/comments.php">
                <textarea name="comment"></textarea>
                <input type="submit" value="Comment">
                <input type="hidden" name="post_id" value="<?php print $postId; ?>">
                <input type="hidden" name="user_id" value="<?php print $_SESSION["id"]; ?>">
                <input type="hidden" name="table" value="comments">
                <input type="hidden" name="previous" value="<?php print $previous; ?>">
            </form>
        </div>
        <script type="text/javascript" src="resources/js/main.js">
        </script>
    </body>
</html>
