<?php
session_start();
require "classes/Post.php";
require "classes/Database.php";
require "classes/User.php";
require "classes/Query.php";
if ($_GET["id"]) {
    $editPost = null;
    $getPost = new Query();
    $posts = $getPost->getObjectById($_GET["id"], "posts", "Post");
    foreach ($posts as $post) {
        $editPost = $post;
    }
}
?>

<html>
    <?php require "resources/blocks/head.php"; ?>
    <body>
        <?php //require "resources/blocks/big-header.php";
        require "resources/blocks/header.php";
        require "resources/blocks/left-panel.php";
        ?>
        <div class="page-wrapper">
          <form id="form-post" method="post" action="resources/lib/edit-post.php">
              Head:<input type="text" name="head" value="<?php if (!empty($_GET["id"])): print $editPost->getHead(); endif; ?>">
              Url:<input type="text" name="url" value="<?php if (!empty($_GET["id"])): print $editPost->getUrl(); ?>">
              <textarea name="post"><?php if (!empty($_GET["id"])) {
            print $editPost->getPost();
        } ?></textarea>
                  <?php endif; ?>
              <input type="hidden" name="post_id" value="<?php print $_GET["id"]; ?>">
              <input type="hidden" name="datum" value="20170117">
              <input type="hidden" name="table" value="posts">
              <button type="submit" form="form-post">Post</button>
          </form>
      </div>

        <

    <p><?php if (!empty($_SESSION["message"])): print $_SESSION["message"]; endif; ?></p>
        <script type="text/javascript" src="resources/js/main.js">
        </script>
    </body>
</html>
