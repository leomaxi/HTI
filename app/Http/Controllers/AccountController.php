<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserGroups;
use App\Users;
use App\PermissionsRoles;
use App\Permissions;
use App\UsersView;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller {

    public function showUserGroups() {
        $id = Session::get('id');

        if (empty($id)) {
            return redirect('logout');
        }
        return view('usergroups');
    }

    public function showrolesandpermissions() {
        $id = Session::get('id');

        if (empty($id)) {
            return redirect('logout');
        }
        return view('rolesandpermissions');
    }

    public function showusers() {
        $id = Session::get('id');

        if (empty($id)) {
            return redirect('logout');
        }
        return view('users');
    }

    public function getUserGroups() {
        $id = Session::get('id');

        if (empty($id)) {
            return redirect('logout');
        }

        return UserGroups::where('active', 0)
                        ->get();
    }

    public function getUsers() {
        return UsersView::all();
    }

    public function deleteUserGroup($id) {


        $update = UserGroups::find($id);
        $update->active = "1";
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function updateUserGroup(Request $request) {

        $data = $request->all();
        $id = $data['code'];
        $update = UserGroups::find($id);
        $update->name = $data['name'];
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function saveUserGroup(Request $request) {

        $data = $request->all();
        $new = new UserGroups();

        $new->name = $data['name'];
        $new->createdby = "nana";
        $saved = $new->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function updateUserInfo(Request $request) {

        $data = $request->all();
        $id = $data['userid'];
        $update = Users::find($id);
        $update->usergroup = $data['userGroup'];
        $update->firstname = $data['name'];
        $update->email = $data['email'];
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function getPermissions() {
        return Permissions::all();
    }

    public function getGroupPermissions($id) {
        return PermissionsRoles::where('user_group_id', $id)
                        ->get();
    }

    public function assignGroupRoles(Request $request) {
        $data = $request->all();
        $permissions = $data['permissions'];
        $usergoup = $data['usergroups'];
        $dataset = [];
        //delete
        $delete = PermissionsRoles::where('user_group_id', $usergoup);
        $delete->delete();

        foreach ($permissions as $item) {
            $dataset[] = array(
                'user_group_id' => $usergoup,
                'perm_keyword' => $item
            );
        }

        $saved = PermissionsRoles::insert($dataset); // Eloquent
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function getUserInfo($id) {
        return Users::where('id', $id)
                        ->get();
    }

    public function saveUserInfo(Request $request) {
        $data = $request->all();
        $response = array();
        $new = new Users();
        $existence = $this->checkEmailExistence($data['email']);
        if ($existence == 0) {
            $new->firstname = $data['name'];
            $new->email = $data['email'];
            $new->createdby = Session::get('id');
            $new->role = 'system generated';
            $saved = $new->save();
            if (!$saved) {
                $response['success'] = 1;
                $response['message'] = 'Could not save';
                return $response;
            } else {
                $response['success'] = 0;
                $response['message'] = 'User Information Saved Successfully';
                return $response;
            }
        }
        if ($existence == 1) {
            $response['success'] = 1;
            $response['message'] = 'Email already exist';
            return $response;
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
