<?php

namespace App\Controllers;

use App\Models\Student_Model;
use App\Models\Attendance_Model;

class Student extends BaseController
{
    public function attendance()
    {
        $data["current_tab"] = "Attendance";
        $user_id = session()->get("user_id");
        $user_type = session()->get("user_type");

        $Student_Model = new Student_Model();
        $Attendance_Model = new Attendance_Model();

        $student_data = $Student_Model->where('account_id', $user_id)->first();

        $middle_name = $student_data["middle_name"] ? $student_data["middle_name"][0] . ". " : null;

        $data["user_id"] = $user_id;
        $data["user_type"] = $user_type;
        $data["name"] = $student_data["first_name"] . " " . $middle_name . $student_data["last_name"];
        
        $data["created_at"] = null;
        $data["modified_at"] = null;
        $data["time_in"] = null;
        $data["time_out"] = null;
        $data["status"] = null;

        $attendance_data = $Attendance_Model->where('account_id', $user_id)->like("created_at", date("Y-m-d"))->first();

        if ($attendance_data) {
            $data["attendance_id"] = $attendance_data["id"];
            $data["created_at"] = $attendance_data["created_at"];
            $data["modified_at"] = $attendance_data["modified_at"];
            $data["time_in"] = $attendance_data["time_in"];
            $data["time_out"] = $attendance_data["time_out"];
            $data["status"] = $attendance_data["status"];
        }

        $header = view('templates/header', $data);
        $body = view('pages/student/attendance_view');
        $footer = view('templates/footer');

        return $header . $body . $footer;
    }

    public function attendance_records()
    {
        $data["current_tab"] = "Attendance Records";
        $user_id = session()->get("user_id");
        $user_type = session()->get("user_type");

        $Student_Model = new Student_Model();
        $Attendance_Model = new Attendance_Model();

        $student_data = $Student_Model->where('account_id', $user_id)->first();

        $middle_name = $student_data["middle_name"] ? $student_data["middle_name"][0] . ". " : null;

        $data["user_id"] = $user_id;
        $data["user_type"] = $user_type;
        $data["name"] = $student_data["first_name"] . " " . $middle_name . $student_data["last_name"];

        $attendance_data = $Attendance_Model->where('account_id', $user_id)->orderBy('id', 'DESC')->findAll();

        $data["attendance_data"] = $attendance_data;

        $header = view('templates/header', $data);
        $body = view('pages/student/attendance_records_view');
        $footer = view('templates/footer');

        return $header . $body . $footer;
    }
}
