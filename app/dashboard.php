<?php include '../controller/action.php'; ?>

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
                <?php
                //for mq135 sensor
                $value = custom_query("SELECT * FROM tbl_air ORDER BY ID DESC LIMIT 1");
                if($value->rowCount()>0)
                {
                    while($r=$value->fetch(PDO::FETCH_ASSOC)) {
                        if($r['air'] < 190){
                            $bg2 = "#4CAF50";
                        }
                        else if($r['air'] > 191 && $r['air'] < 250){
                            $bg2 = "#FFEB3B";
                        }
                        else if($r['air'] > 351 && $r['air'] < 300){
                            $bg2 = '#FF9800';
                        }
                        else if($r['air'] > 301 && $r['air'] < 350){
                            $bg2 = '#f44336';
                        }
                        else if($r['air'] > 351 && $r['air'] < 400){
                            $bg2 = "#9C27B0";
                        }
                        else if($r['air'] > 401){
                            $bg2 = '#795548';
                        }
                        else {
                            $bg2 = "black";
                        }
                    }}
                ?>

                <?php
                //for mq135 sensor
                $value = custom_query("SELECT * FROM tbl_air ORDER BY ID DESC LIMIT 1");
                if($value->rowCount()>0)
                {
                    while($r=$value->fetch(PDO::FETCH_ASSOC)) {
                        if($r['sound'] < 50){
                            $bg3 = "#4CAF50";
                        }
                        else if($r['sound'] > 51 && $r['sound'] < 90){
                            $bg3 = "#FFEB3B";
                        }
                        else if($r['sound'] > 91 && $r['sound'] < 120){
                            $bg3 = '#FF9800';
                        }
                        else if($r['sound'] > 121 && $r['sound'] < 140){
                            $bg3 = '#f44336';
                        }
                        else if($r['sound'] > 141 && $r['sound'] < 170){
                            $bg3 = "#9C27B0";
                        }
                        else if($r['sound'] > 171){
                            $bg3 = '#795548';
                        }
                        else {
                            $bg3 = "black";
                        }
                    }}
                ?>
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="card mini-stat" style="background-color: <?= $bg2; ?>">
                            <div class="card-body mini-stat-img">
                                <div class="mini-stat-icon"><i class="mdi mdi-access-point-network float-right"></i></div>
                                <div class="text-white">
                                    <h6 class="text-uppercase mb-3">Air Index</h6>
                                    <h4 class="mb-4" id="refAir"><?php
                                        $value = custom_query("SELECT * FROM tbl_air ORDER BY ID DESC LIMIT 1");
                                        if($value->rowCount()>0)
                                        {
                                            while($r=$value->fetch(PDO::FETCH_ASSOC)) {
                                                echo $r['air'];
                                            }}
                                        ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6">
                        <div class="card mini-stat" style="background-color: <?= $bg3; ?>">
                            <div class="card-body mini-stat-img">
                                <div class="mini-stat-icon"><i class="mdi mdi-surround-sound float-right"></i></div>
                                <div class="text-white">
                                    <h6 class="text-uppercase mb-3">Noise Index</h6>
                                    <h4 class="mb-4" id="refNoise"><?php
                                        $value = custom_query("SELECT * FROM tbl_air ORDER BY ID DESC LIMIT 1");
                                        if($value->rowCount()>0)
                                        {
                                            while($r=$value->fetch(PDO::FETCH_ASSOC)) {
                                                echo $r['sound'];
                                            }}
                                        ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <iframe src="map.php" class="col-md-12" style="height: 550px">

                        </iframe>
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
<script>
    new Morris.Bar({
        element : 'air',
        data:[<?php echo $chart_data1; ?>],
        xkey:'month',
        ykeys:['value'],
        labels:['Value'],
        barColors: ['#009dff'],
        hideHover:'auto',
        resize: true,
        fillOpacity: 0.6,
        stacked:true
    });
</script>

<script>
    new Morris.Bar({
        element : 'noise',
        data:[<?php echo $chart_data2; ?>],
        xkey:'month',
        ykeys:['value'],
        labels:['Value'],
        barColors: ["#009988"],
        hideHover:'auto',
        resize: true,
        fillOpacity: 0.6,
        stacked:true
    });
</script>

</body>
</html>