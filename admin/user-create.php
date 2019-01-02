<?php
/**
 * Created by PhpStorm.
 * User: Kio
 * Date: 10/8/2018
 * Time: 7:59 PM
 */

include '../controller/action.php';

if(isset($_POST['register'])){
    $data = array(
        "username"=>$_POST['username'],
        "password"=>password_hash($_POST['password'], PASSWORD_DEFAULT),
        "firstname"=>$_POST['firstname'],
        "middlename"=>$_POST['middlename'],
        "lastname"=>$_POST['lastname'],
        "email"=>$_POST['email'],
        "birthday"=>$_POST['birthday'],
        "age"=>calculate_age($_POST['birthday']),
        "gender"=>$_POST['gender'],
        "address"=>$_POST['address'],
        "contact_no"=>$_POST['contact_no']
    );

    if(isExists('tbl_users', $u = array("username"=>$_POST['username'])) == 1){
        $error[] = "This username already exists";
    }
    else {
        if(isExists('tbl_users', $u = array("email"=>$_POST['email'])) == 1){
            $error[] = "This email already exists";
        }
        else {
            $insert = db_insert('tbl_users', $data);
            if($insert){
                $_SESSION['toastr'] = array(
                    'type'=>'success',
                    'message'=>'User Registered Successfully',
                    'title'=>'Congratulations'
                );
            }
            else{
                $error[] = "There was an error creating new user";
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
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css">

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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <p>Create New Users</p>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" autocomplete="new-password" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Firstname</label>
                                        <input type="text" name="firstname" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Middlename</label>
                                        <input type="text" class="form-control" name="middlename" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Lastname</label>
                                        <input type="text" class="form-control" name="lastname" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Birthday</label>
                                        <input type="date" class="form-control" name="birthday" required />
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="gender" class="form-control" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" name="address" rows="4" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Contact No</label>
                                        <input type="number" class="form-control" name="contact_no" required />
                                    </div>
                                    <div class="form-group">
                                        <button name="register" class="btn btn-block btn-success">Save All Information</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
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
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
<!--<script>-->
<!--    toastr.options.timeOut = "5000";-->
<!--    toastr.options.closeButton = true;-->
<!--    toastr.options.positionClass = 'toast-bottom-right';-->
<!--    toastr['success']('Information has been successfully saved');-->
<!---->
<!--</script>-->
<?php
if(isset($error))
{
    foreach($error as $error)
    {
        ?>
        <script>
            toastr.options.timeOut = "5000";
            toastr.options.closeButton = true;
            toastr.options.positionClass = 'toast-top-right';
            toastr['error']('<?php echo $error; ?>');

        </script>
    <?php }} ?>

<?php if(isset($_SESSION['toastr'])){
    ?>
    <script>
        toastr.options.timeOut = "5000";
        toastr.options.closeButton = true;
        toastr.options.positionClass = 'toast-top-right';
        toastr['success']('<?php echo $_SESSION['toastr']['message']; ?>');
        <?php  unset($_SESSION['toastr']); ?>
    </script>
    <?php
} ?>
</body>
</html>
