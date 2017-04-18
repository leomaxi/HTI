<?php

require_once '../classes/StaffClass.php';
$response = array();
//echo "Check here";
if (isset($_POST['type'])) {
//echo "Check here";
    $type = $_POST['type'];
    if (!empty($type)) {
        if ($type == 'saveStaff') {
          //  print_r($_POST);
            $new_staff = new StaffClass();
           $new_staff->setStaff($_POST);
        }
        //saveStaff
    } else {
        echo 'provide type';
    }
}

