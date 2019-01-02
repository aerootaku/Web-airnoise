<?php
include '../controller/action.php';

if(isset($_POST['login'])){
    if($action->loginMobile($_POST['username'], $_POST['password'])){
        redirect('dashboard.php');
    }
    else {
        $error = "Invalid Username / Password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Air and Noise Monitoring</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Themesbrand" name="author">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<!-- Begin page -->
<div class="wrapper-page">
    <div class="card bg-" style="margin-top: 10px">
        <div class="card-body">
            <div class="p-3" style="color: white">
                <h4 class="text-muted font-18 m-b-5 text-center" style="color: white;">Welcome!</h4>
                <form class="form-horizontal m-t-30" action="" method="POST">
                    <?php if(isset($error)): ?>
                    <div class="alert alert-danger">
                        <p><?= $error; ?></p>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="userpassword">Password</label>
                        <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="password" required>
                    </div>
                    <div class="form-group row m-t-20">
                        <div class="col-6 text-right">
                            <button class="btn btn-primary btn-block" type="submit" name="login">Log In</button>
                        </div>
                    </div>
                    <div class="row" style="align-items: right;">
                        <p><a href="register.php" style="text-align: right;">Don't have an account? Register Now</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/waves.min.js"></script>
<script src="../plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- App js -->
<script src="assets/js/app.js"></script>
</body>
</html>