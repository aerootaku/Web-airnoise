<?php
/**
 * Created by PhpStorm.
 * User: Kio
 * Date: 10/8/2018
 * Time: 7:59 PM
 */

include '../controller/action.php';

if(isset($_POST['delete'])){
    $delete = db_delete('tbl_advisory', $id = array("id"=>$_GET['id']));
    if(isset($delete)){

        $_SESSION['toastr'] = array(
            'type'=>'warning',
            'message'=>'Advisory Deleted Successfully',
            'title'=>'Congratulations'
        );
    }
    else{
        $error[] = '';
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
    <!-- DataTables -->
    <link href="../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!-- Responsive datatable examples -->
    <link href="../plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css">
    <!--    <script href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>-->

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
                <div class="row m-t-40">
                    <div class="col-12">
                        <br /><br /><br />
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Detected Pollutant</h4>
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Air Quality</th>
                                        <th>Noise Quality</th>
                                        <th>Date & Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $value = custom_query("SELECT * FROM tbl_air ORDER by id DESC");
                                    if($value->rowCount()>0)
                                    {
                                        while($r=$value->fetch(PDO::FETCH_ASSOC))
                                        {
                                            $id = $r['id'];
                                            ?>
                                            <tr>
                                                <td style="background-color: <?php
                                                if($r['air'] < 190){
                                                   echo $bg2 = "#4CAF50";
                                                }
                                                else if($r['air'] > 191 && $r['air'] < 250){
                                                    echo $bg2 = "#FFEB3B";
                                                }
                                                else if($r['air'] > 351 && $r['air'] < 300){
                                                    echo $bg2 = '#FF9800';
                                                }
                                                else if($r['air'] > 301 && $r['air'] < 350){
                                                    echo $bg2 = '#f44336';
                                                }
                                                else if($r['air'] > 351 && $r['air'] < 400){
                                                    echo $bg2 = "#9C27B0";
                                                }
                                                else if($r['air'] > 401){
                                                    echo $bg2 = '#795548';
                                                }
                                                else {
                                                    echo $bg2 = "black";
                                                }
                                                ?>; color: black"><?= $r['air']; ?></td>
                                                <td style="background-color: <?php
                                                if($r['sound'] < 50){
                                                   echo $bg3 = "#4CAF50";
                                                }
                                                else if($r['sound'] > 51 && $r['sound'] < 90){
                                                    echo $bg3 = "#FFEB3B";
                                                }
                                                else if($r['sound'] > 91 && $r['sound'] < 120){
                                                    echo $bg3 = '#FF9800';
                                                }
                                                else if($r['sound'] > 121 && $r['sound'] < 140){
                                                    echo $bg3 = '#f44336';
                                                }
                                                else if($r['sound'] > 141 && $r['sound'] < 170){
                                                    echo $bg3 = "#9C27B0";
                                                }
                                                else if($r['sound'] > 171){
                                                    echo $bg3 = '#795548';
                                                }
                                                else {
                                                    echo $bg3 = "black";
                                                }
                                                ?>; color: black;
                                                "><?= $r['sound']; ?></td>
                                                <td><?= $r['dtcreated']; ?></td>
                                            </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
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

<?php
$value = db_select_order('tbl_advisory', 'id', 'DESC');
if($value->rowCount()>0)
{
    while($row=$value->fetch(PDO::FETCH_ASSOC))
    {
        $id = $row['id'];
        ?>
        <div id="delete<?= $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Delete Record</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="?id=<?=$row['id']; ?>" method="POST" id="needs-validation" novalidate=""
                          enctype="multipart/form-data">
                        <div class="modal-body">
                            <h5>This will remove the selected record permanently</h5>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger" name="delete">Remove</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php }} ?>
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
<!-- Required datatable js -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="../plugins/datatables/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="../plugins/datatables/jszip.min.js"></script>
<script src="../plugins/datatables/pdfmake.min.js"></script>
<script src="../plugins/datatables/vfs_fonts.js"></script>
<script src="../plugins/datatables/buttons.html5.min.js"></script>
<script src="../plugins/datatables/buttons.print.min.js"></script>
<script src="../plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="../plugins/datatables/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>
<!-- Datatable init js -->
<script src="assets/pages/datatables.init.js"></script>
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

