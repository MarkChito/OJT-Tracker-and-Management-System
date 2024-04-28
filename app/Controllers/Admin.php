<?php

namespace App\Controllers;

use App\Models\Account_Model;
use App\Models\Attendance_Model;

class Admin extends BaseController
{
    public function records()
    {
        $data["current_tab"] = "Records";
        $user_id = session()->get("user_id");
        $user_type = session()->get("user_type");

        $Account_Model = new Account_Model();
        $Attendance_Model = new Attendance_Model();

        $account_data = $Account_Model->where('id', $user_id)->first();

        $data["user_id"] = $user_id;
        $data["user_type"] = $user_type;
        $data["name"] = $account_data["name"];
        $data["Account_Model"] = $Account_Model;

        $attendance_data = $Attendance_Model->orderBy('id', 'DESC')->findAll();

        $data["attendance_data"] = $attendance_data;

        $header = view('templates/header', $data);
        $body = view('pages/admin/records_view');
        $footer = view('templates/footer');

        return $header . $body . $footer;
    }
}
