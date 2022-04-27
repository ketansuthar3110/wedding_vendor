<?php
require './class/connection.php';
session_start();

    
    
    if(isset($_GET['id']))
    {
        $pyd = $_GET['id'];
    
                $update=mysqli_query($connection,"update tbl_booking set booking_status = 'Booked' where booking_id = '{$pyd}'") or die (mysqli_error($connection));
                 if($update)
                 {
                     echo "<script>alert('Vendor Booked successfully')</script>";
                     //header("location:index.php");
                 }
                 else
                 {
                     echo "<script>alert('Payment Failed')</script>";
                 }
    }
 else
 {
     
                
                       $update=mysqli_query($connection,"update tbl_booking set booking_status = 'Booked' where user_id = '{$_SESSION['userid']}'") or die (mysqli_error($connection));
                        unset($_SESSION['vcart']);
  
                        unset($_SESSION['counter']);
                       header("location:index.php");
                        
                    
        
}
?>
