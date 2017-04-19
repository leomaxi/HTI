<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StaffClass
 *
 * @author naby
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$path = $_SERVER['DOCUMENT_ROOT'] . "/HTI";
require_once $path . '/databaseConnectionClass.php';

class StaffClass {

    //put your code here

    public function setStaff($info) {
        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database
        // $createdby = $_SESSION['htiuserid'];

        $existence = $this->checkStaffExistence($info['staffno']);
        if ($existence > 0) {
            $this->response['success'] = '0';
            $this->response['message'] = 'Staff exists already ';
            echo json_encode($this->response);
        } else {
            $code = $this->generateuniqueCode();
            if (isset($info['institute_code'])) {
                $institute_code = $info['institute_code'];
                $result = $this->checkInstitutionExistence($institute_code);
                if ($result == 0) {
                    $this->response['success'] = '0';
                    $this->response['message'] = 'Institution does not exists ';

                    return json_encode($this->response);
                }
                $staff_type = 'principal';
            } else {
                $staff_type = 'normal ';
                $institute_code = 'sess';
            }

            $query = mysqli_query($conn, "INSERT INTO staff(code,instituition_code,staff_no,firstname,middlename,surname,gender,dob,place_of_birth,region,nationality,"
                    . "address,suburb,postcode,contact_no,email_address,marital_status,identification_number,identification_type,next_of_kin,relationship,kin_address,"
                    . "kin_email,kin_contactno,kin_postcode,highest_qualification,current_appointment_date,years,staff_class,area_of_expertise,"
                    . "department)"
                    . " VALUES "
                    . "('" . mysqli_real_escape_string($conn, $code) . "','" . mysqli_real_escape_string($conn, $institute_code) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['staffno']) . "','" . mysqli_real_escape_string($conn, $info['firstname']) . "','" . mysqli_real_escape_string($conn, $info['middlename']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['lastname']) . "','" . mysqli_real_escape_string($conn, $info['gender']) . "','" . mysqli_real_escape_string($conn, $info['dateofbirth']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['placeofbirth']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['region']) . "','" . mysqli_real_escape_string($conn, $info['nationality']) . "','" . mysqli_real_escape_string($conn, $info['address']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['suburb']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['postal_address']) . "','" . mysqli_real_escape_string($conn, $info['contactno']) . "','" . mysqli_real_escape_string($conn, $info['email']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['marital_status']) . "','" . mysqli_real_escape_string($conn, $info['identification_number']) . "','" . mysqli_real_escape_string($conn, $info['identification_type']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['nextofkin']) . "','" . mysqli_real_escape_string($conn, $info['kin_relationship']) . "','" . mysqli_real_escape_string($conn, $info['kin_address']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['kin_email']) . "','" . mysqli_real_escape_string($conn, $info['kin_contactno']) . "','" . mysqli_real_escape_string($conn, $info['kin_postal']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['highest_qualification']) . "','" . mysqli_real_escape_string($conn, $info['appointment_date']) . "','" . mysqli_real_escape_string($conn, $info['numberofyears']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['staff_class']) . "','" . mysqli_real_escape_string($conn, $info['areaofexpertise']) . "','" . mysqli_real_escape_string($conn, $info['department']) . "')");

            if ($query) {

                $this->setStaffAcademicDetails($institute_code, $info);
                $this->setStaffBankDetails($info);
                $this->setStaffEmploymentDetails($info);

                if ($staff_type == 'principal') {
                    $this->updatePrincipalno($institute_code, $info['staffno']);
                }
                $this->response['success'] = '1';
                $this->response['message'] = 'Staff saved successfully';
                $this->response['type'] = $staff_type;



                echo json_encode($this->response);
            } else {
                $this->response['success'] = '0';
                $this->response['message'] = 'couldnt save' . mysqli_error($conn);
                echo json_encode($this->response);
            }
        }



        $connection->closeConnection($conn);
    }

    private function setStaffBankDetails($info) {
        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database

        mysqli_query($conn, "INSERT INTO Staff_bank_details(staff_no,bank,account_name,account_number,branch,tin)"
                . " VALUES "
                . "('" . mysqli_real_escape_string($conn, $info['staffno']) . "',"
                . "'" . mysqli_real_escape_string($conn, $info['bank_name']) . "','" . mysqli_real_escape_string($conn, $info['account_name']) . "','" . mysqli_real_escape_string($conn, $info['account_number']) . "',"
                . "'" . mysqli_real_escape_string($conn, $info['branch']) . "','" . mysqli_real_escape_string($conn, $info['tin']) . "')");

        $connection->closeConnection($conn);
    }

    private function setStaffAcademicDetails($institute_code, $info) {
        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database

        mysqli_query($conn, "INSERT INTO Staff_academic_details(staff_no,instituition,program,completion_year,certificate_type,professional_body,professional_id)"
                . " VALUES "
                . "('" . mysqli_real_escape_string($conn, $info['staffno']) . "','" . mysqli_real_escape_string($conn, $institute_code) . "',"
                . "'" . mysqli_real_escape_string($conn, $info['programofstudy']) . "','" . mysqli_real_escape_string($conn, $info['completion_year']) . "','" . mysqli_real_escape_string($conn, $info['certificate_type']) . "','" . mysqli_real_escape_string($conn, $info['professional_body']) . "',"
                . "'" . mysqli_real_escape_string($conn, $info['professional_id']) . "')");


        $connection->closeConnection($conn);
    }

    private function setStaffEmploymentDetails($info) {
        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database

        mysqli_query($conn, "INSERT INTO Staff_employment_details(staff_no,start_date,end_date,qualification,grade,employment_type,staff_class,staffid)"
                . " VALUES "
                . "('" . mysqli_real_escape_string($conn, $info['staffno']) . "','" . mysqli_real_escape_string($conn, $info['startdate']) . "',"
                . "'" . mysqli_real_escape_string($conn, $info['enddate']) . "','" . mysqli_real_escape_string($conn, $info['qualification']) . "','" . mysqli_real_escape_string($conn, $info['grade']) . "',"
                . "'" . mysqli_real_escape_string($conn, $info['employment_type']) . "','" . mysqli_real_escape_string($conn, $info['staff_class']) . "','" . mysqli_real_escape_string($conn, $info['staffid']) . "')");

        $connection->closeConnection($conn);
    }

    private function checkStaffExistence($staff_no) {
        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database
        $query = mysqli_query($conn, "SELECT * FROM staff WHERE staff_no='" . mysqli_real_escape_string($conn, $staff_no) . "'");
        $connection->closeConnection($conn);

        return mysqli_num_rows($query);
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

    private function checkInstitutionExistence($code) {
        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database
        $query = mysqli_query($conn, "SELECT * FROM instituitions WHERE code='" . mysqli_real_escape_string($conn, $code) . "'");
        $connection->closeConnection($conn);

        return mysqli_num_rows($query);
    }

    private function updatePrincipalno($instituite_code, $staffno) {
        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database
        mysqli_query($conn, "UPDATE instituitions SET principal_no =  '" . mysqli_real_escape_string($conn, $staffno) . "' WHERE code='" . mysqli_real_escape_string($conn, $instituite_code) . "'");
        $connection->closeConnection($conn);
    }
    
     public function getStaff() {
        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database
        $query = mysqli_query($conn, "SELECT * FROM staff ");
        //print("Hello here");
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                $results[] = $row;
            }
            $feedback = json_encode($results);
            //  $query->close();
        } else {

            $feedback = json_encode($this->response);
        }

        echo $feedback;
        $connection->closeConnection($conn);
    }

}
