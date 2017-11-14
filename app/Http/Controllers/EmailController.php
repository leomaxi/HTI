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
use App\EmailGroups;

class EmailController extends Controller {

    public function showemailgroups() {


        return view('emailgroups');
    }

    public function getEmailGroups() {
        //  $groups = DB::table('emails_groups')->where('user_id', session('id'))->get();

        $groups = EmailGroups::where(array(
                    'active' => 0,
                    'user_id' => session('id')
                ))->get();
        return $groups;
    }

    public function createEmailGroups(Request $request) {

        $data = $request->all();
        $groupname = $data['groupname'];
        $members = $data['members'];
        $userid = session('id');

        $id = DB::table('emails_groups')->insertGetId(
                array('user_id' => $userid, 'name' => "$groupname")
        );
        if ($id > 0) {
            echo $this->createEmailMembers($id, $members);
        } else {
            echo '1';
        }
    }

    public function createEmailMembers($groupid, $members) {

        $results = array();
        $data = array();
        foreach ($members as $value) {

            $data['group_id'] = $groupid;
            $data['member_id'] = $value;
            array_push($results, $data);
        }


        $query = DB::table('email_members')->insert($results);

        if ($query) {
            echo '0';
        } else {
            echo '1';
        }
    }

    public function updateEmailGroups(Request $request) {
        $data = $request->all();

        $id = $data['code'];
        $update = EmailGroups::find($id);
        $update->name = $data['name'];
        $saved = $update->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function deleteEmailGroups($id) {


        $delete = EmailGroups::find($id);

        $delete->active = '1';
        $saved = $delete->save();
        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

    public function getEmailGroupMembers($id) {

        $members = DB::table('email_members_view')->where('group_id', $id)->get();
        return $members;
    }

    public function deleteEmailGroupMember($id) {

        $saved = DB::table('email_members')->where('member_id', '=', $id)->delete();

        if (!$saved) {
            return '1';
        } else {
            return '0';
        }
    }

}
