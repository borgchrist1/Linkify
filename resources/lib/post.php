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
        $arr["user_id"] = $_SESSION["id"];
        $arr["datum"] = 20170116;
        //$newPost = new Post();
        $result = $validateForms->checkForms($arr);
        $createQuery = new Query();
        $rows = Query::createRowString($result);
        $values = Query::createValueString($result);
        $result = $createQuery->insertData($rows, $values, "posts");
        //$result = $newPost->createNewPost($_POST["head"], $_POST["post"], $_SESSION["id"], 20170116);
        //print $rows . "<br>" . $values;
        header("Location: ../../index.php");
    } else {
        $_SESSION["message"] = "Post head and/or post can not be empty";
        header("Location: ../../post.php");
    }
}