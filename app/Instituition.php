<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituition extends Model {

    // public $timestamps = false;
    protected $table = 'instituitions';

    const CREATED_AT = 'date_created';
    const UPDATED_AT = 'last_modified_date';

}
