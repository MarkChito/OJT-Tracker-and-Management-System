<footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="javascript:void(0)">OJT Tracker and Management System</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
    </div>
</footer>
</div>

<script src="<?= base_url() ?>public/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>public/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>public/js/uibutton.js"></script>
<script src="<?= base_url() ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?= base_url() ?>public/js/adminlte.js"></script>
<script src="<?= base_url() ?>public/plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
    jQuery(document).ready(function() {
        const base_url = "<?= base_url() ?>";
        const notification = <?= session()->get('notification') ? json_encode(session()->get('notification')) : json_encode(null) ?>;
        const urlParams = new URLSearchParams(window.location.search);
        const user_id = urlParams.get('user_id');

        if (notification) {
            sweet_alert(notification);
        }

        function sweet_alert(notification) {
            Swal.fire({
                title: notification.title,
                text: notification.text,
                icon: notification.icon
            });
        }
    })
</script>
</body>

</html>

<?php session()->remove("notification") ?>