<?php
session_start();
$pid = $_GET['pid'];
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
?>
