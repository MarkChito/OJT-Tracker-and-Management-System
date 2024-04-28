<footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="javascript:void(0)">OJT Tracker and Management System</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>

<!-- Attendance Details Modal -->
<div class="modal fade" id="attendance_details_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Attendance Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <img src="<?= base_url() ?>public/img/default_user_image.png" alt="" style="width: 100px; height: 100px; border-radius: 50%" class="img-bordered">
                </div>
                <div class="row">
                    <div class="col-4">
                        <strong>Name:</strong>
                    </div>
                    <div class="col-8">
                        <span id="attendance_details_name">Mark Chito R. Anteja</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <strong>Time In:</strong>
                    </div>
                    <div class="col-8">
                        <span id="attendance_details_time_in">12:12 am</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <strong>Time Out:</strong>
                    </div>
                    <div class="col-8">
                        <span id="attendance_details_time_out">12:12 am</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <strong>Status:</strong>
                    </div>
                    <div class="col-8">
                        <span id="attendance_details_status">Out</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <strong>Login Map:</strong>
                    </div>
                    <div class="col-8">
                        <a id="attendance_details_login_location">12.3456789,98.7654321</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <strong>Logout Map:</strong>
                    </div>
                    <div class="col-8">
                        <a id="attendance_details_logout_location">12.3456789,98.7654321</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</div>

<script src="<?= base_url() ?>public/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>public/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>public/js/uibutton.js"></script>
<script src="<?= base_url() ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?= base_url() ?>public/js/adminlte.js"></script>
<script src="<?= base_url() ?>public/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>public/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>public/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>public/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    jQuery(document).ready(function() {
        const base_url = "<?= base_url() ?>";
        const notification = <?= session()->get('notification') ? json_encode(session()->get('notification')) : json_encode(null) ?>;
        const urlParams = new URLSearchParams(window.location.search);
        const user_id = urlParams.get('user_id');
        const current_url = window.location.href;

        if (notification) {
            sweet_alert(notification);
        }

        if (!isMobileOrTablet()) {
            location.href = base_url + "browser_error";
        }

        $('.data-table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": true,
            "responsive": true,
        });

        $("#btn_time_in").click(function() {
            $(this).text("Please wait...");
            $(this).attr("disabled", true);

            var formData = new FormData();

            formData.append('user_id', user_id);

            $.ajax({
                url: base_url + 'time_in',
                data: formData,
                type: 'POST',
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function(response) {
                    location.href = current_url;
                },
                error: function(_, _, error) {
                    console.error(error);
                }
            });
        })

        $("#btn_time_out").click(function() {
            const attendance_id = $(this).attr("attendance_id");

            $(this).text("Please wait...");
            $(this).attr("disabled", true);

            var formData = new FormData();

            formData.append('user_id', user_id);
            formData.append('attendance_id', attendance_id);

            $.ajax({
                url: base_url + 'time_out',
                data: formData,
                type: 'POST',
                dataType: 'JSON',
                processData: false,
                contentType: false,
                success: function(response) {
                    location.href = current_url;
                },
                error: function(_, _, error) {
                    console.error(error);
                }
            });
        })

        $(".view-attendance-details").click(function() {
            const account_id = $(this).attr("account_id");
            const student_name = $(this).attr("student_name");
            const time_in = $(this).attr("time_in");
            const time_out = $(this).attr("time_out");
            const status = $(this).attr("status");
            const login_location = $(this).attr("login_location");
            const logout_location = $(this).attr("logout_location");

            $("#attendance_details_name").text(student_name);
            $("#attendance_details_time_in").text(time_in);
            $("#attendance_details_time_out").text(time_out);
            $("#attendance_details_status").text(status);

            $("#attendance_details_login_location").text(login_location);
            $("#attendance_details_login_location").attr("href", "https://www.google.com/maps?q=" + login_location);

            $("#attendance_details_logout_location").text(logout_location);
            $("#attendance_details_logout_location").attr("href", "https://www.google.com/maps?q=" + logout_location);

            $("#attendance_details_modal").modal("show");
        })

        function sweet_alert(notification) {
            Swal.fire({
                title: notification.title,
                text: notification.text,
                icon: notification.icon
            });
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