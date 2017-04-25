<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$path = $_SERVER['DOCUMENT_ROOT'] . "/HTI";
require_once $path . '/databaseConnectionClass.php';

class InstitutionClass {

    //put your code here
    var $response = array();

    public function setInstituition($info) {
        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database
        // $createdby = $_SESSION['htiuserid'];

        $existence = $this->checkInstitutionExistence($info['code']);
        if ($existence > 0) {
            $this->response['success'] = '0';
            $this->response['message'] = 'Institution exists already ';
            echo json_encode($this->response);
        } else {
            $createdby = 2;
            $query = mysqli_query($conn, "INSERT INTO instituitions(code,name,region,district,location,longitude,latitude,date_of_establishment,createdby)"
                    . " VALUES "
                    . "('" . mysqli_real_escape_string($conn, $info['code']) . "','" . mysqli_real_escape_string($conn, $info['institution_name']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['region']) . "','" . mysqli_real_escape_string($conn, $info['district']) . "','" . mysqli_real_escape_string($conn, $info['location']) . "',"
                    . "'" . mysqli_real_escape_string($conn, $info['longitude']) . "','" . mysqli_real_escape_string($conn, $info['latitude']) . "','" . mysqli_real_escape_string($conn, $info['date_established']) . "','" . mysqli_real_escape_string($conn, $createdby) . "')");

            if ($query) {


                $sql = array();
                foreach ($info['institution_types'] as $row) {
                    $sql[] = '("' . mysqli_real_escape_string($conn, $info['code']) . '","' . mysqli_real_escape_string($conn, $row) . '",2)';
                }
                $this->saveInstituitionTypes($sql);

                $this->response['success'] = '1';
                $this->response['message'] = 'Insituition saved successfully';
                $this->response['code'] = $info['code'];



                echo json_encode($this->response);
            } else {
                $this->response['success'] = '0';
                $this->response['message'] = 'couldnt save' . mysqli_error($conn);
                echo json_encode($this->response);
            }
        }



        $connection->closeConnection($conn);
    }

    private function checkInstitutionExistence($code) {
        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database
        $query = mysqli_query($conn, "SELECT * FROM instituitions WHERE code='" . mysqli_real_escape_string($conn, $code) . "'");
        $connection->closeConnection($conn);

        return mysqli_num_rows($query);
    }

    public function saveInstituitionTypes($data) {

        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database
        mysqli_query($conn, 'INSERT INTO institution_institutetypes (insitution_code, insitute_type_code,addedby) VALUES ' . implode(',', $data));
    }

    public function getInstitutions() {
        $connection = new databaseConnection(); //i created a new object
        $conn = $connection->connectToDatabase(); // connected to the database
        $query = mysqli_query($conn, "select instituitions.*,CONCAT(staff.firstname, ' ', staff.surname) AS staff_name   from instituitions LEFT JOIN staff ON instituitions.principal_no= `staff`.`staff_no`  WHERE instituitions.active=0 ");
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
