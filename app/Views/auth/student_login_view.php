<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OJT Tracker and Management System - Login</title>

    <link rel="shortcut icon" href="<?= base_url() ?>public/img/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/style.css">
</head>

<body class="login-body">
    <!-- Login Form -->
    <div class="login-wrapper">
        <div class="login-form" style="width: 95%;">
            <div class="alert alert-danger text-center fade d-none" id="div_alert_message" role="alert">
                <span id="span_alert_message">Invalid Username or Password</span>
            </div>

            <div class="card">
                <div class="card-header text-center">
                    <img src="./public/img/logo.png" style="width: 100px; height: 100px; border-radius: 50%;" alt="Logo" class="mb-2 mt-3 login-image">
                    <h1 style="font-size: 30px;">OJT Tracker and Management System</h1>
                </div>
                <div class="card-body">
                    <p class="text-center mb-4 login-body-title" style="font-size: 18px;">Please login to proceed</p>

                    <form action="javascript:void(0)" id="login_form">
                        <div class="form-group mb-3">
                            <label for="login_student_number" class="mb-0">Student Number</label>
                            <input type="text" class="form-control" id="login_student_number" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="login_password" class="mb-0">Password</label>
                            <input type="password" class="form-control" id="login_password" required>
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="login_show_password">
                            <label class="form-check-label" for="login_show_password">Show Password</label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100" id="login_submit">Login</button>

                        <div class="mt-2">
                            <span>Don't have an account?</span>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#register_modal">Register here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="register_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create an Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="javascript:void(0)" id="register_form">
                    <div class="modal-body">
                        <div class="page-loading py-5 d-none">
                            <div class="loading-parent">
                                <div class="loading-container">
                                    <div class="loading"></div>
                                    <div id="loading-text">Loading</div>
                                </div>
                            </div>
                        </div>
                        <div class="actual-form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="register_student_number">Student Number</label>
                                        <input type="text" class="form-control" id="register_student_number" required>
                                        <small class="text-danger d-none" id="error_register_student_number">Invalid Student Number</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="register_first_name">First Name</label>
                                        <input type="text" class="form-control" id="register_first_name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="register_middle_name">Middle Name (Optional)</label>
                                        <input type="text" class="form-control" id="register_middle_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="register_last_name">Last Name</label>
                                        <input type="text" class="form-control" id="register_last_name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="register_password">Password</label>
                                        <input type="password" class="form-control" id="register_password" required>
                                        <small class="text-danger d-none" id="error_register_password">Passwords do not match</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="register_confirm_password">Confirm Password</label>
                                        <input type="password" class="form-control" id="register_confirm_password" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="register_submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="<?= base_url() ?>public/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>public/js/adminlte.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
        jQuery(document).ready(function() {
            const base_url = "<?= base_url() ?>";
            const notification = <?= session()->get('notification') ? json_encode(session()->get('notification')) : json_encode(null) ?>;

            $("#div_alert_message").removeClass("alert-success");
            $("#div_alert_message").removeClass("alert-danger");

            disable_developer_functions(true);

            if (notification) {
                alert_message(notification);
            }

            if (!isMobileOrTablet()) {
                location.href = base_url + "browser_error";
            }

            $("#login_show_password").change(function() {
                var passwordField = $("#login_password");
                var passwordFieldType = passwordField.attr("type");

                if ($(this).is(":checked")) {
                    passwordField.attr("type", "text");
                } else {
                    passwordField.attr("type", "password");
                }
            })

            $("#register_form").submit(function() {
                const student_number = $("#register_student_number").val();
                const first_name = $("#register_first_name").val();
                const middle_name = $("#register_middle_name").val();
                const last_name = $("#register_last_name").val();
                const password = $("#register_password").val();
                const confirm_password = $("#register_confirm_password").val();

                let name = first_name + " " + last_name;

                if (middle_name) {
                    const middle_initial = middle_name.trim().charAt(0).toUpperCase() + ".";

                    name = first_name + " " + middle_initial + " " + last_name;
                }

                var errors = 0;

                if (error_student_number(student_number)) {
                    $("#error_register_student_number").text(error_student_number(student_number));
                    $("#error_register_student_number").removeClass("d-none");
                    $("#register_student_number").addClass("is-invalid");

                    errors++;
                }

                if (error_password(password, confirm_password)) {
                    $("#error_register_password").text(error_password(password, confirm_password));
                    $("#error_register_password").removeClass("d-none");

                    $("#register_password").addClass("is-invalid");
                    $("#register_confirm_password").addClass("is-invalid");

                    errors++;
                }

                if (errors == 0) {
                    $(".actual-form").addClass("d-none");
                    $(".page-loading").removeClass("d-none");

                    $("#register_submit").text("Please wait...");
                    $("#register_submit").attr("disabled", true);

                    var formData = new FormData();

                    formData.append('student_number', student_number);
                    formData.append('first_name', first_name);
                    formData.append('middle_name', middle_name);
                    formData.append('last_name', last_name);
                    formData.append('name', name);
                    formData.append('password', password);

                    $.ajax({
                        url: base_url + 'register',
                        data: formData,
                        type: 'POST',
                        dataType: 'JSON',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (!response) {
                                location.href = base_url;
                            } else {
                                const student_number_error = response.student_number_error;

                                if (student_number_error) {
                                    $("#error_register_student_number").text(student_number_error);
                                    $("#error_register_student_number").removeClass("d-none");
                                    $("#register_student_number").addClass("is-invalid");
                                }

                                $("#register_submit").removeAttr("disabled");
                                $("#register_submit").text("Submit");

                                $(".actual-form").removeClass("d-none");
                                $(".page-loading").addClass("d-none");
                            }
                        },
                        error: function(_, _, error) {
                            console.error(error);
                        }
                    })
                }
            })

            $("#register_student_number").keydown(function() {
                $("#register_student_number").removeClass("is-invalid");
                $("#error_register_student_number").addClass("d-none");
            })

            $("#register_mobile_number").keydown(function() {
                $("#register_mobile_number").removeClass("is-invalid");
                $("#error_register_mobile_number").addClass("d-none");
            })

            $("#register_password").keydown(function() {
                $("#register_password").removeClass("is-invalid");
                $("#register_confirm_password").removeClass("is-invalid");

                $("#error_register_password").addClass("d-none");
            })

            $("#register_confirm_password").keydown(function() {
                $("#register_password").removeClass("is-invalid");
                $("#register_confirm_password").removeClass("is-invalid");

                $("#error_register_password").addClass("d-none");
            })

            $("#login_form").submit(function() {
                const student_number = $("#login_student_number").val();
                const password = $("#login_password").val();

                $("#login_submit").text("Please wait...");
                $("#login_submit").attr("disabled", true);

                var formData = new FormData();

                formData.append('student_number', student_number);
                formData.append('password', password);

                formData.append('student_login', true);

                $.ajax({
                    url: base_url + 'student/login',
                    data: formData,
                    type: 'POST',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response) {
                            location.href = base_url + "student/attendance?user_id=" + response.user_id;
                        } else {
                            location.href = base_url;
                        }
                    },
                    error: function(_, _, error) {
                        console.error(error);
                    }
                });
            })

            $('#login_student_number').on('keydown', function(e) {
                var value = $(this).val();
                var key = e.keyCode || e.which;

                if (value.length === 2 && key !== 8 && value.indexOf('-') === -1) {
                    value = value.substring(0, 2) + "-" + value.substring(2);

                    $(this).val(value);
                }
            })

            $('#register_student_number').on('keydown', function(e) {
                var value = $(this).val();
                var key = e.keyCode || e.which;

                if (value.length === 2 && key !== 8 && value.indexOf('-') === -1) {
                    value = value.substring(0, 2) + "-" + value.substring(2);

                    $(this).val(value);
                }
            })

            function error_student_number(inputString) {
                var pattern = /^\d{2}-\d{5}$/;

                if (pattern.test(inputString)) {
                    return false;
                } else {
                    return "Invalid Student Number format.";
                }

                return pattern.test(inputString);
            }

            function error_mobile_number(mobile_number) {
                var pattern = /^09/;

                if (mobile_number.length != 11) {
                    return "Mobile Number must be 11 digits long";
                } else if (!pattern.test(mobile_number)) {
                    return "Mobile Number must start with 09";
                } else {
                    return false;
                }
            }

            function error_password(password, confirm_password) {
                if (password != confirm_password) {
                    return "Passwords do not match";
                } else if (password.length < 8) {
                    return "Password must be at least 8 digits long";
                } else {
                    return false;
                }
            }

            function alert_message(notification) {
                const title = notification.title;
                const text = notification.text;
                const icon = notification.icon;

                var alert_color = null;

                switch (icon) {
                    case "success":
                        alert_color = "alert-success";

                        break;
                    case "error":
                        alert_color = "alert-danger";

                        break;
                    case "warning":
                        alert_color = "alert-warning";

                        break;
                    default:
                        // Pass
                }

                $("#div_alert_message").removeClass("d-none");
                $("#div_alert_message").addClass(alert_color + " show");
                $("#span_alert_message").text(text);

                setTimeout(function() {
                    $('#div_alert_message').alert('close');
                }, 3000);
            }

            function disable_developer_functions(enabled) {
                if (enabled) {
                    $(document).on('contextmenu', function() {
                        return false;
                    });

                    $(document).on('keydown', function(event) {
                        if (event.ctrlKey && event.shiftKey) {
                            if (event.keyCode === 74) {
                                return false;
                            }

                            if (event.keyCode === 67) {
                                return false;
                            }

                            if (event.keyCode === 73) {
                                return false;
                            }
                        }

                        if (event.ctrlKey && event.keyCode === 85) {
                            return false;
                        }
                    });
                }
            }

            function isMobileOrTablet() {
                var mobileRegex = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i;
                var tabletRegex = /Tablet|iPad/i;

                var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

                if (mobileRegex.test(navigator.userAgent) || (tabletRegex.test(navigator.userAgent) && screenWidth < 1025)) {
                    return true;
                } else {
                    return false;
                }
            }
        })
    </script>
</body>

</html>

<?php session()->remove("notification") ?>