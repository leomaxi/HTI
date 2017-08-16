<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;
use App\PermissionsRoles;
use App\Http\Controllers\AccountController;
use Illuminate\Database\Eloquent;

class LoginController extends Controller {

    public function authenticateUser(Request $request) {

        $data = $request->all();
        $email = $data['email'];
        $password = md5($data['password']);



        $users = Users::where([ ['email', '=', $email], ['password', '=', $password]])->get();

        if (!$users) {
            return '1';
        } else {
            $email = $users[0]['email'];
            $name = $users[0]['firstname'];
            $role = $users[0]['role'];
            $first_login = $users[0]['first_login'];
            $usergroup = $users[0]['usergroup'];
            $instuition = $users[0]['instituition_code'];
            $id = $users[0]['id'];
            $permissions = $this->getGroupPermissions($usergroup);

            $request->session()->put('name', $name);
            $request->session()->put('email', $email);
            $request->session()->put('first_login', $first_login);
            $request->session()->put('usergroup', $usergroup);
            $request->session()->put('institute', $instuition);
            $request->session()->put('role', $role);
            $request->session()->put('permissions', $permissions);
            $request->session()->put('id', $id);
            return $users;
        }
    }

    public function getGroupPermissions($id) {
        $permissions = PermissionsRoles::where('user_group_id', $id)->pluck('perm_keyword')->toArray();
        return $permissions;
    }

    public function updatePassword(Request $request) {

        $id = $request->session()->get('id');

        $data = $request->all();
        $password = $data['password'];
        $update = Users::find($id);
        $update->password = md5($password);
        $update->first_login = "NO";
        $save = $update->save();
        if (!$save) {
            return '1';
        } else {
            return '0';
        }
    }

}
