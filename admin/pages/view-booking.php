<?php
require './class/connection.php';
$dmsg = "";
?>
<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Wedding Vendor view-booking</title>
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
            include '../pages/theme/header.php';
            ?>

            <?php
            include '../pages/theme/sidebar.php';
            ?>

            <div class="dashboard-wrapper">
                <div class="container-fluid  dashboard-content">

                    <div class="row">
                        <div>

                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">
                            <div class="card">
                                <h5 class="card-header">Booking Table</h5>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
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