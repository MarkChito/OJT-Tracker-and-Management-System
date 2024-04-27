<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        $body = view('auth/login_view');
        
        return $body;
    }
}
