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
            <div>
                <?php
                foreach ($posts as $post):
                    if($_SESSION["id"] === $post->getUser_id()):?>
                        <a href="edit-post.php?id=<?php print $postId; ?>">edit</a>
                    <?php endif; ?>
                    <?php print $post->getHead();
                    print $post->getPost(); ?>
                    <a href="resources/lib/vote.php?id=<?php print $post->getId(); ?>&vote=1&table=posts&class=Post">Up Vote</a>
                    <a href="resources/lib/vote.php?id=<?php print $post->getId(); ?>&vote=-1&table=posts&class=Post">Down Vote</a>
                <?php endforeach; ?>
            </div>

            <div>
                <?php
                foreach ($comments as $comment):
                    print $comment->getComment();
                    $user = $comment->getUser_id();
                endforeach;
                ?>
            </div>

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
