<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffAcademic extends Model {

    //public $timestamps = false;
    protected $table = 'Staff_academic_details';

    const CREATED_AT = 'datecreated';
    const UPDATED_AT = 'last_modified_date';

}
