<?php

namespace App\Models;

use CodeIgniter\Model;

class Attendance_Model extends Model
{
    protected $table = "tbl_ojttrackerandmanagementsystem_attendance";
    protected $primary_key = "id";
    protected $allowedFields = [
        'created_at',
        'modified_at',
        'account_id',
        'time_in',
        'time_out',
        'status',
        'login_location',
        'logout_location',
    ];
}
