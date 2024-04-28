<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function student_login()
    {
        $body = view('auth/student_login_view');
        
        return $body;
    }
    
    public function admin_login()
    {
        $body = view('auth/admin_login_view');
        
        return $body;
    }
}
