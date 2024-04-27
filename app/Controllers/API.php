<?php

namespace App\Controllers;

use App\Models\Account_Model;
use App\Models\Student_Model;

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

    public function register()
    {
        $created_at = date("Y-m-d H:i:s");
        $student_number = $this->request->getPost("student_number");
        $first_name = $this->request->getPost("first_name");
        $middle_name = $this->request->getPost("middle_name");
        $last_name = $this->request->getPost("last_name");
        $name = $this->request->getPost("name");
        $password = $this->request->getPost("password");

        $Account_Model = new Account_Model();
        $Student_Model = new Student_Model();

        $response = false;

        $student_data = $Student_Model->where('student_number', $student_number)->first();

        if ($student_data) {
            $response = array(
                "student_number_error" => "Student Number is already in use."
            );
        } else {
            $account_data = [
                'created_at' => $created_at,
                'name' => $name,
                'password' => password_hash(strval($password), PASSWORD_BCRYPT),
                'user_type' => "student",
            ];

            $Account_Model->save($account_data);

            $account_id = $Account_Model->insertID();

            $student_new_data = [
                'created_at' => $created_at,
                'account_id' => $account_id,
                'student_number' => $student_number,
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name,
            ];

            $Student_Model->save($student_new_data);

            session()->set("notification", array(
                "title" => "Success!",
                "text" => "Your student data has been saved!",
                "icon" => "success",
            ));
        }

        echo json_encode($response);
    }
}
