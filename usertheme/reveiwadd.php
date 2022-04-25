<?php


   require './class/connection.php';
   $id = $_POST['pid'];
   $date = $_POST['rdate'];
   $details = $_POST['details'];
   $vid= $_POST['vname'];
   $uid = $_POST['uname'];
   
    
   
    $i = mysqli_query($connection,"insert into tbl_review(review_date,review_details,vendor_id,user_id)values('{$date}','{$details}','{$vid}','{$uid}')") or die (mysqli_error($connection));

    if ($i) {
        header("location:vendor-details.php?pid=$id");
        $msgreview = '<div class="alert alert-success" role="alert">
  Review submitted
</div>';
    }
   
    ?>