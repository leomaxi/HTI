<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

//use App\Instituition;


class InstituitionController extends Controller {

    public function newinstituitiion() {

        return view('newinstitution');
    }

    public function showinstitutions() {

        return view('institutions');
    }

    public function getInstitutions() {
        $institutions = App\Instituition::all();

        echo $institutions;
        //return \GuzzleHttp\json_encode($institutions);
        //  return view('user.index', ['users' => $users]);
    }

}
