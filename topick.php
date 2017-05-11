<?php

session_start();
require 'classes/Post.php';
require 'classes/Database.php';
require 'classes/Comment.php';
require 'classes/User.php';
require 'classes/Query.php';
require 'resources/lib/index-get-user.php';
$postId = $_GET['id'];
$objects = new Query();
$posts = $objects->getObjectById($postId, 'posts', 'Post');
$comments = $objects->getObjectByPostId($postId, 'comments', 'Comment');
$previous = $_SERVER['REQUEST_URI'];

?>

<html>
    <?php require 'resources/blocks/head.php'; ?>
    <body>
        <?php require 'resources/blocks/big-header.php';
        require 'resources/blocks/header.php';
        require 'resources/blocks/left-panel.php';
        ?>
        <div class="page-wrapper">
            <?php foreach ($posts as $post):
                $user = getAuthor($post->getUser_id()); ?>

                <div class="post-wrapper">
                    <div class="post-head">
                        <h2><?php echo $post->getHead(); ?></h2>
                    </div>
                    <div class="content-wrapper">
                        <div class="post-avatar">
                            <img src="resources/img/users/<?php echo $user->getId().'/'.$user->getAvatar(); ?>" height="100">
                            <p><?php echo $user->getUsername(); ?></p>
                        </div>
                        <div class="post-content">
                            <p><?php echo $post->getPost(); ?></p>
                        </div>
                        <div class="likes">
                            <a href="resources/lib/vote.php?id=<?php echo $post->getId(); ?>&vote=1&table=posts&class=Post"><img src="resources/img/design/up-vote.png" ></a>
                            <p><?php if ($post->getVotes() !== null) {
                    echo $post->getVotes();
                } else {
                    echo 0;
                } ?></p>
                            <a href="resources/lib/vote.php?id=<?php echo $post->getId(); ?>&vote=-1&table=posts&class=Post"><img src="resources/img/design/down-vote.png" ></a>
                        </div>
                    </div>
                    <div class="more">
                        <?php if (isset($_SESSION['id'])):
                        if ($_SESSION['id'] === $post->getUser_id()):?>
                            <a href="edit-post.php?id=<?php echo $postId; ?>">Edit</a>
                            <a href="resources/lib/delete-post.php?id=<?php echo $postId; ?>">Delete</a>
                        <?php endif;
                        endif; ?>

                    </div>
                </div>
                <div class="comment-wrapper">
                <form id="comment-form" method="post" action="resources/lib/comments.php">
                    <textarea name="comment"></textarea>
                    <input type="submit" value="Comment">
                    <input type="hidden" name="post_id" value="<?php echo $postId; ?>">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
                    <input type="hidden" name="table" value="comments">
                    <input type="hidden" name="previous" value="<?php echo $previous; ?>">
                </form>
                </div>
            <?php endforeach; ?>
            <?php
            foreach ($comments as $comment):
                $user = getAuthor($comment->getUser_id()); ?>
                <div class="comment-wrapper">
                    <div class="comment-wrapper-inner">
                        <div class="post-avatar">
                            <img src="resources/img/users/<?php echo $user->getId().'/'.$user->getAvatar(); ?>" height="100">
                            <p><?php echo $user->getUsername(); ?></p>
                        </div>
                        <div class="post-content">
                            <p><?php echo $comment->getComment(); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <script type="text/javascript" src="resources/js/main.js">
        </script>
    </body>
</html>
