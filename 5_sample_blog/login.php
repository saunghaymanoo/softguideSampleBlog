<?php
require_once "core/base.php";
require_once "core/functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/app.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/data_table/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/style.css">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="text-center text-primary">
                            <i class="feather feather-users"></i>
                            User Login To Admin
                        </h4>
                        <hr>
                        <?php
                        if (isset($_POST['loginBtn'])) {
                            echo login();
                        }
                        ?>
                        <form method="post">
                            <div class="form-group">
                                <label for="" class="text-primary">
                                    <i class="feather feather-mail"></i>
                                    Email
                                </label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-primary">
                                    <i class="feather feather-lock"></i>
                                    Password
                                </label>
                                <input type="password" min=8 name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button name="loginBtn" class="btn btn-primary hover:btn-outline-primary">Sign In</button>
                                <a href="register.php" class="btn btn-outline-primary">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo $url ?>/assets/vendor/jquery.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="<?php echo $url ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $url ?>/assets/js/app.js"></script>
</body>

</html>