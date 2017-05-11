<?php

//require "../../classes/Query.php";

function getAuthor($id)
{
    $getUser = new Query();
    $users = $getUser->getObjectById($id, 'users', 'User');
    foreach ($users as $user) {
        return $user;
    }
}
