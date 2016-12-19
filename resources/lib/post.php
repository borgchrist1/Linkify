<?php
session_start();
$_SESSION["message"] = "";
require "../../classes/Post.php";
require "../../classes/Database.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["head"] !== "" && $_POST["post"] !== "") {
        $newPost = new Post($_POST["head"], $_POST["post"], $_SESSION["id"], 20161220);
        $result = $newPost->createNewPost();
    } else {
        $_SESSION["message"] = "Post head and/or post can not be empty";
        header("Location: ../../post.php");
    }
}