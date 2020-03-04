<?php

$host = getenv('IP');
$username = 'root';
$password = 'D3!t31';
$dbname = 'schema1';


function validatePassword($password)
{
    if (strlen($password) > 7) {
        if (preg_match('/(?=.*[a-z])(?=.*\d)(?=.*[A-Z])/', $password) === 1) {
            $result = true;
        } else if (preg_match('/(?=.*[a-z])(?=.*\d)(?=.*[A-Z])/', $password) === 0) {
            $result = false;
        } else {
            $result1 = "Error";
            echo $result1;
        }
        return $result;
    } else {
        return false;
    }
}
