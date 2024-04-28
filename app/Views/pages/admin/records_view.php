<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= ucfirst($current_tab) ?></h1>
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
                                        <th>Student Name</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($attendance_data) : ?>
                                        <?php foreach ($attendance_data as $attendance_data_row) : ?>
                                            <?php
                                            $account_data = $Account_Model->where('id', $attendance_data_row["account_id"])->first();
                                            $student_name = $account_data["name"];
                                            ?>
                                            <tr>
                                                <td><?= $student_name ?></td>
                                                <td class="text-center">
                                                    <i class="fas fa-eye text-success view-attendance-details" role="button" student_name="<?= $student_name ?>" time_in="<?= date("h:i a", strtotime($attendance_data_row["time_in"])) ?>" time_out="<?= date("h:i a", strtotime($attendance_data_row["time_out"])) ?>" status="<?= $attendance_data_row["status"] ?>" account_id="<?= $attendance_data_row["account_id"] ?>" login_location="<?= $attendance_data_row["login_location"] ?>" logout_location="<?= $attendance_data_row["logout_location"] ?>"></i>
                                                </td>
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