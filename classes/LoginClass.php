<?php

if (session_status() == PHP_SESSION_NONE) {
    ob_start();
    session_start();
}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$path = $_SERVER['DOCUMENT_ROOT'] . "/HTI";
require_once $path . '/databaseConnectionClass.php';

class LoginClass {

    var $response = array();

    public function login($email, $password) {
        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database

        $password = md5($password);
        $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . mysqli_real_escape_string($conn, $email) . "' AND password = '" . mysqli_real_escape_string($conn, $password) . "'");

        if ($query) {
            if (mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_assoc($query);

                $userType = $row['role'];
                $userid = $row['id'];
                $instituition_code = $row['instituition_code'];
                $last_login = $row['last_login'];
                $firstname = $row['firstname'];
                $first_login = $row['first_login'];


//first_login,last_login
                $_SESSION['usergroup'] = $userType;
                $_SESSION['email'] = $email;
                $_SESSION['userid'] = $userid;
                $_SESSION['institute_code'] = $instituition_code;
                $_SESSION['last_login'] = $last_login;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['login_valid'] = "YES";

                $this->response['success'] = '0';
                $this->response['message'] = 'Success ';
                $this->response['login'] = $first_login;

                echo json_encode($this->response);
            } else {
                $this->response['success'] = '1';
                $this->response['message'] = 'Unable to login ';
                echo json_encode($this->response);
            }
        }
    }

}
