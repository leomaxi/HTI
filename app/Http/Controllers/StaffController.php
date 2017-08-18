<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Staff;
use App\StaffAcademic;
use App\StaffBank;
use App\StaffEmployment;
use App\Users;
use App\Instituition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\StaffView;
use App\StaffEmploymentView;
use App\StaffAcademicView;

class StaffController extends Controller {

    public function showstaff() {
        $id = Session::get('id');

        if (empty($id)) {
            return redirect('logout');
        }
        return view('newstaffview');
    }

    public function showallstaff() {
        $id = Session::get('id');

        if (empty($id)) {
            return redirect('logout');
        }
        return view('staff');
    }

    public function showprincipal($code) {

        $id = Session::get('id');

        if (empty($id)) {
            return redirect('logout');
        }
        return view('newstaff')->with('instcode', $code);
    }

    public function showstaffdetails($code) {

        $staffinfo = $this->getStaffDetails($code);
        $staff_no = $this->getStaffNumber($code);
        $employment_details = $this->getStaffEmploymentDetails($staff_no);
        $academic_details = $this->getStaffAcademicDetails($staff_no);
        $bank_details = $this->getStaffBankDetails($staff_no);

        //      return $staffinfo;
        return view('staffdetails')->with('staffinfo', $staffinfo)->
                        with('employmentinfo', $employment_details)->
                        with('academicinfo', $academic_details)->
                        with('bankinfo', $bank_details);
    }

    public function getStaff() {

        if (Session::get('role') == "principal") {
            $instituition_code = Session::get('institute');
            return StaffView::where([ ['active', '=', 0], ['instituition_code', '=', $instituition_code]])->get();
        }
        return StaffView::where('active', 0)
                        ->get();
    }

    public function saveStaff(Request $request) {

        $data = $request->all();
        $response = array();
        $new = new Staff();
        $email_existence = $this->checkEmailExistence($data['email']);
        if ($email_existence == '0') {

            $staff_initials = $data['firstname'][0] . $data['middlename'][0] . $data['lastname'][0];

            $new->code = $this->generateuniqueCode(8);
            if (Session::get('role') == "principal") {
                $new->instituition_code = Session::get('institute');
            } else {
                $new->instituition_code = $data['institute_code'];
            }

            $new->staff_no = '';
            $new->firstname = $data['firstname'];
            $new->middlename = $data['middlename'];
            $new->surname = $data['lastname'];
            $new->gender = $data['gender'];
            $new->dob = $data['dateofbirth'];
            $new->place_of_birth = $data['placeofbirth'];
            $new->region = $data['region'];
            $new->nationality = $data['nationality'];
            $new->address = $data['address'];
            $new->suburb = $data['suburb'];
            $new->postcode = $data['postal_address'];
            $new->contact_no = $data['contactno'];
            $new->email_address = $data['email'];
            $new->marital_status = $data['marital_status'];
            $new->identification_number = $data['identification_number'];
            $new->identification_type = $data['identification_type'];
            $new->next_of_kin = $data['nextofkin'];
            $new->relationship = $data['kin_relationship'];
            $new->kin_address = $data['kin_address'];
            $new->kin_email = $data['kin_email'];
            $new->kin_contactno = $data['kin_contactno'];
            $new->kin_postcode = $data['kin_postal'];
            $new->years = $data['numberofyears'];
            $new->area_of_expertise = $data['areaofexpertise'];
            $new->highest_qualification = $data['highest_qualification'];
            $new->department = $data['department'];
            $new->createdby = Session::get('id');

            $saved = $new->save();
            $code = $new->code;
            $inserted_id = $new->id;

            $staffno = 'STF' . str_pad("$inserted_id", 5, '0', STR_PAD_LEFT) . $staff_initials;
            $this->updateStaffNo($staffno, $inserted_id);
            if (!$saved) {
                $response['success'] = '1';
                $response['message'] = 'Couldnt save';
                return json_encode($response);
            } else {
                $this->saveStaffAcademicDetails($staffno, $data);
                $this->saveStaffBankDetails($staffno, $data);
                $this->saveStaffEmploymentDetails($staffno, $data);

                if ($data['stafftype'] == "principalinfo") {
                    $this->setInstituitionPrincipal($new->instituition_code, $staffno);

                    $response['type'] = 'principal';
                } else {
                    $response['type'] = 'staff';
                }
                $this->saveUsers($code, $data, $response['type']);
                $response['success'] = '0';

                return json_encode($response);
            }
        }


        if ($email_existence == "1") {
            $response['success'] = '1';
            $response['message'] = 'Email already exists';
            return json_encode($response);
        }
    }

