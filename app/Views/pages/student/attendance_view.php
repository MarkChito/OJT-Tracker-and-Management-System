<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= ucfirst($current_tab) ?></h1>
                </div>
                <!-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>student/attendance?<?= $_SERVER['QUERY_STRING'] ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= ucfirst($current_tab) ?></li>
                    </ol>
                </div> -->
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <img src="<?= base_url() ?>public/img/default_user_image.png" alt="" style="width: 100px; height: 100px; border-radius: 50%;" class="img-bordered mb-3">
                                <h3><?= $name ?></h3>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <strong>Date:</strong>
                                </div>
                                <div class="col-8">
                                    <span><?= date("F d, Y") ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <strong>Time In:</strong>
                                </div>
                                <div class="col-8">
                                    <span class="<?= $time_in ? null : "text-muted" ?>"><?= $time_in ? date("h:i a", strtotime($time_in)) : "Not Yet Available" ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <strong>Time Out:</strong>
                                </div>
                                <div class="col-8">
                                    <span class="<?= $time_out ? null : "text-muted" ?>"><?= $time_out ? date("h:i a", strtotime($time_out)) : "Not Yet Available" ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <strong>Status:</strong>
                                </div>
                                <div class="col-8">
                                    <span class="<?= !$status || $status == "Out" ? "text-danger" : "text-success" ?>"><?= $status ? $status : "Out" ?></span>
                                </div>
                            </div>

                            <?php $button_visible = false ?>

                            <?php if (!$status) : ?>
                                <button class="btn btn-primary mt-3 w-100" id="btn_time_in">Time In</button>

                                <?php $button_visible = true ?>
                            <?php endif ?>

                            <?php if ($status == "In") : ?>
                                <button class="btn btn-danger mt-3 w-100" id="btn_time_out" attendance_id="<?= $attendance_id ?>">Time Out</button>

                                <?php $button_visible = true ?>
                            <?php endif ?>

                            <?php if (!$button_visible) : ?>
                                <div class="mt-3">
                                    <h6 class="text-muted">
                                        <strong>Note:</strong>
                                        <span>Your next login is tommorow.</span>
                                    </h6>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>