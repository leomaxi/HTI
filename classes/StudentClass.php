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

class StudentClass {

    //put your code here
    var $response = array();

    public function setStudent($info) {
        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database
        // $createdby = $_SESSION['htiuserid'];
        print_r($info);
        $existence = $this->checkStudentExistence($info['email']);
        if ($existence > 0) {
            $this->response['success'] = '0';
            $this->response['message'] = 'Student exists already ';
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
                
            } else {
           
                $institute_code = $_SESSION['institute_code'];
            }
            $this->setUsers($institute_code, $info, 'student');

            $query = mysqli_query($conn, "INSERT INTO students(code,instituition_code,student_no,firstname,middlename,surname,gender,dob,place_of_birth,region,nationality,"
                    . "address,suburb,postcode,contact_no,email_address,marital_status,identification_number,identification_type,next_of_kin,relationship,kin_address,"
                    . "kin_email,kin_contactno,kin_postcode,guardian_firstname,guardian_surname,guardian_address,guardian_suburb,guardian_contact,"
                    . "guardian_emailaddress)"
                    . " VALUES "
                    . "('" . mysqli_real_escape_string($conn, $code) . "','" . mysqli_real_escape_string($conn, $institute_code) . "',"
                    . "'" . mysqli_real_escape_string($conn, $code) . "','" . mysqli_real_escape_string($conn, $info['firstname']) . "','" . mysqli_real_escape_string($conn, $info['middlename']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['lastname']) . "','" . mysqli_real_escape_string($conn, $info['gender']) . "','" . mysqli_real_escape_string($conn, $info['dateofbirth']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['placeofbirth']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['region']) . "','" . mysqli_real_escape_string($conn, $info['nationality']) . "','" . mysqli_real_escape_string($conn, $info['address']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['suburb']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['postal_address']) . "','" . mysqli_real_escape_string($conn, $info['contactno']) . "','" . mysqli_real_escape_string($conn, $info['email']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['marital_status']) . "','" . mysqli_real_escape_string($conn, $info['identification_number']) . "','" . mysqli_real_escape_string($conn, $info['identification_type']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['nextofkin']) . "','" . mysqli_real_escape_string($conn, $info['kin_relationship']) . "','" . mysqli_real_escape_string($conn, $info['kin_address']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['kin_email']) . "','" . mysqli_real_escape_string($conn, $info['kin_contactno']) . "','" . mysqli_real_escape_string($conn, $info['kin_postal']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['guardian_firstname']) . "','" . mysqli_real_escape_string($conn, $info['guardian_lastname']) . "','" . mysqli_real_escape_string($conn, $info['guardian_address']) . "','" . mysqli_real_escape_string($conn, $info['guardian_suburb']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['guardian_contact']) . "','" . mysqli_real_escape_string($conn, $info['guardian_email']) . "')");

            if ($query) {

                $this->setStudentAcademicDetails($code, $institute_code, $info);
                $this->setStudentBankDetails($code, $institute_code, $info);
                $this->setStudentEnrollmentDetails($code, $institute_code, $info);
              
               
                $this->response['success'] = '1';
                $this->response['message'] = 'Staff saved successfully';
                echo json_encode($this->response);
            } else {
                $this->response['success'] = '0';
                $this->response['message'] = 'couldnt save' . mysqli_error($conn);
                echo json_encode($this->response);
            }
        }


        $connection->closeConnection($conn);
        
        
    }

    private function setStudentBankDetails($code,$institute_code,$info) {
        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database

        mysqli_query($conn, "INSERT INTO students_bank_details(student_no,instituition_code,bank_name,account_name,account_no,branch,tin,bsb,superannutation_name,start_date)"
                . " VALUES "
                . "('" . mysqli_real_escape_string($conn, $code) . "',"
                . "'" . mysqli_real_escape_string($conn, $institute_code) . "','" . mysqli_real_escape_string($conn, $info['bank_name']) . "','" . mysqli_real_escape_string($conn, $info['account_name']) . "','" . mysqli_real_escape_string($conn, $info['account_number']) . "',"
                . "'" . mysqli_real_escape_string($conn, $info['branch']) . "','" . mysqli_real_escape_string($conn, $info['tin']) . "','" . mysqli_real_escape_string($conn, $info['BSB']) . "','" . mysqli_real_escape_string($conn, $info['superannutation_fund']) . "','" . mysqli_real_escape_string($conn, $info['startdate']) . "')");
        $connection->closeConnection($conn);
    }

    private function setStudentAcademicDetails($code,$institute_code, $info) {
        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database

        mysqli_query($conn, "INSERT INTO students_academic_details(student_no,instituition_code,program,completion_year,examination_type,aggregate,last_instituition)"
                . " VALUES "
                . "('" . mysqli_real_escape_string($conn,$code) . "','" . mysqli_real_escape_string($conn, $institute_code) . "',"
                . "'" . mysqli_real_escape_string($conn, $info['programofstudy']) . "','" . mysqli_real_escape_string($conn, $info['completion_year']) . "','" . mysqli_real_escape_string($conn, $info['examination_type']) . "','" . mysqli_real_escape_string($conn, $info['aggregate']) . "',"
                . "'" . mysqli_real_escape_string($conn, $info['last_institution_completed']) . "')");

        $connection->closeConnection($conn);
    }

    private function setUsers($institute_code, $info, $role) {
        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database
        $password = md5('123456');

        mysqli_query($conn, "INSERT INTO users(instituition_code,firstname,email,password,role)"
                . " VALUES "
                . "('" . mysqli_real_escape_string($conn, $institute_code) . "',"
                . "'" . mysqli_real_escape_string($conn, $info['firstname']) . "','" . mysqli_real_escape_string($conn, $info['email']) . "','" . mysqli_real_escape_string($conn, $password) . "','" . mysqli_real_escape_string($conn, $role) . "')");


        $connection->closeConnection($conn);
    }

     private function setStudentEnrollmentDetails($code,$institute_code,$info) {
        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database

        mysqli_query($conn, "INSERT INTO students_enrollment_details(student_no,instituition_code,program,admission_year,professional_body,sitting_year,results)"
                . " VALUES "
                . "('" . mysqli_real_escape_string($conn, $code) . "',"
                . "'" . mysqli_real_escape_string($conn, $institute_code) . "','" . mysqli_real_escape_string($conn, $info['program']) . "','" . mysqli_real_escape_string($conn, $info['admission_year']) . "','" . mysqli_real_escape_string($conn, $info['professional_body']) . "',"
                . "'" . mysqli_real_escape_string($conn, $info['year_of_seating']) . "','" . mysqli_real_escape_string($conn, $info['results']) . "')");

        $connection->closeConnection($conn);
    }


    private function checkStudentExistence($email) {
        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database
        $query = mysqli_query($conn, "SELECT * FROM students WHERE  email='" . mysqli_real_escape_string($conn, $email) . "'");
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

    public function getStudents() {
        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database
       
       
            $query = mysqli_query($conn, "select students.*,instituitions.name AS institute_name from students LEFT JOIN instituitions ON `students`.`instituition_code` = instituitions.code WHERE students.active=0 ");
        

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
