<?php
session_start();
$_SESSION["message"] = "";
require "../../classes/Forms.php";
require "../../classes/Post.php";
require "../../classes/Query.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $validateForms = new Forms();
    if ($_POST["head"] !== "" && $_POST["post"] !== "") {
        $arr = $_POST;
        //$newPost = new Post($_POST["head"], $_POST["post"], $_SESSION["id"], 20161220);
        $result = $validateForms->checkForms($arr);

        header("Location: ../../index.php");
    } else {
        $_SESSION["message"] = "Post head and/or post can not be empty";
        header("Location: ../../post.php");
    }
}