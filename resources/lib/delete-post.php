<?php
require "../../classes/Query.php";
require "../../classes/Database.php";
$query = new Query();
$deletePost = $query->deletePost($_GET["id"]);
$_SESSION["message"] = "Your post was successfully deleted";
header("Location: /");

