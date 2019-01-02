<?php
include 'controller/action.php';

if(isset($_POST['login'])){
    if($action->login($_POST['username'], $_POST['password'])){

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
    <title>Air Noise Pollution Monitoring</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Themesbrand" name="author">
    <link rel="shortcut icon" href="admin/assets/images/favicon.ico">
    <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="admin/assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="admin/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="admin/assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<!-- Begin page -->
<div class="wrapper-page">
    <div class="card bg-info">
        <div class="card-body">
            <div class="p-3" style="color: white">
                <h4 class="text-muted font-18 m-b-5 text-center" style="color: white;">Welcome Back !</h4>
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
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit" name="login">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- jQuery  -->
<script src="admin/assets/js/jquery.min.js"></script>
<script src="admin/assets/js/bootstrap.bundle.min.js"></script>
<script src="admin/assets/js/metisMenu.min.js"></script>
<script src="admin/assets/js/jquery.slimscroll.js"></script>
<script src="admin/assets/js/waves.min.js"></script>
<script src="plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- App js -->
<script src="admin/assets/js/app.js"></script>
</body>
</html>