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

class AccountController extends Controller {

    public function showUserGroups() {

        return view('usergroups');
    }

    public function showrolesandpermissions() {

        return view('rolesandpermissions');
    }

    public function showusers() {
        return view('users');
    }

    public function getUserGroups() {
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

}
