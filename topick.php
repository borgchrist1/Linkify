<?php

session_start();
require "classes/Post.php";
require "classes/Database.php";
$postObject = new  Post();
$posts = $postObject->getSinglePost($_GET["id"]);
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
    </body>
</html>
