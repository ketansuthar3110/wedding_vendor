<?php
session_start();
require './class/connection.php';
$pid = $_POST['pid'];

if(isset($_POST['booknow']))
{
                  $date = $_POST['txt1'];
                  $userid = $_SESSION['userid'];
                  $vid = $pid;
                  $bprice = $_POST['txt4'];
                  $bstatus = "pending";
                  $i = mysqli_query($connection, "insert into tbl_booking(booking_date,user_id,vendor_id,booking_price,booking_status)values('{$date}','{$userid}','{$vid}','{$bprice}','{$bstatus}')") or die(mysqli_error($connection));
                  $lastid = mysqli_insert_id($connection);
                  $p = mysqli_query($connection, "insert into tbl_payment(booking_id,user_id,vendor_id,transaction_id,booking_price,payment_status) values ('{$lastid}','{$userid}','{$vid}','12110','{$bprice}','pending')") or die(mysqli_error($connection));

                  if ($i) {

                      header("location:payment.php?pyd={$lastid}");
                  }  
}
if(isset($_POST['wishlist']))
{
                  $date = $_POST['txt1'];
                  $userid = $_SESSION['userid'];
                  $vid = $pid;
                  $bprice = $_POST['txt4'];
                  $bstatus = "pending";

    $i = mysqli_query($connection, "insert into tbl_booking(booking_date,user_id,vendor_id,booking_price,booking_status)values('{$date}','{$userid}','{$vid}','{$bprice}','{$bstatus}')") or die(mysqli_error($connection));
    $lastid = mysqli_insert_id($connection);
    $p = mysqli_query($connection, "insert into tbl_payment(booking_id,user_id,vendor_id,transaction_id,booking_price,payment_status) values ('{$lastid}','{$userid}','{$vid}','12110','{$bprice}','pending')") or die(mysqli_error($connection));
                if(isset($_SESSION['vcart']))
                {
                    $cnum = $_SESSION['counter']+1;
                    $_SESSION['vcart'][$cnum] = $pid;


                     $_SESSION['counter'] = $cnum;
                }
                else
                {
                    $pcart = array();


                    $_SESSION['vcart'][0] = $pid;

                    $_SESSION['counter'] = 0;

                }
               
                
               header("location:view-cart.php");
                
                
                
}
?>
