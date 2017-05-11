<?php

session_start();
require '../../classes/Forms.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validateForm = new Forms();
    $comment = $validateForm->cleanData($_POST['comment']);
    $newComment = new Comment($id = null, $comment, $_SESSION['id'], $_GET['id'], $vote = null);
    $newComment->createComment();
    header('Location: ../../topic.php');
}
