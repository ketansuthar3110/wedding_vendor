<?php
session_start();
$msg="";
require './class/connection.php';





if ($_POST) {

    $opass = $_POST['txt1'];
    $npass = $_POST['txt2'];
    $cpass = $_POST['txt3'];

    $oldpasswordquery = mysqli_query($connection, "select user_password from tbl_user where user_id='{$_SESSION['userid']}'") or die(mysqli_error($connection));

    $oldpasswordquery = mysqli_fetch_array($oldpasswordquery);

    if ($oldpasswordquery['user_password'] == $opass) 
    {
        if ($npass == $cpass)
        {
            if ($opass == $npass)
            {
                echo"<script>alert('Old password and new password must be diffrent ')</script>";
            } 
            else 
            {
                $update = mysqli_query($connection, "update tbl_user set user_password='{$npass}' where user_id ='{$_SESSION['userid']}'") or die(mysqli_error($connection));
                if ($update) 
                {
                    echo "<script>alert('password change sucessfully');</script>";
                }
            }
        }
        else 
        {
            echo"<script>alert('New password and conform password must be same');</script>";
        }
    } 
    else 
    {
        echo"<script>alert('Old password is not match');</script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Wedding Vendor | Find The Best Wedding Vendors</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template style.css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <!-- Font used in template -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,300italic,300' rel='stylesheet' type='text/css'>
    <!--font awesome icon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- favicon icon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <?php
    include './theme/header.php';
    ?>
    <div class="tp-page-head">
        <!-- page header -->
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="page-header text-center">
                        <div class="icon-circle">
                            <i class="icon icon-size-60 icon-padlock-1 icon-white"></i>
                        </div>
                        <h1>Reset your password?</h1>
                        <p>Have you change your password? Please provide the details of your password. password will change automatically.  </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page header -->
    <div class="tp-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Forget Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="container">
            <div class="col-md-offset-3 col-md-6 well-box">
                <form method="post">
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="control-label" for="email">Old-password<span class="required">*</span></label>
                        <input id="email" name="email" type="text" placeholder="Old password" class="form-control input-md" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">New-password<span class="required">*</span></label>
                        <input id="email" name="email" type="text" placeholder="New password" class="form-control input-md" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Confirm-password<span class="required">*</span></label>
                        <input id="email" name="email" type="text" placeholder="Confirm password" class="form-control input-md" required>
                    </div>
                    <div class="form-group">
                        <button id="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <!-- Nav tabs -->
                <!-- Tab panes -->
            </div>
        </div>
    </div>
    <?php
    include './theme/footer.php';
    ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Flex Nav Script -->
    <script src="js/jquery.flexnav.js" type="text/javascript"></script>
    <script src="js/navigation.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/header-sticky.js"></script>
</body>

</html>