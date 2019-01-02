<?php

include 'controller/action.php';

header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');

if(isset($_GET['mq'])){
    $data = array(
        "air"=>$_GET['mq'],
        "sound"=>$_GET['noise'],
        "lati"=>$_GET['lat'],
        "longi"=>$_GET['longi']
    );
    $insert = db_insert('tbl_air', $data);
}

