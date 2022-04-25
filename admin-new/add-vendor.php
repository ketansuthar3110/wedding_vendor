<?php
require './class/connection.php';
$msg = "";
if ($_POST) {

   $name = $_POST['txt1'];
   $gender = $_POST['txt2'];
   $details= $_POST['txt3'];
   $catid = $_POST['txt4'];
   $areaid = $_POST['txt5'];
   $pic = "../../upload/".$_FILES['txt6']['name'];
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
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Form - srtdash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php
        include './theme/sidebar.php';
        ?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php
            include './theme/header.php';
            ?>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Form</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Kumkum Rai <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-6 col-ml-12">
                      
                    </div>
                    <div class="col-lg-6 col-ml-12">
                        <div class="row">
                            <!-- basic form start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Vendor form</h4>
                                        <?php
                                        echo $msg;
                                        ?>
                                            <form method="post" id="myform"enctype="multipart/form-data">
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
                                            <div class="card-footer">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Submit
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-ban"></i> Reset
                                            </button>
                                            <button type="button" class="btn btn-primary btn-sm" onclick="window.location = 'view-vendor.php'">View Record</button>
                                        </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php
        include './theme/footer.php';
        ?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
