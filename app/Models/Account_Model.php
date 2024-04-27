<?php

namespace App\Models;

use CodeIgniter\Model;

class Account_Model extends Model
{
    protected $table = "tbl_accounts";
    protected $primary_key = "id";
    protected $allowedFields = [
        'created_at',
        'modified_at',
        'name',
        'username',
        'password',
        'user_type',
    ];
}
