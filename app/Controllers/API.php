<?php

namespace App\Controllers;

use App\Models\Account_Model;
use App\Models\Student_Model;
use App\Models\Student_Locations_Model;
use App\Models\Attendance_Model;

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
        $Student_Locations_Model = new Student_Locations_Model();

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

            $student_location_new_data = [
                'created_at' => $created_at,
                'account_id' => $account_id,
            ];

            $Student_Locations_Model->save($student_location_new_data);

            session()->set("notification", array(
                "title" => "Success!",
                "text" => "Your student data has been saved!",
                "icon" => "success",
            ));
        }

        echo json_encode($response);
    }

    public function admin_login()
    {
        $response = false;

        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");

        $Account_Model = new Account_Model();

        $account_data = $Account_Model->where('username', $username)->first();

        if ($account_data) {
            $user_id = $account_data["id"];
            $name = $account_data["name"];
            $user_type = $account_data["user_type"];
            $hash = $account_data["password"];

            if (password_verify(strval($password), $hash)) {
                session()->set("user_id", $user_id);
                session()->set("user_type", $user_type);

                session()->set("notification", array(
                    "title" => "Success!",
                    "text" => "Welcome, " . $name . "!",
                    "icon" => "success",
                ));

                $response = array("user_id" => $user_id);
            } else {
                session()->set("notification", array(
                    "title" => "Oops...",
                    "text" => "Invalid Username or Password!",
                    "icon" => "error",
                ));
            }
        } else {
            session()->set("notification", array(
                "title" => "Oops...",
                "text" => "Invalid Username or Password!",
                "icon" => "error",
            ));
        }

        echo json_encode($response);
    }

    public function student_login()
    {
        $response = false;

        $modified_at = date("Y-m-d H:i:s");
        $student_number = $this->request->getPost("student_number");
        $password = $this->request->getPost("password");

        $Account_Model = new Account_Model();
        $Student_Model = new Student_Model();
        $Student_Locations_Model = new Student_Locations_Model();

        $student_data = $Student_Model->where('student_number', $student_number)->first();

        if ($student_data) {
            $account_id = $student_data["account_id"];

            $account_data = $Account_Model->where('id', $account_id)->first();

            $hash = $account_data["password"];
            $name = $account_data["name"];
            $user_type = $account_data["user_type"];

            if (password_verify(strval($password), $hash)) {
                session()->set("user_id", $account_id);
                session()->set("user_type", $user_type);

                session()->set("notification", array(
                    "title" => "Success!",
                    "text" => "Welcome, " . $name . "!",
                    "icon" => "success",
                ));

                $student_location_new_data = [
                    "modified_at" => $modified_at,
                ];

                $Student_Locations_Model->where("account_id", $account_id)->set($student_location_new_data)->update();

                $response = array("user_id" => $account_id);
            } else {
                session()->set("notification", array(
                    "title" => "Oops...",
                    "text" => "Invalid Student Number or Password!",
                    "icon" => "error",
                ));
            }
        } else {
            session()->set("notification", array(
                "title" => "Oops...",
                "text" => "Invalid Student Number or Password!",
                "icon" => "error",
            ));
        }

        echo json_encode($response);
    }

    public function update_student_location()
    {
        $modified_at = date("Y-m-d H:i:s");
        $user_id = $this->request->getPost("user_id");
        $latitude = $this->request->getPost("latitude");
        $longitude = $this->request->getPost("longitude");

        $Student_Locations_Model = new Student_Locations_Model();

        $student_location_new_data = [
            "modified_at" => $modified_at,
            "latitude" => $latitude,
            "longitude" => $longitude,
        ];

        $Student_Locations_Model->where("account_id", $user_id)->set($student_location_new_data)->update();
    }

    public function time_in()
    {
        $created_at = date("Y-m-d H:i:s");
        $user_id = $this->request->getPost("user_id");
        $time_in = date("Y-m-d H:i:s");
        $status = "In";

        $Student_Locations_Model = new Student_Locations_Model();

        $student_location_data = $Student_Locations_Model->where('account_id', $user_id)->first();

        if (($student_location_data["latitude"] && $student_location_data["longitude"]) && (($student_location_data["latitude"] != "not found") && ($student_location_data["longitude"] != "not found"))) {
            $Attendance_Model = new Attendance_Model();

            $attendance_new_data = [
                "created_at" => $created_at,
                "account_id" => $user_id,
                "time_in" => $time_in,
                "status" => $status,
                "login_location" => $student_location_data["latitude"] . "," . $student_location_data["longitude"],
            ];

            $Attendance_Model->save($attendance_new_data);

            session()->set("notification", array(
                "title" => "Success!",
                "text" => "Login Time: " . date("h:i a"),
                "icon" => "success",
            ));
        } else {
            session()->set("notification", array(
                "title" => "Oops...",
                "text" => "Can't Login! Please check your GPS.",
                "icon" => "error",
            ));
        }

        echo json_encode(true);
    }

    public function time_out()
    {
        $modified_at = date("Y-m-d H:i:s");
        $user_id = $this->request->getPost("user_id");
        $attendance_id = $this->request->getPost("attendance_id");
        $time_out = date("Y-m-d H:i:s");
        $status = "Out";

        $Student_Locations_Model = new Student_Locations_Model();

        $student_location_data = $Student_Locations_Model->where('account_id', $user_id)->first();

        if (($student_location_data["latitude"] && $student_location_data["longitude"]) && (($student_location_data["latitude"] != "not found") && ($student_location_data["longitude"] != "not found"))) {
            $Attendance_Model = new Attendance_Model();

            $attendance_new_data = [
                "modified_at" => $modified_at,
                "time_out" => $time_out,
                "status" => $status,
                "logout_location" => $student_location_data["latitude"] . "," . $student_location_data["longitude"],
            ];

            $Attendance_Model->where("id", $attendance_id)->set($attendance_new_data)->update();

            session()->set("notification", array(
                "title" => "Success!",
                "text" => "Logout Time: " . date("h:i a"),
                "icon" => "success",
            ));
        } else {
            session()->set("notification", array(
                "title" => "Oops...",
                "text" => "Can't Logout! Please check your GPS.",
                "icon" => "error",
            ));
        }

        echo json_encode(true);
    }

    public function logout()
    {
        $admin_location = null;

        if (session()->get("user_type") == "admin") {
            $admin_location = "login/admin";
        } else {
            $Student_Locations_Model = new Student_Locations_Model();

            $account_id = session()->get("user_id");
            $modified_at = date("Y-m-d H:i:s");

            $student_location_new_data = [
                "modified_at" => $modified_at,
                "is_login" => 0,
            ];

            $Student_Locations_Model->where("account_id", $account_id)->set($student_location_new_data)->update();

            session()->remove("user_id");

            session()->set("notification", array(
                "title" => "Success!",
                "text" => "You had been signed out!",
                "icon" => "success",
            ));
        }

        return redirect()->to(base_url() . $admin_location);
    }
}
