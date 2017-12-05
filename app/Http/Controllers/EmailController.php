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

    public function showreceivedmesages() {

        $messages = $this->getReceivedMessages();
        $receivedmessages = json_decode($messages, true);
        return view('receivedmessages')->with('messages', $receivedmessages);
    }

    public function showsentmessages() {

        $messages = $this->getSentMessages();
        $sentmessages = json_decode($messages, true);
        return view('sentmessages')->with('messages', $sentmessages);
    }

    public function showcomposemessage() {


        return view('composemessage');
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

    public function createNewGroupMembers(Request $request) {

        $data = $request->all();
        $result = $this->createEmailMembers($data['groupid'], $data['members']);
        return $result;
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

    public function sendMessage(Request $request) {

        $data = $request->all();



        $message = $data['message'];
        $subject = $data['subject'];


        $messageid = $this->saveMessage($message, $subject);
        if (isset($data['individuals'])) {
            $individuals = $data['individuals'];
            if (sizeof($individuals > 0)) {
                $this->saveMessageReceipients($individuals, $messageid);
            }
        }

        if (isset($data['groups'])) {
            $groups = $data['groups'];
            if (sizeof($groups > 0)) {
                $this->saveMessageGroupReceipients($groups, $messageid);
            }
        }
        $files = $request->file('files');

        if ($request->hasFile('files')) {
            foreach ($files as $file) {

                $filename = $file->getClientOriginalName();
                $path = $file->store('emailfiles');
                $this->saveMessageAttachments($messageid, $filename, $path);
            }
        }

        echo '0';
    }

    public function saveMessage($message, $subject) {
        $senderid = session('id');
        $messageid = DB::table('emails_messages')->insertGetId(
                ['sender_id' => $senderid, 'message' => $message, 'subject' => $subject]
        );

        return $messageid;
    }

    public function saveMessageAttachments($messageid, $filename, $path) {

        $path = str_replace("emailfiles/", "", $path);
        DB::table('emails_attachments')->insert(
                ['message_id' => $messageid, 'filename' => $filename, 'path' => $path]
        );

        return $messageid;
    }

    public function saveMessageReceipients($receipients, $messageid) {
        $results = array();
        $data = array();
        foreach ($receipients as $value) {

            $data['message_id'] = $messageid;
            $data['receipient_id'] = $value;
            array_push($results, $data);
        }

        $query = DB::table('emails_receipients')->insert($results);

//        if ($query) {
//            echo '0';
//        } else {
//            echo '1';
//        }
    }

    public function saveMessageGroupReceipients($groups, $messageid) {
        $results = array();
        $data = array();

        $receipients = DB::table('email_members')
                ->whereIn('group_id', $groups)
                ->get();


        $receipients = json_decode($receipients, true);

        foreach ($receipients as $value) {

            $data['message_id'] = $messageid;
            $data['receipient_id'] = $value['member_id'];
            $data['group_id'] = $value['group_id'];

            array_push($results, $data);
        }

        $query = DB::table('emails_receipients')->insert($results);
    }

    public function getSentMessages() {
        $userid = session('id');
        $messages = DB::table('emails_messages_view')->where('sender_id', $userid)->get();
        return $messages;
    }

    public function getReceivedMessages() {
        // $userid = session('id');

        $messages = DB::table('emails_messages_view')
                ->whereIn('id', function ($query) {
                    $query->select('message_id')->from('emails_receipients')
                    ->Where('receipient_id', '=', session('id'));
                })
                ->get();

        return $messages;
    }

    public function getMessageDetail($messageid) {
        // $userid = session('id');

        $messagedetails = DB::table('emails_messages_view')->where('id', $messageid)->get();
        //$result = $details->toArray();
        $individualreceipeints = DB::table('emails_receipients_view')
                        ->where(array(
                            'message_id' => $messageid,
                            'group_id' => null
                        ))->pluck('receiver_name');
        $groupreceipeints = DB::table('emails_receipients_view')
                        ->where('message_id', $messageid)->whereNotNull('group_id')
                        ->distinct()->get(['group_name'])->pluck('group_name');

//        $groupreceipeints = DB::table('emails_receipients_view')->where('message_id', $messageid)
//                        ->distinct()->get(['receiver_name', 'group_name']);

        $messageattachments = DB::table('emails_attachments')->where('message_id', $messageid)
                ->get();


        //return $details;

        $dataarray = array(
            'details' => $messagedetails,
            'individualreceipients' => $individualreceipeints,
            'groupreceipients' => $groupreceipeints,
            'attachments' => $messageattachments
        );
        return $dataarray;
    }

    public function download($filename) {

        $path = storage_path('app/emailfiles/' . $filename);

        //  $headers = array('Content-Type' => File::mimeType($path));

        return response()->download($path, $filename);
    }

}
