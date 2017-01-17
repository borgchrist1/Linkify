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
print_r($posts);
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Topic</title>
    </head>
    <body>
        <div>
            <?php
            foreach ($posts as $post):
                if($_SESSION["id"] === $post->getUser_id()):?>
            <a href="post.php?id=<?php print $postId; ?>">edit</a>
                <?php endif; ?>
                <?php print $post->getHead();
                print $post->getPost();
                //print $post->getAuthor();
            endforeach;
            ?>
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
    </form>
    </body>
</html>
