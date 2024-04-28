<?php

namespace App\Models;

use CodeIgniter\Model;

class Student_Locations_Model extends Model
{
    protected $table = "tbl_ojttrackerandmanagementsystem_studentlocations";
    protected $primary_key = "id";
    protected $allowedFields = [
        'created_at',
        'modified_at',
        'account_id',
        'latitude',
        'longitude',
    ];
}
