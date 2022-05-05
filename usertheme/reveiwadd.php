<?php


   require './class/connection.php';
   
   $id = $_POST['pid'];
   $date = date("Y-m-d");
   $details = $_POST['details'];
  // $vid= $_POST['vname'];
   $uid = $_SESSION['username'];
   
    
   
    $i = mysqli_query($connection,"insert into tbl_review(review_date,review_details,vendor_id,user_id)values('{$date}','{$details}','{$id}','{$uid}')") or die (mysqli_error($connection));

    if ($i) {
        header("location:vendor-details-tabbed.php?pid=$id");
        $msgreview = '<div class="alert alert-success" role="alert">
  Review submitted
</div>';
    }
   
    ?>