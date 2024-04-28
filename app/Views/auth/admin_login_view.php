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
                    <img src="<?= base_url() ?>public/img/logo.png" style="width: 100px; height: 100px; border-radius: 50%;" alt="Logo" class="mb-2 mt-3 login-image">
                    <h1 style="font-size: 30px;">OJT Tracker and Management System</h1>
                    <h6>(Administrator Login)</h6>
                </div>
                <div class="card-body">
                    <p class="text-center mb-4 login-body-title" style="font-size: 18px;">Please login to proceed</p>

                    <form action="javascript:void(0)" id="login_form">
                        <div class="form-group mb-3">
                            <label for="login_username" class="mb-0">Username</label>
                            <input type="text" class="form-control" id="login_username" required>
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
                    </form>
                </div>
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

            $("#login_form").submit(function() {
                const username = $("#login_username").val();
                const password = $("#login_password").val();

                $("#login_submit").text("Please wait...");
                $("#login_submit").attr("disabled", true);

                var formData = new FormData();

                formData.append('username', username);
                formData.append('password', password);

                formData.append('student_login', true);

                $.ajax({
                    url: base_url + 'admin/login',
                    data: formData,
                    type: 'POST',
                    dataType: 'JSON',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response) {
                            location.href = base_url + "admin/records?user_id=" + response.user_id;
                        } else {
                            location.href = base_url + "login/admin";
                        }
                    },
                    error: function(_, _, error) {
                        console.error(error);
                    }
                });
            })

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