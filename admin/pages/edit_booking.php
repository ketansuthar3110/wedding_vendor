<?php
require './class/connection.php';
$msg = "";
    $editid = $_GET['uid'];
        $up = mysqli_query($connection,"select * from tbl_booking where booking_id = '{$editid}'") or die (mysqli_error($connection));

    $selectrow = mysqli_fetch_array($up);
if ($_POST) {

   $date = $_POST['txt1'];
   $userid = $_POST['txt2'];
   $vid= $_POST['txt3'];
   $bprice = $_POST['txt4'];
   $bstatus = $_POST['txt5'];
  
   $update=mysqli_query($connection,"update tbl_booking set booking_date='{$date}', user_id = '{$uid}',vendor_id = '{$vid}',booking_price= '{$bprice}',booking_status= '{$bstatus}' where booking_id = '{$editid}'") or die (mysqli_error($connection));
if($update)
{
   $msg = '<div class="alert alert-success" role="alert">
  Record Updated
</div>';
} 
}
?>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Wedding Vendor edit-Booking</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
    <link rel="stylesheet" href="../assets/vendor/inputmask/css/inputmask.css" />
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php
                    include './theme/header.php';
                        ?>
        
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
      <?php
                      include './theme/sidebar.php';
                    ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-10">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header" id="top">
                                    <h2 class="pageheader-title">Booking Form </h2>
                                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                                    <div class="page-breadcrumb">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <div>
                            <?php
                                                                             echo $msg;   
                                                                            ?>
                            </div>
                        <!-- ============================================================== -->
                        <div class="page-section" id="overview">
                            <!-- ============================================================== -->
                            <!-- overview  -->
                            <!-- ============================================================== -->
                         <div class="card">
                                    
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Booking Date</label>
                                                <input id="inputText3" type="date"  value= "<?php echo $selectrow['booking_date']; ?>" class="form-control" name="txt1">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="inputEmail">User name</label>
                                                 <?php
                                                   $selectcatrow = mysqli_query($connection, "select * from tbl_user") or die(mysqli_error($connection));
                                                
                                               echo"<select name='txt2' class='form-control'>";
                                               echo "<option hidden>Select user name</option>";
                                                  while($selectcatrowfetch = mysqli_fetch_array($selectcatrow))
                                                  {
                                                      
                                                      echo "<option value='{$selectcatrowfetch['user_id']}'>{$selectcatrowfetch['user_name']}</option>";
                                                  }
                                                   echo"</select>";
                                                      ?>
                                             
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="inputPassword">Vendor name</label>
                                                 <?php
                                                   $selectcatrow = mysqli_query($connection, "select * from tbl_vendormaster") or die(mysqli_error($connection));
                                                
                                               echo"<select name='txt3' class='form-control'>";
                                               echo "<option hidden>Select vendor name</option>";
                                                  while($selectcatrowfetch = mysqli_fetch_array($selectcatrow))
                                                  {
                                                      
                                                      echo "<option value='{$selectcatrowfetch['vendor_id']}'>{$selectcatrowfetch['vendor_name']}</option>";
                                                  }
                                                   echo"</select>";
                                                      ?> 
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">Booking Price</label>
                                                <input id="inputPassword" type="text" name="txt4"  value= "<?php echo $selectrow['booking_price']; ?>" placeholder="Booking price" class="form-control">
                                            </div>
                                            
                                            <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Booking Status</label>
                                            <select name="txt5" class="form-control"  value= "<?php echo $selectrow['Booking_status']; ?>">
                                                       <option hidden>Select status</option>
                                                        <option>Pending</option>
                                                        <option>Completed</option>     
                                                    </select>
                                               </div>
                                            
                                             <div class="card-footer"> 
                                            <button type="submit" class="btn btn-success btn-sm">Update Record</button> 
                                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                            <button type="button" class="btn btn-primary btn-sm"onclick="window.location = 'view-booking.php'">View Record</button> 
                                        </div>
                                        </form>
                                    </div>
                                    
                                </div>
                        
                       
                    </div>
                   
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
        
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="./assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="./assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="./assets/libs/js/main-js.js"></script>
    <script src="./assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
    <script>
    $(function(e) {
        "use strict";
        $(".date-inputmask").inputmask("dd/mm/yyyy"),
            $(".phone-inputmask").inputmask("(999) 999-9999"),
            $(".international-inputmask").inputmask("+9(999)999-9999"),
            $(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"),
            $(".purchase-inputmask").inputmask("aaaa 9999-****"),
            $(".cc-inputmask").inputmask("9999 9999 9999 9999"),
            $(".ssn-inputmask").inputmask("999-99-9999"),
            $(".isbn-inputmask").inputmask("999-99-999-9999-9"),
            $(".currency-inputmask").inputmask("$9999"),
            $(".percentage-inputmask").inputmask("99%"),
            $(".decimal-inputmask").inputmask({
                alias: "decimal",
                radixPoint: "."
            }),

            $(".email-inputmask").inputmask({
                mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
                greedy: !1,
                onBeforePaste: function(n, a) {
                    return (e = e.toLowerCase()).replace("mailto:", "")
                },
                definitions: {
                    "*": {
                        validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                        cardinality: 1,
                        casing: "lower"
                    }
                }
            })
    });
    </script>
</body>
 
</html>


