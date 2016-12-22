<?php

session_start();
require "classes/Post.php";
require "classes/Database.php";
$posts = new  Post();
$post = $posts->getSingelPost($_GET["id"]);
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Topic</title>
    </head>
    <body>
        <div>
            <?php
                foreach ($post as $po):
                print $po->getHead();
                print $po->getPost();
                print $po->getAuthor();
                endforeach;
            ?>
        </div>
    </body>
</html>
