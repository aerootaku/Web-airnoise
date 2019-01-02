<?php
include '../controller/action.php';

if(isset($_POST['register'])){

    if(isExists('tbl_users', $exist = array("username"=>$_POST['username'])) == 1){
        $msg = "Username is already taken";
    }
    else{
        $data = array(
            "username"=>$_POST['username'],
            "password"=>password_hash($_POST['password'], PASSWORD_DEFAULT),
            "firstname"=>$_POST['firstname'],
            "middlename"=>$_POST['middlename'],
            "lastname"=>$_POST['lastname'],
            "address"=>$_POST['address'],
            "email"=>$_POST['email'],
            "contact_no"=>$_POST['contact'],
            "location"=>$_POST['location']
        );

        $insert = db_insert('tbl_users', $data);

        if($insert){
            $msg = "Registered Successfully";
        }
        else{

            $msg = "There was an error with your registration";

        }
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
    <div class="card">
        <div class="card-body bg-info">
            <div class="p-3" style="color: white">
                <h4 class="text-muted font-18 m-b-5 text-center" style="color: white;">Register Now</h4>
                <form class="form-horizontal m-t-30" action="" method="POST">
                    <?php if(isset($msg)): ?>
                        <div class="alert alert-info">
                            <p><?= $msg; ?></p>
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
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" />
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstname" />
                    </div>
                    <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middlename" />
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastname" />
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" rows="address"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Place Located</label>
                        <select name="location" class="form-control">
                            <?php
                            $value = custom_query("SELECT * FROM tbl_location ORDER by id DESC");
                            if($value->rowCount()>0)
                            {
                            while($row=$value->fetch(PDO::FETCH_ASSOC))
                            {
                            ?>
                            <option value="<?= $row['content']; ?>"><?= $row['content']; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Contact No</label>
                        <input type="tel" class="form-control" name="contact" />
                    </div>
                    <div class="form-group row m-t-20">
                        <div class="col-6 text-right">
                            <button class="btn btn-primary btn-block" type="submit" name="register">Register</button>
                        </div>
                    </div>
                    <div class="row" style="align-items: right;">
                        <p><a href="index.php" style="text-align: right;">Already have an account? Login now</a> </p>
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