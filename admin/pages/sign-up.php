<?php
require './class/connection.php';
$msg = "";
if ($_POST) {

    $name = $_POST['txt1'];
    $email = $_POST['txt2'];
    $pass = $_POST['txt3'];

    $i = mysqli_query($connection, "insert into tbl_admin(admin_name,admin_email,admin_password)values('{$name}','{$email}','{$pass}')") or die(mysqli_error($connection));

    if ($i) {
        header("location:login.php");
    }
}
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
        <!-- ============================================================== -->
        <form class="splash-container" method="post" id="myform">
            <div class="card">
                <div class="card-header" align="center">
                    <img style="width:170px;" class="logo-img" src="../assets/images/logo.jpg" alt="logo">

                    <h3 class="mb-1">Registrations Form</h3>
                    <p>Please enter admin information.</p>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" name="txt1" required="" placeholder="Admin name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="email" name="txt2" required="" placeholder="Admin E-mail" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="pass1" type="password" name="txt3" required="" placeholder=" Admin Password">
                    </div>

                    <div class="form-group pt-2">
                        <button class="btn btn-block btn-primary" type="submit">Register My Account</button>
                    </div>


                </div>
                <div class="card-footer bg-white">
                    <p>Already member? <a href="login.php" class="text-secondary">Login Here.</a></p>
                </div>
            </div>
        </form>
        <script src="jquery.validate.js" type="text/javascript"></script>
        <script>
            $(document).ready(function ()
            {
                $("#myform").validate();
            });

        </script>


    </body>


</html>