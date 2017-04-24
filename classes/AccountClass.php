<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$path = $_SERVER['DOCUMENT_ROOT'] . "/HTI";
require_once $path . '/databaseConnectionClass.php';

class AccountClass {

    var $response = array();

//

    public function updatePassword($password) {


        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database
        $password = md5($password);
        $query = mysqli_query($conn, "UPDATE users SET password =  '" . mysqli_real_escape_string($conn, $password) . "',first_login='NO' WHERE id='" . $_SESSION['userid'] . "'");
        if ($query) {

            $this->response['success'] = '0';
            $this->response['message'] = 'Password updated successfully';
            echo json_encode($this->response);
            //   $query->close();
        } else {
            $this->response['success'] = '1';
            $this->response['message'] = 'couldnt update' . mysqli_error($conn);
            echo json_encode($this->response);
        }
        $connection->closeConnection($conn);
    }

    private function generateuniqueCode($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
