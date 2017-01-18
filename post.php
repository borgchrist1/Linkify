<?php
session_start();
require "classes/Post.php";
require "classes/Database.php";
require "classes/User.php";
require "classes/Query.php";

?>

<html>
    <?php require "resources/blocks/head.php"; ?>
    <body>
        <?php require "resources/blocks/big-header.php";
        require "resources/blocks/header.php";
        require "resources/blocks/left-panel.php";
        ?>
        <div class="page-wrapper">
            <form id="form-post" method="post" action="resources/lib/comments.php">
                Head:<input type="text" name="head" >
                <textarea name="post">
                </textarea>
                <input type="hidden" name="user_id" value="<?php print $_SESSION["id"]; ?>">
                <input type="hidden" name="datum" value="20170117">
                <input type="hidden" name="table" value="posts">
                <button type="submit" form="form-post">Post</button>
            </form>
        </div>

    <p><?php if(!empty($_SESSION["message"])): print $_SESSION["message"]; endif; ?></p>
        <script type="text/javascript" src="resources/js/main.js"></script>
    </body>
</html>
