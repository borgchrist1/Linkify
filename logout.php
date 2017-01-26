<?php
session_start();
session_unset();
$_SESSION["message"] = "You have been logged out";
header("Location: /");
die();