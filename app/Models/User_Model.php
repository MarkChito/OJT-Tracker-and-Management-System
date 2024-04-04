<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model
{
    protected $table = "tbl_users";
    protected $primary_key = "id";
    protected $allowedFields = [
        'name',
        'username',
        'password',
        'user_type',
    ];
}
