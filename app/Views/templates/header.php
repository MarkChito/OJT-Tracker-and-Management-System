<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $current_tab ?> - OJT Monitoring and Management System</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)">
                        <i class="far fa-bell"></i>
                        <!-- <span class="badge badge-warning navbar-badge">15</span> -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">0 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <!-- <a href="javascript:void(0)" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> 1 new message
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a> -->
                        <span class="dropdown-item text-center text-muted py-3">No new messages</span>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0)" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>logout" role="button">
                        <i class="fas fa-sign-out-alt text-danger"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url() ?>public/img/default_user_image.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="javascript:void(0)" class="d-block"><?= $name ?></a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>student/attendance?<?= $_SERVER['QUERY_STRING'] ?>" class="nav-link <?= $current_tab == "attendance" ? "active" : null ?>">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>Attendance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>student/attendance_records?<?= $_SERVER['QUERY_STRING'] ?>" class="nav-link">
                                <i class="nav-icon fas fa-list-alt"></i>
                                <p>View Records</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>student/profile?<?= $_SERVER['QUERY_STRING'] ?>" class="nav-link">
                                <i class="nav-icon fas fa-user-alt"></i>
                                <p>Manage Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>logout" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>