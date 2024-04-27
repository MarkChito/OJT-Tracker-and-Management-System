<?php

namespace App\Controllers;

use App\Models\Account_Model;
use App\Models\Student_Model;

class Student extends BaseController
{
    public function index()
    {
        $user_id = session()->get("user_id");

        $Student_Model = new Student_Model();

        $student_data = $Student_Model->where('account_id', $user_id)->first();

        $middle_name = $student_data["middle_name"] ? $student_data["middle_name"][0] . ". " : null;

        $data["current_tab"] = "attendance";
        $data["user_id"] = $user_id;
        $data["name"] = $student_data["first_name"] . " " . $middle_name . $student_data["last_name"];

        $header = view('templates/header', $data);
        $body = view('pages/student/attendance_view');
        $footer = view('templates/footer');

        return $header . $body . $footer;
    }
}
