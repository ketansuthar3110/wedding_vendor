<?php
session_start();
require '../../class/connection.php';
$dmsg = "";
?>
<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>View Booking Vendor</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
        <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/libs/css/style.css">
        <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
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

           <div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler"type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">









                    <a href ="master.php" class="nav-link" style="color: #ffffff;font-size: 18px;"><i class="fa fa-user db-icon"></i> Dashboard</a>
                    <a href ="view-booking-vendor.php" class="nav-link active"style="color: #ffffff;font-size: 18px;"><i class="fa fa-list db-icon"></i> View Booking</a>
                    <a href ="view-review-vendorpanel.php" class="nav-link"style="color: #ffffff;font-size: 18px;"> <i class="fa fa-heart db-icon"></i>View User Review</a>
                    <a href ="change-pass-vendor.php" class="nav-link"style="color: #ffffff;font-size: 18px;"><i class="fas fa-key"></i> Change Password</a>
                    <a href ="vendor-report/vendor_booking_reportrpt.php" target="_blank" class="nav-link"style="color: #ffffff;font-size: 18px;"><i class="fas fa-chart-line"></i> Generate Report</a>

                    <a href ="logout-vendor.php" class="nav-link"style="color: #ffffff;font-size: 18px;"><i class="fas fa-sign-out-alt"></i> Logout</a>




                </ul>
            </div>
        </nav>
    </div>
</div>

            <div class="dashboard-wrapper">
                <div class="container-fluid  dashboard-content">

                    <div class="row">
                        <div>

                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Booking Data</h5>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">User_name</th>
                                             
                                                <th scope="col">Price</th>
                                                <th scope="col">Booking_Status</th>
                                                <th scope="col">Payment_Status</th>

                                               
                                            </tr>
                                        </thead>
                                        <?php
                                        if (isset($_GET['did'])) {
                                            $delid = $_GET['did'];
                                            $dq = mysqli_query($connection, "delete from tbl_booking where booking_id = '{$delid}'") or die(mysqli_error($connection));
                                            if ($dq) {
                                                $dmsg = '<div class="alert alert-success" role="alert">
                         Record Deleted
                        </div>';
                                            }
                                        }
                                        $sql = "SELECT
    `tbl_booking`.`booking_id`
    , `tbl_booking`.`booking_date`
    , `tbl_user`.`user_name`
    , `tbl_booking`.`booking_price`
    , `tbl_booking`.`booking_status`
    , `tbl_payment`.`payment_status`
FROM
    `tbl_vendormaster`
    INNER JOIN `tbl_booking` 
        ON (`tbl_vendormaster`.`vendor_id` = `tbl_booking`.`vendor_id`)
    INNER JOIN `tbl_payment` 
        ON (`tbl_booking`.`booking_id` = `tbl_payment`.`booking_id`)
    INNER JOIN `tbl_user` 
        ON (`tbl_user`.`user_id` = `tbl_booking`.`user_id`)
WHERE (`tbl_vendormaster`.`vendor_id` ='{$_SESSION['vendorid']}')
ORDER BY `tbl_booking`.`booking_id` ASC;";
                                        
                                        $f =mysqli_query($connection, $sql) or die(mysqli_error($connection));
                                                while ($data = mysqli_fetch_array($f)) {
                                            echo "<tr>";
                                            echo "<td>{$data['booking_id']}</td>";
                                            echo "<td>{$data['booking_date']}</td>";
                                            echo "<td>{$data['user_name']}</td>";
                                           
                                            echo "<td>{$data['booking_price']}</td>";
                                            echo "<td>{$data['booking_status']}</td>";
                                            echo "<td>{$data['payment_status']}</td>";

                                            echo "</tr>";
                                        }
                                        ?>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end striped table -->
                        <!-- ============================================================== -->
                    </div>
                    <?php
                    echo $dmsg;
                    ?>

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
        <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
        <script src="../assets/vendor/custom-js/jquery.multi-select.html"></script>
        <script src="../assets/libs/js/main-js.js"></script>
    </body>

</html>