    private function updateStaffNo($staffno, $id) {


        $update = Staff::find($id);
        $update->staff_no = $staffno;
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    private function saveStaffAcademicDetails($staffno, $data) {


        $new = new StaffAcademic();
        if (Session::get('role') == "principal") {
            $new->instituition_code = Session::get('institute');
        } else {
            $new->instituition_code = $data['institute_code'];
        }
        $new->staff_no = $staffno;
        $new->program = $data['programofstudy'];
        $new->completion_year = $data['completion_year'];
        $new->certificate_type = $data['certificate_type'];
        $new->professional_body = $data['professional_body'];
        $new->professional_id = $data['professional_id'];
        $new->last_institution_completed = $data['last_institution_completed'];

        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    private function saveStaffBankDetails($staffno, $data) {


        $new = new StaffBank();
        if (Session::get('role') == "principal") {
            $new->instituition_code = Session::get('institute');
        } else {
            $new->instituition_code = $data['institute_code'];
        }
        $new->staff_no = $staffno;
        $new->bank = $data['bank_name'];
        $new->account_name = $data['account_name'];
        $new->account_number = $data['account_number'];
        $new->branch = $data['branch'];
        $new->tin = $data['tin'];
        $new->ssniit = $data['snnitno'];
        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {

            return '0';
        }
    }

    private function saveStaffEmploymentDetails($staffno, $data) {

        $new = new StaffEmployment();
        if (Session::get('role') == "principal") {
            $new->instituition_code = Session::get('institute');
        } else {
            $new->instituition_code = $data['institute_code'];
        }
        $new->staff_no = $staffno;
        $new->start_date = $data['startdate'];
        $new->current_appointment_date = $data['enddate'];
        $new->qualification = $data['qualification'];
        $new->grade = $data['grade'];
        $new->employment_type = $data['employment_type'];
        $new->staffid = $data['staffid'];

        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    private function setInstituitionPrincipal($instcode, $staff_no) {


        $update = Instituition::where('code', $instcode)->first();

        $update->principal_no = $staff_no;
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function deleteStaff($id) {


        $update = Staff::find($id);
        $update->active = '1';
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    private function saveUsers($code, $data, $type) {

        $new = new Users();
        if (Session::get('role') == "principal") {
            $new->instituition_code = Session::get('institute');
        } else {
            $new->instituition_code = $data['institute_code'];
        }
        $new->usercode = $code;
        $new->firstname = $data['firstname'] . ' ' . $data['middlename'] . ' ' . $data['lastname'];
        $new->email = $data['email'];
        $new->password = md5('123456');
        $new->role = $type;
        $new->usergroup = "null";
        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
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

    public function getInstitutionStaff($instutioncode) {

        return Staff::where('instituition_code', $instutioncode)
                        ->get();
    }

    public function getStaffDetails($staff_code) {

        return StaffView::where('code', $staff_code)
                        ->get();
    }

    public function getStaffAcademicDetails($staff_no) {

        return StaffAcademicView::where('staff_no', $staff_no)
                        ->get();
    }

    public function getStaffEmploymentDetails($staff_no) {

        return StaffEmploymentView::where('staff_no', $staff_no)
                        ->get();
    }

    public function getStaffBankDetails($staff_no) {

        return StaffBank::where('staff_no', $staff_no)
                        ->get();
    }

    public function getStaffNumber($staff_code) {


        $users = Staff::where('code', $staff_code)
                ->first();
        return $users['staff_no'];
        //return '12800';
    }

    public function updateStaffDetails(Request $request) {

        $data = $request->all();

        return $this->updateStaff($data);
    }

    public function updateStaff($data) {


        $new = Staff::where('code', $data['code'])
                ->first();
        // $email_existence = $this->checkEmailExistence($data['email']);


        if (!empty($data['institute_code'])) {
            $new->instituition_code = $data['institute_code'];
        }
        if (!empty($data['region'])) {
            $new->region = $data['region'];
        }
        if (!empty($data['department'])) {
            $new->department = $data['department'];
        }

        $new->staff_no = $data['staffno'];
        $new->firstname = $data['firstname'];
        $new->middlename = $data['middlename'];
        $new->surname = $data['lastname'];
        $new->gender = $data['gender'];
        $new->dob = $data['dateofbirth'];
        $new->place_of_birth = $data['placeofbirth'];
        $new->nationality = $data['nationality'];
        $new->address = $data['address'];
        $new->suburb = $data['suburb'];
        $new->postcode = $data['postal_address'];
        $new->contact_no = $data['contactno'];
        $new->email_address = $data['email'];
        $new->marital_status = $data['marital_status'];
        $new->identification_number = $data['identification_number'];
        $new->identification_type = $data['identification_type'];
        $new->next_of_kin = $data['nextofkin'];
        $new->relationship = $data['kin_relationship'];
        $new->kin_address = $data['kin_address'];
        $new->kin_email = $data['kin_email'];
        $new->kin_contactno = $data['kin_contactno'];
        $new->kin_postcode = $data['kin_postal'];
        $new->years = $data['numberofyears'];
        $new->area_of_expertise = $data['areaofexpertise'];
        $new->highest_qualification = $data['highest_qualification'];
        $new->createdby = Session::get('id');

        $saved = $new->save();

        if (!$saved) {
            return '1';
        } else {
            $this->updateStaffAcademicDetails($data);
            $this->updateStaffBankDetails($data);
            $this->updateStaffEmploymentDetails($data);
            return '0';
        }
    }

    private function updateStaffAcademicDetails($data) {


        $new = StaffAcademic::where('staff_no', $data['staffno'])
                ->first();

        if (!empty($data['institute_code'])) {
            $new->instituition_code = $data['institute_code'];
        }
        if (!empty($data['professional_body'])) {
            $new->professional_body = $data['professional_body'];
        }
        $new->program = $data['programofstudy'];
        $new->completion_year = $data['completion_year'];
        $new->certificate_type = $data['certificate_type'];
        $new->professional_id = $data['professional_id'];
        $new->last_institution_completed = $data['last_institution_completed'];

        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    private function updateStaffBankDetails($data) {


        $new = StaffBank::where('staff_no', $data['staffno'])
                ->first();
        if (!empty($data['institute_code'])) {
            $new->instituition_code = $data['institute_code'];
        }

        $new->bank = $data['bank_name'];
        $new->account_name = $data['account_name'];
        $new->account_number = $data['account_number'];
        $new->branch = $data['branch'];
        $new->tin = $data['tin'];
        $new->ssniit = $data['snnitno'];
        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {

            return '0';
        }
    }

    private function updateStaffEmploymentDetails($data) {

        $new = StaffEmployment::where('staff_no', $data['staffno'])
                ->first();
        if (!empty($data['institute_code'])) {
            $new->instituition_code = $data['institute_code'];
        }
        if (!empty($data['gradetype'])) {
            $new->grade = $data['gradetype'];
        }
        if (!empty($data['current_grade'])) {
            $new->current_grade = $data['current_grade'];
        }

        $new->start_date = $data['startdate'];
        $new->current_appointment_date = $data['enddate'];
        $new->qualification = $data['qualification'];
        $new->employment_type = $data['employment_type'];
        $new->staffid = $data['staffid'];

        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function checkEmailExistence($email) {

        $check = Users::where('email', '=', $email)->count();
        if ($check == 0) {
            //it doesnt exist 
            return '0';
        } else {
            //its exists
            return '1';
        }
    }

}
