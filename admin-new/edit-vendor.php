<?php
require './class/connection.php';

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
                                            <div class="card-body">
                                                <form method="post" enctype="multipart/form-data" >
                                                    <div class="form-group">
                                                        <label for="inputText3" class="col-form-label">Vendor name</label>
                                                        <input id="inputText3" type="text"  value= "<?php echo $selectrow['vendor_name']; ?>" class="form-control" name="txt1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputText3" class="col-form-label">Vendor Gender</label>
                                                        <select name="txt2" class="form-control"  value= "<?php echo $selectrow['vendor_gender']; ?>">
                                                            <option>Male</option>
                                                            <option>Female</option>     
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Vendor Details</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1"   name="txt3" rows="3"><?php echo $selectrow['vendor_details']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputText3" class="col-form-label">Category-name</label>
                                                        <?php
                                                        $selectcatrow = mysqli_query($connection, "select * from tbl_category") or die(mysqli_error($connection));

                                                        echo"<select name='txt4' class='form-control'>";
                                                        echo "<option hidden>Select category name</option>";
                                                        while ($selectcatrowfetch = mysqli_fetch_array($selectcatrow)) {

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
                                                        while ($selectarearowfetch = mysqli_fetch_array($selectarearow)) {

                                                            echo "<option value='{$selectarearowfetch['area_id']}'>{$selectarearowfetch['area_name']}</option>";
                                                        }
                                                        echo"</select>";
                                                        ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputText3" class="col-form-label">Vendor photo</label>
                                                            <input id="inputText3" type="file"  value= "<?php echo $selectrow['vendor_photo']; ?>" class="form-control" name="txt6">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputText3" class="col-form-label">Vendor Price</label>
                                                            <input id="inputText3" type="text"  value= "<?php echo $selectrow['vendor_price']; ?>" class="form-control" name="txt7">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="inputText4" class="col-form-label">Vendor Mobile</label>
                                                            <input id="inputText4" type="number" class="form-control"  value= "<?php echo $selectrow['vendor_mobileno']; ?>" name="txt8" placeholder="Numbers">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="inputEmail">Vendor Email</label>
                                                            <input id="inputEmail" type="email" name="txt9"  value= "<?php echo $selectrow['vendor_email']; ?>" placeholder="name@example.com" class="form-control">

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="inputPassword">Vendor Password</label>
                                                            <input id="inputPassword" type="password" name="txt10"  value= "<?php echo $selectrow['vendor_password']; ?>" placeholder="Password" class="form-control">
                                                        </div>


                                                        <div class="card-footer"> 
                                                            <button type="submit" class="btn btn-success btn-sm">Update Record</button> 
                                                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                                            <button type="button" class="btn btn-primary btn-sm"onclick="window.location = 'view-vendor.php'">View Record</button> 
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




