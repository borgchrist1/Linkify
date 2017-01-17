<?php

session_start();
require "classes/Post.php";
require "classes/Database.php";
require "classes/Comment.php";
$postObject = new  Post();
$posts = $postObject->getSinglePost($_GET["id"]);
$commentObject = new Comment();
$comments = $commentObject->getComments($_GET["id"]);
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
                print $post->getHead();
                print $post->getPost();
                print $post->getAuthor();
                endforeach;
            ?>
        </div>
        <div>
            <?php
            foreach ($comments as $comment):
                print $comment->getComment();
                $user = $comment->getUserId();
            endforeach;
            ?>
        </div>

    <form id="comment-form" method="post" action="resources/lib/comments.php">
        <textarea name="comment"></textarea>
        <input type="submit" value="Comment">
        <input type="hidden" name="user_id" value="<?php print $_SESSION["id"]; ?>">
        <input type="hidden" name="table" value="comments">
    </form>
    </body>
</html>
