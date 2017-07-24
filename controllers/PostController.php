<?php

require_once 'classes/BeneficiaryClass.php';
require_once 'classes/ConfigurationClass.php';
$response = array();
if (isset($_GET['type'])) {
//echo "Check here";
    $type = $_GET['type'];
    if (!empty($type)) {
        if ($type == 'saveBeneficiary') {

            $saveBeneficiary = new BeneficiaryClass();
            $saveBeneficiary->setBeneficiary($_GET);
        } else if ($type == 'saveRegistrar') {
            //  print_r($_GET);
            $saveRegistrar = new BeneficiaryClass();
            $saveRegistrar->setRegistrar($_GET);
        } else if ($type == 'saveTypeDescriptions') {
            $type = $_GET['activityType'];
            $description = $_GET['descriptions'];

            $save_new = new ConfigurationClass();
            $save_new->setActivityTpeDescription($type, $description);
        } else if ($type == 'updateBeneficiary') {
            $update = new BeneficiaryClass();
            $update->upadteBeneficiary($_GET);
        } else if ($type == 'updateInformation') {
            echo 'ddddddd';
//            $update = new ConfigurationClass();
//            $update->updateFunction($_GET);
        } else if ($type == 'updateRegInformation') {
            $update = new ConfigurationClass();
            $update->updateRegFunction($_GET);
        } else if ($type == 'updateRegistrarInformation') {
            $update = new ConfigurationClass();
            $update->updateRegistrarsInfo($_GET);
        }
    } else {
        echo 'provide type';
    }
}

