<?php
session_start();
require 'classes/Post.php';
require 'classes/Database.php';
require 'classes/User.php';
require 'classes/Query.php';
$title = 'Post';
?>

<html>
    <?php require 'resources/blocks/head.php'; ?>
    <body>
        <?php //require "resources/blocks/big-header.php";
        require 'resources/blocks/header.php';
        require 'resources/blocks/left-panel.php';
        ?>
        <div class="page-wrapper">


<!-- start -->
<form id="form-post" method="post" action="resources/lib/comments.php">
        <div class="post-wrapper">
                <div class="post-head">
                Head:<input type="text" name="head" >  Url:<input type="text" name="url" placeholder="http://www.exempel.com/" >
                </div>
               <div class="content-wrapper">
                <div class="post-avatar">
                </div>
                <div class="post-content">
                  <textarea name="post">
                  </textarea>
                  <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
                  <input type="hidden" name="datum" value="20170117">
                  <input type="hidden" name="table" value="posts">
                </div>
                <div class="likes">

                </div>
            </div>
            <div class="more"><button type="submit" form="form-post">Post</button></div>
            </div>
          </form>
<!-- end -->

        <script type="text/javascript" src="resources/js/main.js"></script>
    </body>
</html>
