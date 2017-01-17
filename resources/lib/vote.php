<?php
require "../../classes/Database.php";
require "../../classes/Query.php";
require "../../classes/Post.php";

$vote = $_GET;
print "<pre>";
print_r($vote);
$postVote = null;
$query = new Query();
$post = $query->getObjectById($vote["id"], $vote["table"], $vote["class"]);
foreach ($post as $obj){

    $postVote = $obj->getVotes();

}

$newScore = $postVote + $vote["vote"];
$insert = $query->insertVoteToPost($vote["id"], $newScore, $vote["table"]);

if (!is_array($insert)){
    $_SESSION["message"] = $insert;
    header("Location: /");
}
$_SESSION["message"] = "Alright.. All went well";
header("Location: /");




