<?php

session_start();
//require "../../classes/Database.php";
require '../../classes/Query.php';
require '../../classes/Forms.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validateForm = new Forms();

    if (!isset($_POST['oldPassword'])) {
        $arr = $_POST;
        $arr['id'] = $_SESSION['id'];
        $query = new Query();
        $password = $query->encryptPassword($arr['password']);

        $correctPassword = $query->correctPassword($password, $arr['id']);

        if (empty($correctPassword)) {
            $_SESSION['message'] = 'Wrong password';
            header('location: ../../settings.php');
        } else {
            if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                $dir = 'resources/img/users/';
                $path = scandir("../../{$dir}");
                foreach ($path as $folder) {
                    if (file_exists("../../{$dir}/{$_SESSION['id']}")) {
                        move_uploaded_file($_FILES['file']['tmp_name'], "../../{$dir}{$_SESSION['id']}/{$_FILES['file']['name']}");
                        break;
                    } else {
                        mkdir('../../'.$dir.'/'.$_SESSION['id'], 0700);
                        move_uploaded_file($_FILES['file']['tmp_name'], "../../{$dir}{$_SESSION['id']}/{$_FILES['file']['name']}");
                        break;
                    }
                }

                $arr['avatar'] = $_FILES['file']['name'];
            }

            if ($arr['email'] !== $arr['oldEmail']) {
                unset($arr['oldEmail']);
            } else {
                $posts['email'] = $arr['oldEmail'];
            }

            $posts = $validateForm->checkForms($arr);
            if (!empty($posts['avatar'])) {
                $insertAvatar = $query->insertAvatar($posts['avatar'], $_SESSION['id']);
            }

            if (!is_array($posts)) {
                $_SESSION['message'] = $posts;
                // print $posts;
                header('Location: ../../settings.php');
            } else {
                $insertUpdate = $query->insertChangesToUser((int) $_SESSION['id'], $posts['email'], $posts['username']);

                $_SESSION['message'] = 'Alright, your info was updated';
                header('location: ../../settings.php');
            }
        }
    }

    if (!empty($_POST['oldPassword'])) {
        $arr = $_POST;
        $arr['id'] = $_SESSION['id'];
        $query = new Query();
        $password = $query->encryptPassword($arr['password']);
        $correctPassword = $query->correctPassword($password, $arr['id']);
        if (empty($password)) {
            $_SESSION['message'] = 'Wrong password';
            header('location: ../../settings.php');
        } else {
            if ($arr['password'] === $arr['rePassword']) {
                $validateForm = new Forms();
                $validateData = $validateForm->checkForms($arr);
                $changePassword = $query->changePassword($validateData['password'], $_SESSION['id']);
                $_SESSION['message'] = 'You have successfully updated your password';
                header('location: ../../settings.php');
            }
        }
    }
}
