<?php

namespace App\Controllers;

use App\Models\User_Model;

class API extends BaseController
{
    public function check_connection()
    {
        $response = array(
            "status" => 200,
            "message" => "connected"
        );

        echo json_encode($response);
    }

    public function login()
    {
        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");

        $response = "false";

        $User_Model = new User_Model();

        $user = $User_Model->where('username', $username)->first();

        if ($user && password_verify(strval($password), $user["password"])) {
            $response = $user["id"] . "|" . $user["name"] . "|" . $user["username"] . "|" . $user["password"] . "|" . $user["user_type"];
        }

        echo $response;
    }

    public function logout()
    {
        $body = view('pages/student/loading_view');

        return $body;
    }
}
