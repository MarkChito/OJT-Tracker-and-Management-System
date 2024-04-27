<?php

namespace App\Controllers;

class Errors extends BaseController
{
    public function index()
    {
        $body = view('errors/browser_error');
        
        return $body;
    }
}
