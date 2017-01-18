<?php
session_start();
require "../../classes/Forms.php";
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $validateForm = new Forms();

    if (!isset($_POST["oldPassword"])){
        $arr = $_POST;

        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $dir = "resources/img/users/";
            $path = scandir("../../{$dir}");
            foreach ($path as $folder) {
                if (file_exists("../../{$dir}/{$_SESSION["id"]}")) {
                    move_uploaded_file($_FILES["file"]["tmp_name"], "../../{$dir}{$_SESSION["id"]}/{$_FILES["file"]["name"]}");
                    break;
                } else {
                    mkdir("../../" . $dir . "/" . $_SESSION["id"], 0700);
                    move_uploaded_file($_FILES["file"]["tmp_name"], "../../{$dir}{$_SESSION["id"]}/{$_FILES["file"]["name"]}");
                    break;
                }

            }

            $arr["avatar"] = $_FILES["file"]["name"];
        }

        if($arr["email"] === $arr["oldEmail"]) {
            unset($arr["email"]);
        }

        unset($arr["oldEmail"]);
        $posts = $validateForm->checkForms($arr);

        print_r($posts);
        die();
        //$user->insertChanges($_SESSION["id"], $name, $username, $email);




    }

    if (!empty($_POST["oldPassword"])){

    }
}