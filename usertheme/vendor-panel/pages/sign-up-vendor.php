<?php
require '../../class/connection.php';

$login = "";
if ($_POST) {

    $name = $_POST['txt1'];
    $gender = $_POST['txt2'];
    $details = $_POST['txt3'];
    $catid = $_POST['txt4'];
    $areaid = $_POST['txt5'];
    $pic = "../../../upload/".$_FILES['txt6']['name'];
    $price = $_POST['txt7'];
    $mono = $_POST['txt8'];
    $email = $_POST['txt9'];
    $pass = $_POST['txt10'];

    $i = mysqli_query($connection, "insert into tbl_vendormaster(vendor_name,vendor_gender,vendor_details,category_id,area_id,vendor_photo,vendor_price,vendor_mobileno,vendor_email,vendor_password)values('{$name}','{$gender}','{$details}','{$catid}','{$areaid}','{$pic}','{$price}','{$mono}','{$email}','{$pass}')") or die(mysqli_error($connection));

    if ($i) {
        move_uploaded_file($_FILES['txt6']['tmp_name'], $pic);

        $login = "<div class='alert alert-success' role='alert'>Account Created Now Login as a vendor...<button><a href='login-vendor.php'>Log In</a></button></div>";
    }
}
?>
<!DOCTYPE html>

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
        <style>
            html,
            body {
                height: 100%;
                
            }

            body {
                
                display: -ms-flexbox;
                display: flex;
                -ms-flex-align: center;
                align-items: center;
                padding-top: 40px;
                padding-bottom: 40px;
            }
        </style>
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
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->

    <body>
        <!-- ============================================================== -->
        <!-- signup form  -->
        <div class="container">
            
            <div class="well-box">
                 <div class="row row-cols-2">
                        <div class="col">
                              <h2>Vendor registration</h2>
                        </div>
                        <div class="col">
                            <?php echo $login;?>
                        </div>
                    </div>
              
                <form method="post" enctype="multipart/form-data" id="myform">
                    <div class="row row-cols-2">
                        <div class="col">
                            <div class="form-group">
                                <label for="inputText3" class="col-form-label">Vendor name</label>
                                <input id="inputText3" type="text" class="form-control" name="txt1" placeholder="Enter name" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="inputText3" class="col-form-label">Vendor Gender</label>
                                <select name="txt2" class="form-control" required>
                                    <option hidden>Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>     
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-2">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Vendor details</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Enter details" name="txt3" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col">
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
                        </div>
                    </div>
                    <div class="row row-cols-2">
                        <div class="col">
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

                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="inputText3" class="col-form-label">Vendor Photo</label>
                                <input id="inputText3" type="file" class="form-control" name="txt6" required>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-2">
                        <div class="col">
                            <div class="form-group">
                                <label for="inputText3" class="col-form-label">Vendor Price</label>
                                <input id="inputText3" type="text" class="form-control" name="txt7" placeholder="enter price" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="inputText3" class="col-form-label">Vendor Mobile</label>
                                <input id="inputText3" type="text" class="form-control" name="txt8" placeholder="Enter mobile no" required>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-2">
                        <div class="col">
                            <div class="form-group">
                                <label for="inputEmail">Vendor Email</label>
                                <input id="inputEmail" type="email" name="txt9" placeholder="Enter email id" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="inputPassword">Vendor Password</label>
                                <input id="inputPassword" type="password" name="txt10" placeholder="Enter Password" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-2">
                        <div class="col">
                             <label for="inputPassword">Already a vendor ? <a href="login-vendor.php"><b>Login</b></a></label>
                        </div>
                        <div class="col">
                            <div class="form-group"> 
                                <button type="submit" class="btn btn-success">Add Record</button> 
                                <button type="reset" class="btn btn-primary">Reset</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <script src="jquery.validate.js" type="text/javascript"></script>
    <script>
            $(document).ready(function ()
            {
                $("#myform").validate();
            });

    </script>


</body>


</html>
