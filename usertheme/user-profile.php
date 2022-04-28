<?php
session_start();
require './class/connection.php';
$msg = "";

$up = mysqli_query($connection, "select * from tbl_user where user_id = '{$_SESSION['userid']}'") or die(mysqli_error($connection));

$selectrow = mysqli_fetch_array($up);
if ($_POST) {
    $name = $_POST['txt1'];
    $gender = $_POST['txt2'];
    $email = $_POST['txt3'];
    
    $mono = $_POST['txt4'];
    $address = $_POST['txt5'];
    $update = mysqli_query($connection, "update tbl_user set user_name = '{$name}',user_gender = '{$gender}',user_email = '{$email}',user_mobile = '{$mono}',user_address = '{$address}' where user_id = '{$_SESSION['userid']}'") or die(mysqli_error($connection));
    if ($update) {
        $msg = '<div class="alert alert-success" role="alert">
  Profile Updated
</div>';
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
        <link rel="stylesheet" type="text/css" href="css/flaticon.css">
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
        <!-- Font used in template -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

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
        <div class="tp-dashboard-head">
            <!-- page header -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 profile-header">
                        <div class="profile-pic col-md-2"><img style="width: 100px;" src="images/user-icon.png" alt=""></div>
                        <div class="profile-info col-md-9">
                            <h1 class="profile-title"><?php echo "Hello " . $_SESSION['username']; ?><small></small></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.page header -->
        <div class="tp-dashboard-nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 dashboard-nav">
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a href="user-profile.php"><i class="fa fa-user db-icon"></i>My Profile</a></li>
                            <li><a href="view-cart.php"><i class="fa fa-heart db-icon"></i>My Wishlist </a></li>
                            <li><a href="view-booking.php"><i class="fa fa-list db-icon"></i>My Booking</a></li>
                                                <li class=""><a href="change-password-user.php">Change Password</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard-page-head">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="page-title">
                                        <h1>Account Details <small>Change your personal profile</small></h1>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 profile-dashboard">
                        <div class="row">
                            <div class="col-md-12 dashboard-form calender">
                                <form class="form-horizontal" method="post">
                                    <div class="bg-white pinside40 mb30">
                                        <!-- Form Name -->
                                        <?php
                                        echo $msg;
                                        ?>
                                        <h2 class="form-title">Pesonal Infomations</h2>
                                        
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="name"> Name<span class="required">*</span></label>
                                            <div class="col-md-10">
                                                <input id="name" name="txt1" type="text" placeholder="Vendor Name" value="<?php echo $selectrow['user_name']; ?>" class="form-control input-md" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="name">Gender </label>
                                            <div class="col-md-10">
                                                <select name="txt2" class="form-control"  value= "<?php echo $selectrow['user_gender']; ?>">
                                                    <option>Male</option>
                                                    <option>Female</option>     
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="name">Email<span class="required">*</span></label>
                                            <div class="col-md-10">
                                                <input id="name" name="txt3" type="email" placeholder="Email" value="<?php echo $selectrow['user_email']; ?>" class="form-control input-md" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="name">Mobile No<span class="required">*</span></label>
                                            <div class="col-md-10">
                                                <input id="name" name="txt4" type="text" placeholder="Phone" value="<?php echo $selectrow['user_mobile']; ?>" class="form-control input-md" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="name">Mobile No<span class="required">*</span></label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" id="exampleFormControlTextarea1"   name="txt5" rows="3"><?php echo $selectrow['user_address']; ?></textarea>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="submit"></label>
                                            <div class="col-md-4">
                                                <button id="submit" name="submit" class="btn btn-primary">Update Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <!-- Footer -->
            <div class="container">
                <div class="row">
                    <div class="col-md-5 ft-aboutus">
                        <h2>Wedding.Vendor</h2>
                        <p>At Wedding Vendor our purpose is to help people find great online network connecting wedding suppliers and wedding couples who use those suppliers. <a href="#">Start Find Vendor!</a></p>
                        <a href="#" class="btn btn-default">Find a Vendor</a> </div>
                    <div class="col-md-3 ft-link">
                        <h2>Useful links</h2>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact us</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Career</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Use</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 newsletter">
                        <h2>Subscribe for Newsletter</h2>
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter E-Mail Address" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Submit</button>
                                </span> </div>
                            <!-- /input-group -->
                            <!-- /.col-lg-6 -->
                        </form>
                        <div class="social-icon">
                            <h2>Be Social &amp; Stay Connected</h2>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.Footer -->
        <div class="tiny-footer">
            <!-- Tiny footer -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">Copyright © 2014. All Rights Reserved</div>
                </div>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.flexnav.js" type="text/javascript"></script>
        <script src="js/navigation.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
        <script src="js/date-script.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/header-sticky.js"></script>
    </body>

</html>
