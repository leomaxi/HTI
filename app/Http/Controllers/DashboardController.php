<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller {

   

  public function showdashboard() {

    // echo 'goood';
      return view('dashboard');
    }


}
