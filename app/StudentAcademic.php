<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAcademic extends Model {

    // public $timestamps = false;
    protected $table = 'students_academic_details';

    const CREATED_AT = 'datecreated';
    const UPDATED_AT = 'last_modified_date';

}
