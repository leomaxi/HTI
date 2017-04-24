<?php

require_once '../classes/AccountClass.php';

require_once '../classes/LoginClass.php';
$response = array();
if (isset($_REQUEST)) {
//echo "Check here";
    $type = $_REQUEST['type'];
    if (!empty($type)) {
        if ($type == "login") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $save = new LoginClass();
            $save->login($email, $password);
        } else if ($type == "changepassword") {
            $password = $_POST['password'];
            $new = new AccountClass();
            $new->updatePassword($password);
        } 
    } else {
        echo 'provide type';
    }
}
