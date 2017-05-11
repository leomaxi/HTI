<?php

require_once '../classes/InstituitionClass.php';
require_once '../classes/ConfigurationClass.php';
require_once '../classes/AccountClass.php';
$response = array();
if (isset($_REQUEST['type'])) {
//echo "Check here";
    $type = $_REQUEST['type'];
    if (!empty($type)) {
        if ($type == 'deleteInstitution') {
            $code = $_REQUEST['code'];
            $deleteInstitution = new InstitutionClass();
            $deleteInstitution->deleteInstitution($code);
        }
    } else {
        echo 'provide type';
    }
}

