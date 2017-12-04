<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    // public $timestamps = false;
    protected $table = 'students';

    const CREATED_AT = 'datecreated';
    const UPDATED_AT = 'last_modified_date';

}
