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
        <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
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
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Review Table</h5>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Review-details</th>
                                                <th scope="col">Vendor_name</th>
                                                <th scope="col">User-name</th>


                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <?php
                                        if (isset($_GET['did'])) {
                                            $delid = $_GET['did'];
                                            $dq = mysqli_query($connection, "delete from tbl_review where review_id = '{$delid}'") or die(mysqli_error($connection));
                                            if ($dq) {
                                                $dmsg = '<div class="alert alert-success" role="alert">
                         Record Deleted
                        </div>';
                                            }
                                        }
                                        $sql = "SELECT
                                                        `tbl_review`.`review_id`
                                                        , `tbl_review`.`review_date`
                                                        , `tbl_review`.`review_details`
                                                        , `tbl_vendormaster`.`vendor_name`
                                                        , `tbl_user`.`user_name`
                                                    FROM
                                                        `tbl_vendormaster`
                                                        INNER JOIN `tbl_review` 
                                                            ON (`tbl_vendormaster`.`vendor_id` = `tbl_review`.`vendor_id`)
                                                        INNER JOIN `tbl_user` 
                                                            ON (`tbl_user`.`user_id` = `tbl_review`.`user_id`)
                                                    ORDER BY `tbl_review`.`review_id` ASC;";
                                        $f = mysqli_query($connection, $sql) or die(mysqli_error($connection));

                                        while ($data = mysqli_fetch_array($f)) {
                                            echo "<tr>";
                                            echo "<td>{$data['review_id']}</td>";
                                            echo "<td>{$data['review_date']}</td>";
                                            echo "<td>{$data['review_details']}</td>";
                                            echo "<td>{$data['vendor_name']}</td>";
                                            echo "<td>{$data['user_name']}</td>";

                                            echo "<td><button><a href='editdata.php?eid=$data[0]'>edit</a> </button>&<button> <a href='view-review.php?did=$data[0]'>Delete</a></button></td>";
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
        <script src="../assets/vendor/custom-js/jquery.multi-select.html"></script>
        <script src="../assets/libs/js/main-js.js"></script>
    </body>

</html>

