<?php

namespace App\Controllers;

class Student extends BaseController
{
    public function index()
    {
        $body = view('pages/student/dashboard_view');
        
        return $body;
    }
}
