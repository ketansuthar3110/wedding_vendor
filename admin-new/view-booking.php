<?php
require './class/connection.php';
$dmsg = "";
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Table Basic - srtdash</title>
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
        include './theme/header.php';
        ?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php
                    include './theme/sidebar.php';
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
                                <li><span>Table Basic</span></li>
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
                    
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Booking table</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase bg-danger">
                                                
                                            <tr class="text-white">
                                                <th scope="col">#</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">User_name</th>
                                                <th scope="col">Vendor_name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Status</th>

                                                <th scope="col">Delete</th>
                                                <th scope="col">Update</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                               
                                        <?php
                                        if (isset($_GET['did'])) {
                                            $delid = $_GET['did'];
                                            $dq = mysqli_query($connection, "delete from tbl_booking where booking_id = '{$delid}'") or die(mysqli_error($connection));
                                            if ($dq) {
                                                $dmsg = '<div class="alert alert-danger" role="alert">
                         Record Deleted
                        </div>';
                                            }
                                        }
                                        echo $dmsg;
                                        $sql = "SELECT
                                                        `tbl_booking`.`booking_id`
                                                        , `tbl_booking`.`booking_date`
                                                        , `tbl_user`.`user_name`
                                                        , `tbl_vendormaster`.`vendor_name`
                                                        , `tbl_booking`.`booking_price`
                                                        , `tbl_booking`.`booking_status`
                                                    FROM
                                                        `tbl_user`
                                                        INNER JOIN `tbl_booking` 
                                                            ON (`tbl_user`.`user_id` = `tbl_booking`.`user_id`)
                                                        INNER JOIN `tbl_vendormaster` 
                                                            ON (`tbl_vendormaster`.`vendor_id` = `tbl_booking`.`vendor_id`)
                                                    ORDER BY `tbl_booking`.`booking_id` ASC;";
                                        
                                        $f =mysqli_query($connection, $sql) or die(mysqli_error($connection));
                                                while ($data = mysqli_fetch_array($f)) {
                                            echo "<tr>";
                                            echo "<td>{$data['booking_id']}</td>";
                                            echo "<td>{$data['booking_date']}</td>";
                                            echo "<td>{$data['user_name']}</td>";
                                            echo "<td>{$data['vendor_name']}</td>";
                                            echo "<td>{$data['booking_price']}</td>";
                                            echo "<td>{$data['booking_status']}</td>";

                                            echo "<td><button><a style='color:red;' href='view-booking.php?did=$data[0]'>Delete</a></button></td>";
                                             echo "<td><button><a style='color:blue;' href='edit_booking.php?uid=$data[0]'>Update</a></button></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                            </tbody>
                                        </table>
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
