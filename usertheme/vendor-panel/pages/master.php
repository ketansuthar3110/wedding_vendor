<?php
session_start();

require '../../class/connection.php';

$msg = "";
$editid = $_GET['uid'];
$up = mysqli_query($connection, "select * from tbl_vendormaster where vendor_id = '{$editid}'") or die(mysqli_error($connection));

$selectrow = mysqli_fetch_array($up);
if ($_POST) {
    $name = $_POST['txt1'];
    $gender = $_POST['txt2'];
    $details = $_POST['txt3'];
    $catid = $_POST['txt4'];
    $areaid = $_POST['txt5'];
    $pic = "../../upload/" . $_FILES['txt6']['name'];
    $price = $_POST['txt7'];
    $mono = $_POST['txt8'];
    $email = $_POST['txt9'];
    $pass = $_POST['txt10'];
    $update = mysqli_query($connection, "update tbl_vendormaster set vendor_name = '{$name}',vendor_gender = '{$gender}',vendor_details = '{$details}',category_id = '{$catid}',area_id = '{$areaid}',vendor_photo = '{$pic}',vendor_price = '{$price}',vendor_mobileno = '{$mono}',vendor_email = '{$email}',vendor_password = '{$pass}' where vendor_id = '{$editid}'") or die(mysqli_error($connection));
    if ($update) {
        move_uploaded_file($_FILES['txt6']['tmp_name'], $pic);
        $msg = '<div class="alert alert-success" role="alert">
  Record Updated
</div>';
    }
}
?>
<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
        <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/libs/css/style.css">
        <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
        <link rel="stylesheet" href="../assets/vendor/charts/chartist-bundle/chartist.css">
        <link rel="stylesheet" href="../assets/vendor/charts/morris-bundle/morris.css">
        <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../assets/vendor/charts/c3charts/c3.css">
        <link rel="stylesheet" href="../assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
        <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
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
                <div class="dashboard-ecommerce">
                    <div class="container-fluid dashboard-content ">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header">
                                    <h2 class="pageheader-title">Dashboard</h2>
                                    <p class="pageheader-text"></p>
                                    <div class="page-breadcrumb">

                                    </div>
                                </div>
                            </div>
                        </div>
                        
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
                                            FROM
                                                `tbl_area`
                                                INNER JOIN `tbl_vendormaster` 
                                                    ON (`tbl_area`.`area_id` = `tbl_vendormaster`.`area_id`)
                                                INNER JOIN `tbl_category` 
                                                    ON (`tbl_category`.`category_id` = `tbl_vendormaster`.`category_id`)
                                            WHERE (`tbl_vendormaster`.`vendor_id` ='{$_SESSION['vendorid']}')";
                        $join = mysqli_query($connection, $sql) or die(mysqli_error($connection));
                        echo "<table>";

                        while ($data = mysqli_fetch_array($join)) {
                            echo "<tr>";
                            echo "<td>Name<td>";
                            echo "<td>{$data['vendor_name']}</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>Gender</td>";
                            echo "<td>{$data['vendor_gender']}</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>Details</td>";
                            echo "<td>{$data['vendor_details']}</td>";
                            echo "</tr>";
                            echo"<tr>";
                            echo "<td>Category</td>";
                            echo "<td>{$data['category_name']}</td>";
                            echo "</tr>";
                            echo "<td>Area</td>";
                            echo "<td>{$data['area_name']}</td>";
                            echo "<tr>";
                            echo "</tr>";
                            echo "<td>image</td>";
                            echo "<td><img style = 'width:150px;'src='{$data['vendor_photo']}'</td>";
                            echo "<tr>";

                            echo "</tr>";
                            echo "<td>price</td>";
                            echo "<td>{$data['vendor_price']}</td>";

                            echo "<tr>";
                            echo "<td>Mobile</td>";
                            echo "<td>{$data['vendor_mobileno']}</td>";

                            echo "</tr>";
                            echo "<tr>";
                            echo "<td>email</td>";
                            echo "<td>{$data['vendor_email']}</td>";

                            echo "</tr>";
                        }
                        echo "<td><button><a style='color:blue;' href='edit-vendor.php?uid=$data[0]'>Update</a></button></td>";
                        echo "</table>";
                        ?>

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
            <!-- ============================================================== -->
            <!-- end wrapper  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper  -->
        <!-- ============================================================== -->
        <!-- Optional JavaScript -->
        <!-- jquery 3.3.1 -->
        <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
        <!-- bootstap bundle js -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <!-- slimscroll js -->
        <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
        <!-- main js -->
        <script src="assets/libs/js/main-js.js"></script>
        <!-- chart chartist js -->
        <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
        <!-- sparkline js -->
        <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
        <!-- morris js -->
        <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
        <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
        <!-- chart c3 js -->
        <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
        <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
        <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
        <script src="assets/libs/js/dashboard-ecommerce.js"></script>
    </body>

</html>

