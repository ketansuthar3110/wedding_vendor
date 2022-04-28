<?php
session_start();

require '../../class/connection.php';

$msg = "";

$up = mysqli_query($connection, "select * from tbl_vendormaster where vendor_id = '{$_SESSION['vendorid']}'") or die(mysqli_error($connection));

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
   
    $update = mysqli_query($connection, "update tbl_vendormaster set vendor_name = '{$name}',vendor_gender = '{$gender}',vendor_details = '{$details}',category_id = '{$catid}',area_id = '{$areaid}',vendor_photo = '{$pic}',vendor_price = '{$price}',vendor_mobileno = '{$mono}',vendor_email = '{$email}', where vendor_id = '{$_SESSION['vendorid']}'") or die(mysqli_error($connection));
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
                
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <h3>Personal Details</h3>
                        
                             <div class="col-12 mt-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="header-title">Vendor Details</h4>
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
                                                        echo "";
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
                                                        
                                                        while ($selectarearowfetch = mysqli_fetch_array($selectarearow)) {

                                                            echo "<option value='{$selectarearowfetch['area_id']}'>{$selectarearowfetch['area_name']}</option>";
                                                        }
                                                        echo"</select>";
                                                        ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputText3" class="col-form-label">Vendor photo</label><br>
                                                            <?php 
                                                            $i = mysqli_query($connection,"select * from tbl_image where vendor_id = '{$_SESSION['vendorid']}'");
                                                                    while($img = mysqli_fetch_array($i))
                                                            {
                                                                
                                                                print "<img style = 'width:150px;' src='../../../upload{$img['image']}'>  ";
                                                             }
                                                            ?>
                                                           
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

                                                   

                                                        <div class="card-footer"> 
                                                            <button type="submit" class="btn btn-success btn-sm">Update Record</button> 
                                                           
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
               
                <!-- ============================================================== -->
                <!-- end footer -->
                <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- end wrapper  -->
            <!-- ============================================================== -->
     
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

