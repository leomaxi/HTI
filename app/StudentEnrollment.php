<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentEnrollment extends Model {

    // public $timestamps = false;
    protected $table = 'students_enrollment_details';

    const CREATED_AT = 'datecreated';
    const UPDATED_AT = 'last_modified_date';

}
