<?php

require './class/connection.php';
    session_start();
   $bid = $_GET['bid'];
   
$bq = (mysqli_query($connection, "select * from tbl_booking where booking_id = {$bid}")) or die (mysqli_error($connection));
$browfetch = mysqli_fetch_array($bq);
$booking_id = $browfetch['booking_id'];
$booking_date = $browfetch['booking_date'];
$user_id = $browfetch['user_id'];
$vendor_id = $browfetch['vendor_id'];
$booking_price = $browfetch['booking_price'];

    foreach ($_SESSION['vcart'] as $key => $value) {
        $pq = mysqli_query($connection, "select * from tbl_vendormaster where vendor_id = '{$value}' ") or die(mysqli_error($connection));
        $pd = mysqli_fetch_array($pq);

$ordet = mysqli_query($connection, "insert into tbl_booking_details(booking_id,booking_date,user_id,vendor_id,booking_price)values('{$booking_id}','{$booking_date}','{$user_id}','{$vendor_id}','{$booking_price}')") or die(mysqli_error($connection));

        }
    unset($_SESSION['vcart']);
  
    unset($_SESSION['counter']);

    echo "<script>alert('thnaks for booking...')</script>";
   // header("location:payment.php?pyd={$lastid}");





    

?>