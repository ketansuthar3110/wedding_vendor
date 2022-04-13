<?php
session_start();
$msg = "";
require '../class/connection.php';

if ($_POST) {

    $opass = $_POST['opass'];
    $npass = $_POST['npass'];
    $cpass = $_POST['cpass'];

    $oldpasswordquery = mysqli_query($connection, "select admin_password from tbl_admin where admin_id='{$_SESSION['userid']}'") or die(mysqli_error($connection));

    $oldpasswordquery = mysqli_fetch_array($oldpasswordquery);

    if ($oldpasswordquery['admin_password'] == $opass) {
        if ($npass == $cpass) {
            if ($opass == $npass) {
                echo"<script>alert('Old password and new password must be diffrent ')</script>";
            } else {
                $update = mysqli_query($connection, "update tbl_admin set admin_password='{$npass}' where admin_id ='{$_SESSION['userid']}'") or die(mysqli_error($connection));
                if ($update) {
                    echo "<script>alert('password change sucessfully');</script>";
                }
            }
        } else {
            echo"<script>alert('New password and conform password must be same');</script>";
        }
    } else {
        echo"<script>alert('Old password is not match');</script>";
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
            $(document).ready(function ()
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
                                        <h2 class="pageheader-title">Change Password </h2>
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
                                        <form method="post"id="myform">
                                            <div class="form-group">
                                                <label for="inputPassword">Old Password</label>

                                                <input type="text" name="opass" class="form-control" placeholder="please enter old password" required="true"/>
                                            </div>   
                                            <div class="form-group">
                                                <label for="inputPassword">New Password</label>
                                                <input type="text" name="npass" class="form-control" placeholder="please enter new password" required="true"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">Confirm Password</label>
                                                <input type="text" name="cpass" class="form-control" placeholder="please enter confirm password" required="true"/>
                                            </div>
                                            <div class="form-group"> 
                                                <button type="submit" class="btn btn-default">Add Record</button> 
                                                <button type="reset" class="btn btn-default">Reset</button>
                                                <button type="button" class="btn btn-default"onclick="window.location = 'view-admin.php'">View Record</button> 
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
                                                    $(function (e) {
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
                                                            onBeforePaste: function (n, a) {
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
                                                    $(document).ready(function ()
                                                    {
                                                        $("#myform").validate();
                                                    });

            </script>

            <</body>

</html>
