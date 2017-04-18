<?php

require_once '../classes/InstituitionClass.php';
require_once '../classes/ConfigurationClass.php';
$response = array();
if (isset($_POST['type'])) {
//echo "Check here";
    $type = $_POST['type'];
    if (!empty($type)) {
        if ($type == 'saveinstitution') {

            $new = new InstitutionClass();
            $new->setInstituition($_POST);
        }
    } else {
        echo 'provide type';
    }
}

if (isset($_GET['type'])) {
//echo "Check here";
    $type = $_GET['type'];
    if (!empty($type)) {
        if ($type == 'getinstitutions') {

            $new = new InstitutionClass();
            $new->getInstitutions();
        }
    } else {
        echo 'provide type';
    }
}