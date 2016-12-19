<?php
class Register {

    function checkEmail ($email){

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }
    function checkPassword ($password, $rePassword) {
        if ($password !== $rePassword){
            return false;
        }

        return true;
    }
}