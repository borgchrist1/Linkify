<?php
require "../../classes/Query.php";
require "../../classes/Database.php";
$query = new Query();
$deletePost = $query->deletePost($_GET["id"]);
header("Location: /");

