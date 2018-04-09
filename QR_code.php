<?php
    // include QR_BarCode class 
    include("include/QR_CODE.php");

    include_once('include/database.php');
   
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $pageID = explode('?', $actual_link);
    $pageActID = end($pageID);

    // getting actual Id data

    $sql = "SELECT * FROM users WHERE id='$pageActID'";
    $result = mysqli_query($db, $sql);
    $resultCheck = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    // QR_BarCode object 
    $qr = new QR_BarCode(); 

    // create url QR code 
    $qr->url('http://localhost/LastTask/profile.php?'.$pageActID);


    // display QR code image
    $qr->qrCode();

    ?>