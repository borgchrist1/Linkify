<?php

session_start();
require '../../classes/Post.php';
require '../../classes/Forms.php';
require '../../classes/Query.php';

$arr = $_POST;
$validateForm = new Forms();
$validatedData = $validateForm->checkForms($arr);
$insertData = new Query();
$insertData->insertChangesToPost($validatedData['post_id'], $validatedData['head'], $validatedData['url'], $validatedData['post']);
$_SESSION['message'] = 'Your post was successfully edited';
header('Location: ../../index.php');
