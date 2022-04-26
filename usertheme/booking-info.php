<?php


    $date = $_POST['txt1'];
    $userid = $_POST['txt2'];
    $vid = $_POST['txt3'];
    $bprice = $_POST['txt4'];
    $bstatus = $_POST['txt5'];

    $i = mysqli_query($connection, "insert into tbl_booking(booking_date,user_id,vendor_id,booking_price,booking_status)values('{$date}','{$userid}','{$vid}','{$bprice}','{$bstatus}')") or die(mysqli_error($connection));
    $lastid = mysqli_insert_id($connection);

    foreach ($_SESSION['vcart'] as $key => $value) {
        $pq = mysqli_query($connection, "select * from tbl_vendormaster where vendor_id = '{$value}' ") or die(mysqli_error($connection));
        $pd = mysqli_fetch_array($pq);

$ordet = mysqli_query($connection, "insert into tbl_booking_details(booking_id,booking_date,user_id,vendor_id,booking_price)values('{$lastid}','{$date}','{$userid}','{$vid}','{$bprice}')") or die(mysqli_error($connection));

        }
    unset($_SESSION['vcart']);
  
    unset($_SESSION['counter']);

    echo "<script>alert('thnaks for booking...')</script>";
    header("location:payment.php?pyd={$lastid}");





    

?>