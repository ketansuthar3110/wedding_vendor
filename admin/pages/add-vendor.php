<?php
require '../class/connection.php';
$msg = "";
if ($_POST) {

   $name = $_POST['txt1'];
   $gender = $_POST['txt2'];
   $details= $_POST['txt3'];
   $catid = $_POST['txt4'];
   $areaid = $_POST['txt5'];
   $pic = $_POST['txt6'];
   $price = $_POST['txt7'];
   $mono = $_POST['txt8'];
   $email = $_POST['txt9'];
   $pass = $_POST['txt10'];
 
    $i = mysqli_query($connection,"insert into tbl_vendormaster(vendor_name,vendor_gender,vendor_details,category_id,area_id,vendor_photo,vendor_price,vendor_mobileno,vendor_email,vendor_password)values('{$name}','{$gender}','{$details}','{$catid}','{$areaid}','{$pic}','{$price}','{$mono}','{$email}','{$pass}')") or die (mysqli_error($connection));

    if ($i) {
        $msg = '<div class="alert alert-success" role="alert">
  Record Inserted
</div>';
    }
}
?>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
    <link rel="stylesheet" href="../assets/vendor/inputmask/css/inputmask.css" />
      <script src="jquery-3.6.0.js" type="text/javascript"></script>
    <script src="jquery.validate.js" type="text/javascript"></script>
 <script>
            $(document).ready(function()
            {
                $("#myform").validate();
            });
            
        </script>
        <style>
            .error{
                color: red;
            }
            </style>
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
                    include '../pages/theme/header.php';
                        ?>
        
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
      
            <?php
      
                      include '../pages/theme/sidebar.php';
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
                                    <h2 class="pageheader-title">Vendor Form</h2>
                                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Form Elements</li>
                                            </ol>
                                        </nav>
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
                                        <form method="post" id="myform">
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Vendor name</label>
                                                <input id="inputText3" type="text" class="form-control" name="txt1" placeholder="Enter name" required>
                                            </div>
                                            <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Vendor Gender</label>
                                            <select name="txt2" class="form-control" required>
                                                <option hidden>Select Gender</option>
                                                        <option>Male</option>
                                                        <option>Female</option>     
                                                    </select>
                                               </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Vendor details</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Enter details" name="txt3" rows="3" required></textarea>
                                            </div>
                                            
                                           <div class="form-group">
                                              <label for="inputText3" class="col-form-label">Category-name</label>
                                               <?php
                                                   $selectcatrow = mysqli_query($connection, "select * from tbl_category") or die(mysqli_error($connection));
                                                
                                               echo"<select name='txt4' class='form-control'>";
                                               echo "<option hidden>Select category name</option>";
                                                  while($selectcatrowfetch = mysqli_fetch_array($selectcatrow))
                                                  {
                                                      
                                                      echo "<option value='{$selectcatrowfetch['category_id']}'>{$selectcatrowfetch['category_name']}</option>";
                                                  }
                                                   echo"</select>";
                                                      ?> 
                                            </div>
                                        
                                           <div class="form-group">
                                              <label for="inputText3" class="col-form-label">Area-name</label>
                                               <?php
                                                   $selectarearow = mysqli_query($connection, "select * from tbl_area") or die(mysqli_error($connection));
                                                
                                               echo"<select name='txt5' class='form-control'>";
                                               echo "<option hidden>Select area name</option>";
                                                  while($selectarearowfetch = mysqli_fetch_array($selectarearow))
                                                  {
                                                      
                                                      echo "<option value='{$selectarearowfetch['area_id']}'>{$selectarearowfetch['area_name']}</option>";
                                                  }
                                                   echo"</select>";
                                                      ?> 
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Vendor Photo</label>
                                                <input id="inputText3" type="file" class="form-control" name="txt6" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Vendor Price</label>
                                                <input id="inputText3" type="text" class="form-control" name="txt7" placeholder="enter price" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Vendor Mobile</label>
                                                <input id="inputText3" type="text" class="form-control" name="txt8" placeholder="Enter mobile no" required>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="inputEmail">Vendor Email</label>
                                                <input id="inputEmail" type="email" name="txt9" placeholder="Enter email id" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">Vendor Password</label>
                                                <input id="inputPassword" type="password" name="txt10" placeholder="Enter Password" class="form-control" required>
                                            </div>
                                            <div class="form-group"> 
                                            <button type="submit" class="btn btn-default">Add Record</button> 
                                            <button type="reset" class="btn btn-default">Reset</button>
                                            <button type="button" class="btn btn-default"onclick="window.location = 'view-vendor.php'">View Record</button> 
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
            <?php
                                include '../pages/theme/footer.php';
                                    ?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="../assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
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
      <script src="jquery.validate.js" type="text/javascript"></script>
     <script>
            $(document).ready(function()
            {
                $("#myform").validate();
            });
              
        </script>
</body>
 
</html>
