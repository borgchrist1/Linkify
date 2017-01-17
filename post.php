<?php
session_start();
require "classes/Post.php";
require "classes/Database.php";
require "classes/User.php";
require "classes/Query.php";
if($_GET["id"]){
   $editPost = null;
   $getPost = new Query();
   $posts = $getPost->getObjectById($_GET["id"], "posts", "Post");
   foreach ($posts as $post){
       $editPost = $post;
       print_r($editPost);
   }

}
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
</head>
<body>

    <form id="form-post" method="post" action="resources/lib/comments.php">
        Head:<input type="text" name="head" value="<?php if (!empty($_GET["id"])): print $editPost->getHead(); ?>">
        <textarea name="post"><?php if (!empty($_GET["id"])) print $editPost->getPost();
            endif; ?>
        </textarea>
        <input type="hidden" name="user_id" value="<?php print $_SESSION["id"]; ?>">
        <input type="hidden" name="datum" value="20170117">
        <input type="hidden" name="table" value="posts">
        <button type="submit" form="form-post">Post</button>
    </form>


<p><?php if(!empty($_SESSION["message"])): print $_SESSION["message"]; endif; ?></p>

</body>
</html>
