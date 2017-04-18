<?php

require_once '../classes/ConfigurationClass.php';
$response = array();
//echo "Check here";
if (isset($_GET['type'])) {
//echo "Check here";
    $type = $_GET['type'];
    if (!empty($type)) {
        if ($type == 'saveRegion') {
            if (isset($_GET['region'])) {

                $name = $_GET['region'];
               
                $new_region = new ConfigurationClass();
                $new_region->setRegion($name);
            }
        } else if ($type == 'retreiveRegion') {
            $getAllregions = new ConfigurationClass();
            $getAllregions->getRegion();
        } else if ($type == 'saveDistrict') {

            if (isset($_GET['district'])) {
                $name = $_GET['district'];

                $new_district = new ConfigurationClass();
                $new_district->setDistrict($name);
            }
        } else if ($type == 'retreiveDistricts') {

            $getdistricts = new ConfigurationClass();
            $alldistricts = $getdistricts->getDistricts();
        } else if ($type == 'retreiveUnAssignedDistricts') {

            $getUnassigneddistricts = new ConfigurationClass();
            $getUnassigneddistricts->getUnAssignedDistricts();
        } else if ($type == 'retreiveRegionDistricts') {

            $getregiondistricts = new ConfigurationClass();
            $getregiondistricts->getRegionDistricts();
        } else if ($type == 'saveDepartment') {
            if (isset($_GET['department_name'])) {

                $department = $_GET['department_name'];
              
                $save_new = new ConfigurationClass();
                $save_new->setDepartment($department);
            }
        } else if ($type == 'retreiveDepartments') {

            $getdepartments = new ConfigurationClass();
            $getdepartments->getDepartments();
        } else if ($type == 'saveInstitutionType') {
            if (isset($_GET['instutution_type'])) {

                $institution_type = $_GET['instutution_type'];

                $save_new = new ConfigurationClass();
              $save_new->setInstitutionType($institution_type);
            }
        } else if ($type == 'retreiveInstitutionTypes') {

            $getinsitutiontypes = new ConfigurationClass();
            $getinsitutiontypes->getInstitutionsTypes();
        }  else if ($type == 'retreiveDistrictsBasedOnRegion') {
           
            $region_code = $_GET['region_code'];
            $getDistrictsBasedOnRegion = new ConfigurationClass();
            $getDistrictsBasedOnRegion->getDistrictsBasedOnRegion($region_code);
        }  else if ($type == 'saveGrade') {

            $type = $_GET['name'];
            $save_new = new ConfigurationClass();
            $save_new->setGrade($type);
        } else if ($type == 'retreivegradeTypes') {

            $getgradeTypes = new ConfigurationClass();
            $getgradeTypes->getGradeTypes();
        } else if ($type == 'saveActivityDescription') {

            $type = $_GET['name'];
            $save_new = new ConfigurationClass();
            $save_new->setActivityDescription($type);
        } else if ($type == 'retreiveActivityDesc') {

            $getActivityDesc = new ConfigurationClass();
            $getActivityDesc->getActivityDescriptions();
        } else if ($type == 'retreivenassignedActivityDescriptions') {

            $getUnassActivityDesc = new ConfigurationClass();
            $getUnassActivityDesc->getUnAssignedActivityDescriptionType();
        } else if ($type == 'retreiveActivityDescriptions') {

            $geActivityDesc = new ConfigurationClass();
            $geActivityDesc->getActivityDescriptionTypes();
        } else if ($type == 'retreiveDescriptionBasedOnActivityType') {

            $type_code = $_GET['type_code'];
            $getData = new ConfigurationClass();
            $getData->getActivityDescriptionBasedOnType($type_code);
        } else if ($type == 'saveCommodity') {
            $name = $_GET['commodity'];
            $new_region = new ConfigurationClass();
            $new_region->setCommodity($name);
        }else if ($type == 'retreiveCommodity') {
            $getAllregions = new ConfigurationClass();
            $getAllregions->getCommodities();
        } else if ($type == 'saveEmploymentType') {
            $name = $_GET['name'];
            $save = new ConfigurationClass();
            $save->setEmploymentType($name);
        }else if ($type == 'retreiveEmploymentTypes') {
            $get = new ConfigurationClass();
            $get->getEmploymentTypes();
        }else if ($type == 'saveStaff') {
            print_r($_GET);
        }
        //saveStaff
    } else {
        echo 'provide type';
    }
}

