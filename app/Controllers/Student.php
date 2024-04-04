<?php

namespace App\Controllers;

class Student extends BaseController
{
    public function index()
    {
        $is_login = $this->request->getGet(md5("is_login"));
        $is_mobile = $this->request->getGet(md5("is_mobile"));
        $true = sha1("true");

        if ($is_login != $true || $is_mobile != $true) {
            http_response_code(403);

            return "Access is forbidden.";
        }

        $data["current_tab"] = "attendance";

        $data["id"] = $this->request->getGet("id");
        $data["name"] = $this->request->getGet("name");
        $data["username"] = $this->request->getGet("username");
        $data["password"] = $this->request->getGet("password");
        $data["user_type"] = $this->request->getGet("user_type");

        $header = view('templates/header', $data);
        $body = view('pages/student/attendance_view');
        $footer = view('templates/footer');

        return $header . $body . $footer;
    }
}
