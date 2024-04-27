<?php

namespace App\Models;

use CodeIgniter\Model;

class Student_Model extends Model
{
    protected $table = "tbl_students";
    protected $primary_key = "id";
    protected $allowedFields = [
        'created_at',
        'modified_at',
        'account_id',
        'student_number',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'mobile_number',
        'program',
        'school_branch',
        'year_level',
    ];
}
