<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model {

    
  
   protected $table = 'staff';

     const CREATED_AT = 'datecreated';
    const UPDATED_AT = 'last_modified_date';

}
