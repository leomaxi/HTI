<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Instituition;
use App\InstituitionInstituteTypes;
use App\Http\Controllers\ConfigurationController;
use App\InstituitionProfessionalBodies;
use Illuminate\Support\Facades\Session;
use App\Users;
use App\Staff;

//use App\Instituition;


class InstituitionController extends Controller {

    public function newinstituitiion() {

        return view('newinstitution');
    }

    public function showinstitutions() {

        return view('institutions');
    }

    public function updateInstitution(Request $request) {

        $data = $request->all();



        $institutetypes = $data['institution_types'];
        $professionalbodies = $data['professional_bodies'];
        $new = Instituition::where('code', $data['code'])
                ->get();
        $old_principal = $new[0]['principal_no'];

        $update = Instituition::where('code', $data['code'])
                ->first();
        $update->name = $data['institution_name'];
        $update->region = $data['region'];
        $update->district = $data['district'];
        $update->location = $data['location'];
        $update->longitude = $data['longitude'];
        $update->latitude = $data['latitude'];
        $update->date_of_establishment = $data['date_established'];

//        if (!empty($data['principal'])) {
//            $update->principal_no = $data['principal'];
//            $new_usercode = $this->getStaffCode($data['principal'], $data['code']);
//            $this->updateUser($new_usercode, 'principal');
//        }

        $update->last_modifiedby = Session::get('id');

        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            $this->deleteInstituteInstitutionTypes($data['code']);
            $this->deleteInstituitionProfessionalBodies($data['code']);
            $old = new ConfigurationController();
            $old->saveInstituteInstitutionTypes($data['code'], $institutetypes);
            $new = new ConfigurationController();
            $new->saveInstituteProfessionalBodies($data['code'], $professionalbodies);

//            if (!empty($data['principal'])) {
//                $old_usercode = $this->getStaffCode($old_principal, $data['code']);
//                $this->updateUser($old_usercode, 'staff');
//                
//            }
            return '0';
        }
    }

    public function deleteInstituteInstitutionTypes($institution_code) {


        $delete = InstituitionInstituteTypes::where('insitution_code', $institution_code)
                ->delete();

        if (!$delete) {
            return '1';
        } else {
            return '0';
        }
    }

    public function deleteInstituitionProfessionalBodies($institution_code) {


        $delete = InstituitionProfessionalBodies::where('insitution_code', $institution_code)
                ->delete();

        if (!$delete) {
            return '1';
        } else {
            return '0';
        }
    }

    public function getStaffCode($staffno, $institute_code) {


        $users = Staff::where([ ['instituition_code', '=', $institute_code], ['staff_no', '=', $staffno]])->first();

        return $users['code'];
    }

    public function updateUser($usercode, $role) {

        $users = Users::where('usercode', $usercode)
                ->first();
        $users->role = $role;
        $users->save();
    }

}
