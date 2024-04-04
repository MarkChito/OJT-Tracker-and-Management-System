<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        // session()->set("current_tab", "login");

        $body = view('pages/admin/login_view');
        
        return $body;
    }
}
