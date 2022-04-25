<?php
require './class/connection.php';


    $pyd = $_GET['id'];
    echo $pyd;
   $update=mysqli_query($connection,"update tbl_booking set booking_status = 'Booked' where booking_id = '{$pyd}'") or die (mysqli_error($connection));
    if($update)
    {
        echo "<script>alert('Vendor Booked successfully')</script>";
        header("location:index.php");
    }
    else
    {
        echo "<script>alert('Payment Failed')</script>";
    }

?>
