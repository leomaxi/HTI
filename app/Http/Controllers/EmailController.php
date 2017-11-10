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

class EmailController extends Controller {

    public function showemailgroups() {

        $groups = DB::table('emails_groups')->where('user_id', session('id'))->get();

        return view('emailgroups')->with('groups',$groups);
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
    
    

}
