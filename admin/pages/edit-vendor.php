<?php
require './class/connection.php';

$msg = "";
    $editid = $_GET['uid'];
        $up = mysqli_query($connection,"select * from tbl_vendormaster where vendor_id = '{$editid}'") or die (mysqli_error($connection));

    $selectrow = mysqli_fetch_array($up);
if($_POST)
{
    $name = $_POST['txt1'];
    $gender = $_POST['txt2'];
    $details = $_POST['txt3'];
    $catid = $_POST['txt4'];
    $areaid = $_POST['txt5'];
    $pic = "../../upload/".$_FILES['txt6']['name'];
    $price = $_POST['txt7'];
    $mono = $_POST['txt8'];
    $email = $_POST['txt9'];
    $pass = $_POST['txt10'];
   $update=mysqli_query($connection,"update tbl_vendormaster set vendor_name = '{$name}',vendor_gender = '{$gender}',vendor_details = '{$details}',category_id = '{$catid}',area_id = '{$areaid}',vendor_photo = '{$pic}',vendor_price = '{$price}',vendor_mobileno = '{$mono}',vendor_email = '{$email}',vendor_password = '{$pass}' where vendor_id = '{$editid}'") or die (mysqli_error($connection));
if($update)
{
    move_uploaded_file($_FILES['txt6']['tmp_name'], $pic);
   $msg = '<div class="alert alert-success" role="alert">
  Record Updated
</div>';
} 
}
?>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Wedding Vendor edit-vendors</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
    <link rel="stylesheet" href="../assets/vendor/inputmask/css/inputmask.css" />
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
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-10">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header" id="top">
                                    <h2 class="pageheader-title">Vendor Form</h2>
                                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                                    <div class="page-breadcrumb">
                                        
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
                                    <h5 class="card-header">Basic Form</h5>
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
    <script src="./assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="./assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="./assets/libs/js/main-js.js"></script>
    <script src="./assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
    <script>
    $(function(e) {
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
                onBeforePaste: function(n, a) {
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
</body>
 
</html>



