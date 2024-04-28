<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= ucfirst($current_tab) ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>student/attendance?<?= $_SERVER['QUERY_STRING'] ?>">Attendance</a></li>
                        <li class="breadcrumb-item active"><?= ucfirst($current_tab) ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-hover data-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time In</th>
                                        <th>Time Out</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($attendance_data): ?>
                                        <?php foreach ($attendance_data as $attendance_data_row): ?>
                                            <tr>
                                                <td><?= date("Y-m-d", strtotime($attendance_data_row["created_at"])) ?></td>
                                                <td><?= date("h:i a", strtotime($attendance_data_row["time_in"])) ?></td>
                                                <td><?= date("h:i a", strtotime($attendance_data_row["time_out"])) ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>