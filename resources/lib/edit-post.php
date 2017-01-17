<?php
session_start();
require "../../classes/Post.php";
//require "../../classes/Database.php";
require "../../classes/Forms.php";
require "../../classes/Query.php";

$arr = $_POST;
$validateForm = new Forms();
$validatedData = $validateForm->checkForms($arr);
$insertData = new Query();
print_r($validatedData);
$insertData->insertChangesToPost($validatedData["post_id"], $validatedData["head"], $validatedData["post"]);
header("Location: /");

