<?php

namespace App\Models;

use CodeIgniter\Model;

class Student_Locations_Model extends Model
{
    protected $table = "tbl_student_locations";
    protected $primary_key = "id";
    protected $allowedFields = [
        'created_at',
        'modified_at',
        'account_id',
        'latitude',
        'longitude',
        'middle_name',
        'is_login',
    ];
}
