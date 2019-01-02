<?php include '../controller/action.php';


if(isset($_POST['updateProfile'])){

        $data = array(
            "firstname"=>$_POST['firstname'],
            "middlename"=>$_POST['middlename'],
            "lastname"=>$_POST['lastname'],
            "address"=>$_POST['address'],
            "email"=>$_POST['email'],
            "contact_no"=>$_POST['contact'],
            "location"=>$_POST['location']
        );

        $insert = db_update('tbl_users', $data, $where = array("id"=>$_SESSION['id']));

        if($insert){
            $msg = "Profile Updated Successfully";
        }
        else{
            $msg = "There was an error with your registration";
        }

}


if(isset($_POST['updatepassword'])){
    $current = $_POST['currentPass'];
    $new = $_POST['newPass'];
    $confirm = $_POST['confirmPass'];

    //check if the current password is equal to the input
    $fetched = password_verify($current, $_SESSION['declared']);
    if($current != $fetched){
        $error[] = 'Old password does not matched with the current password';
    }
    else{
        if($new != $confirm){
            $error[] = 'Password does not matched';
        }
        else {
            $update = db_update('tbl_users', $datas = array("password"=>password_hash($confirm, PASSWORD_DEFAULT)), $where = array("id"=>$_SESSION['id']));
            if($update){
                $_SESSION['toastr'] = array(
                    'type'=>'info',
                    'message'=>'Password Updated Successfully',
                    'title'=>'Info'
                );
                redirect('profile.php');
                exit();
            }
            else{
                $error[] = 'There was an error with the server. Please try again later';
            }
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
    <title>Air & Noise Pollution Detection</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Themesbrand" name="author">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>

<body>
<!-- Begin page -->
<div id="wrapper">
    <!-- Top Bar Start -->
    <?php include 'includes/header.php'; ?>
    <!-- Top Bar End -->
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="slimscroll-menu" id="remove-scroll">
            <!--- Sidemenu -->
            <?php include 'includes/sidebar.php'; ?>
            <!-- Sidebar -->
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -left -->
    </div>
    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Dashboard</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Welcome! <?= $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?> to Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-4 col-md-6">
                        <div class="card directory-card m-b-20">
                            <?php
                            $xid = $_SESSION['id'];
                            $value = custom_query("SELECT * FROM tbl_users WHERE id='$xid'");
                            if($value->rowCount()>0)
                            {
                            while($r=$value->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <div>
                                <div class="directory-bg text-center">
                                    <div class="directory-overlay">
                                        <i class="fa fa-user fa-5x rounded-circle thumb-lg img-thumbnail "> </i>
                                    </div>
                                </div>
                                <div class="directory-content text-center p-4">
                                    <h5 class="font-16"><?= $r['firstname'] . " " . $r['lastname']; ?></h5>
                                    <p class="text-muted"><?= $r['address']; ?></p>
                                </div>
                            </div>
                            <?php }} ?>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-md-12 card">
                        <?php
                        $xid = $_SESSION['id'];
                        $value = custom_query("SELECT * FROM tbl_users WHERE id='$xid'");
                        if($value->rowCount()>0)
                        {
                        while($r=$value->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <h4>Profile Settings</h4>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="firstname" value="<?= $r['firstname']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text" class="form-control" name="middlename" value="<?= $r['middlename']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="lastname" value="<?= $r['lastname']; ?>" />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="address" class="form-control" rows="address"><?= $r['address']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Place Located</label>
                                <select name="location" class="form-control">
                                    <option value="<?= $r['location']; ?>"><?= $r['location']; ?></option>
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
                                <input type="tel" class="form-control" name="contact" value="<?= $r['contact_no']; ?>" />
                            </div>
                            <div class="form-group">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary btn-block" type="submit" name="updateProfile">Update Profile</button>
                                </div>
                            </div>
                        </form>
                        <?php }} ?>
                    </div>
                    <div class="col-md-12 card">
                        <h4>Password Settings</h4>
                        <?php
                        $xid = $_SESSION['id'];
                        $value = custom_query("SELECT * FROM tbl_users WHERE id='$xid'");
                        if($value->rowCount()>0)
                        {
                        while($r=$value->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <form action="" method="POST">
                            <h6>Change Password</h6>
                            <div class="form-group">
                                <input type="password" name="currentPass" class="form-control" placeholder="Current Password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="newPass" class="form-control" placeholder="New Password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirmPass" class="form-control" placeholder="Confirm New Password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mb-3" name="updatepassword">Update</button> &nbsp;&nbsp;
                            </div>
                        </form>
                        <?php }} ?>
                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- content -->
    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
</div>

<!-- END wrapper -->
<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/waves.min.js"></script>
<script src="../plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
<!--Morris Chart-->
<script src="../plugins/morris/morris.min.js"></script>
<script src="../plugins/raphael/raphael-min.js"></script>
<script src="assets/pages/dashboard.js"></script>
<!-- App js -->
<script src="assets/js/app.js"></script>
<script>
    $(document).ready(function(){
        setInterval(function() {
            $("#ref1").load("index.php #ref1");
        }, 1000);
        setInterval(function() {
            $("#ref2").load("index.php #ref2");
        }, 1000);
        setInterval(function() {
            $("#ref3").load("index.php #ref3");
        }, 1000);
        setInterval(function() {
            $("#ref4").load("index.php #ref4");
        }, 1000);
        setInterval(function() {
            $("#refAir").load("index.php #refAir");
        }, 1000);
        setInterval(function() {
            $("#refNoise").load("index.php #refNoise");
        }, 1000);
    });
</script>
</body>
</html>