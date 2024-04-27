<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mobile/Tablet Only</title>

    <link rel="shortcut icon" href="<?= base_url() ?>public/img/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/adminlte.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .icon {
            font-size: 5rem;
            margin-bottom: 20px;
        }

        .message {
            font-size: 1.5rem;
            color: #6c757d;
            margin-bottom: 30px;
        }

        .content {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="icon">
                <i class="fas fa-exclamation-triangle text-warning"></i>
            </div>
            <div class="message">
                This website is only available on mobile or tablet devices.
            </div>
            <p>
                Please visit this website using your mobile or tablet device.
            </p>
        </div>
    </div>

    <script src="<?= base_url() ?>public/plugins/jquery/jquery.min.js"></script>

    <script>
        disable_developer_functions(true);

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
    </script>
</body>

</html>