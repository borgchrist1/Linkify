<?php
session_start();
//require "../../classes/Register.php";
//require "../../classes/Database.php";
require "../../classes/Forms.php";
require "../../classes/Query.php";
$_SESSION["message"] = "";
if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $_SESSION["message"] = "";
    $newUser = new Query();
    $arr = $_POST;
    $table = $arr["table"];
    //print $arr["previous"];

    // if($arr["previous"]){
    //
    //     $previous = $arr["previous"];
    //     unset($arr["previous"]);
    // }

    unset($arr["table"]);

    $validateForms = new Forms();
    $result = $validateForms->checkForms($arr);

    $rows = Query::createRowString($result);
    $values = Query::createValueString($result);

    $query = new Query();
    $result = $query->insertData($rows, $values, $table);

    if (!is_array($result)){
        $_SESSION["message"] = $result;
        header("Location: /");
    }

    //print $rows . "<br>" . $values;
    $_SESSION["message"] = "Alright.. All went well";

    // if($previous !== null){
    //     header("Location: ../../index.php");
    // }
    header("Location: ../../index.php");
}

//header("Location: /");
