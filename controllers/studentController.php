<?php

require_once '../classes/StudentClass.php';
$response = array();
//echo "Check here";
if (isset($_POST['type'])) {
//echo "Check here";
    $type = $_POST['type'];
    if (!empty($type)) {
        if ($type == 'saveStudent') {
          //  print_r($_POST);
            $new_staff = new StudentClass();
           $new_staff->setStudent($_POST);
        }
        //saveStaff
    } else {
        echo 'provide type';
    }
}

if (isset($_GET['type'])) {
//echo "Check here";
    $type = $_GET['type'];
    if (!empty($type)) {
        if ($type == 'getstudents') {

            $new = new StudentClass();
            $new->getStudents();
        }
    } else {
        echo 'provide type';
    }
}