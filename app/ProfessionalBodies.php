<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessionalBodies extends Model {

    //public $timestamps = false;
    protected $table = 'professional_bodies';

   
    const CREATED_AT = 'updated_at';
    const UPDATED_AT = 'created_At';

}
