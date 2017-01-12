<?php
session_start();
require "../../classes/Forms.php";
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $validateForm = new Forms();

    if (!isset($_POST["oldPassword"])){
//        $name = $validateForm->cleanData($_POST["name"]);
//        $username = $validateForm->cleanData($_POST["username"]);
//        $email = $validateForm->checkEmail($_POST["email"]);
//        $email = $validateForm->uniqueEmail($email);
//        $password = $validateForm->encryptPassword($_POST["password"]);
//        $user = new User();
//        $user->insertChanges($_SESSION["id"], $name, $username, $email);
        $dir = "resources/img/users/";
        $path = scandir("../../{$dir}");

        foreach ($path as $folder){
            if (file_exists("../../{$dir}/{$_SESSION["id"]}")) {
                move_uploaded_file($_FILES["file"]["tmp_name"], "../../{$dir}{$_SESSION["id"]}/{$_FILES["file"]["name"]}");
                break;
            } else {
                mkdir("../../" . $dir . "/" . $_SESSION["id"], 0700);
                move_uploaded_file($_FILES["file"]["tmp_name"], "../../{$dir}{$_SESSION["id"]}/{$_FILES["file"]["name"]}");
                break;
            }

        }

    }

    if (!empty($_POST["oldPassword"])){

    }
}