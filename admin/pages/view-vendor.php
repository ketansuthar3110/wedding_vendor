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
        <title>Wedding Vendor view-vendors</title>
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
                        <div class="col-xl-18 col-lg-18 col-md-18 col-sm-18 col-18">
                            <div class="card">
                                <h5 class="card-header">Vendor Table</h5>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Detail</th>
                                                <th scope="col">Cat_name</th>
                                                <th scope="col">Area_name</th>
                                                <th scope="col">Pic</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Mobile</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Password</th>
                                                <th scope="col">Delete</th>
                                                <th scope="col">Update</th>

                                            </tr>
                                        </thead>
                                        <?php
                                        if (isset($_GET['did'])) {
                                            $delid = $_GET['did'];
                                            $dq = mysqli_query($connection, "delete from tbl_vendormaster where vendor_id = '{$delid}'") or die(mysqli_error($connection));
                                            if ($dq) {
                                                $dmsg = '<div class="alert alert-danger" role="alert">
                         Record Deleted
                        </div>';
                                            }
                                            echo $dmsg;
                                        }
                                        $sql = "SELECT
                                        `tbl_vendormaster`.`vendor_id`
                                        , `tbl_vendormaster`.`vendor_name`
                                        , `tbl_vendormaster`.`vendor_gender`
                                        , `tbl_vendormaster`.`vendor_details`
                                        , `tbl_category`.`category_name`
                                        , `tbl_area`.`area_name`
                                        , `tbl_vendormaster`.`vendor_photo`
                                        , `tbl_vendormaster`.`vendor_price`
                                        , `tbl_vendormaster`.`vendor_mobileno`
                                        , `tbl_vendormaster`.`vendor_email`
                                        ,`tbl_vendormaster`.`vendor_password`
                                        FROM
                                        `tbl_category`
                                        INNER JOIN `tbl_vendormaster`
                                        ON(`tbl_category`.`category_id` = `tbl_vendormaster`.`category_id`)
                                        INNER JOIN `tbl_area`
                                        ON(`tbl_area`.`area_id` = `tbl_vendormaster`.`area_id`);
                                        ";
                                        $join = mysqli_query($connection, $sql) or die(mysqli_error($connection));

                                        while ($data = mysqli_fetch_array($join)) {
                                            echo "<tr>";
                                            echo "<td>{$data['vendor_id']}</td>";
                                            echo "<td>{$data['vendor_name']}</td>";
                                            echo "<td>{$data['vendor_gender']}</td>";
                                            echo "<td>{$data['vendor_details']}</td>";
                                            echo "<td>{$data['category_name']}</td>";
                                            echo "<td>{$data['area_name']}</td>";
                                            echo "<td><img style = 'width:150px;'src='{$data['vendor_photo']}'</td>";
                                            echo "<td>{$data['vendor_price']}</td>";
                                            echo "<td>{$data['vendor_mobileno']}</td>";
                                            echo "<td>{$data['vendor_email']}</td>";
                                            echo "<td>{$data['vendor_password']}</td>";
                                            echo "<td><button><a style='color:red;' href='view-vendor.php?did=$data[0]'>Delete</a></button></td>";
                                             echo "<td><button><a style='color:blue;' href='edit-vendor.php?uid=$data[0]'>Update</a></button></td>";
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