<?php
require './class/connection.php';
session_start();
use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;
if($_POST)
{
    $email = $_POST['email'];
    $select = mysqli_query($connection, "select * from tbl_user where user_email = '{$email}'") or die(mysqli_error($connection));
    $count = mysqli_num_rows($select);
    
    $row = mysqli_fetch_array($select);
    
    if($count > 0)
    {
        
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'phpmaildemo3@gmail.com';                     //SMTP username
    $mail->Password   = 'init.001';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('phpmaildemo3@gmail.com', 'demo');
    $mail->addAddress($email, $email);     //Add a recipient
  
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Forget Password';
$mail->Body    = "HI $email <b>Your password is</b>{$row['user_password']}";
   $mail->AltBody ="HI $email <b>Your password is</b>{$row['user_password']}";

    $mail->send();
    echo "<b>Message has been sent'</b>";
} catch (Exception $e) {
    echo "Message could not be sent".$mail->ErrorInfo;
}

    }
    else
    {
        echo "<b>Email not found</b>";
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
    <script src="jquery-3.6.0.js" type="text/javascript"></script>
    <script src="jquery.validate.js" type="text/javascript"></script>
 <script>
            $(document).ready(function()
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
    <div class="collapse" id="searcharea">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
    <button class="btn tp-btn-primary" type="button">Search</button>
    </span> </div>
    </div>
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 top-message">
                    <p>Welcome to Wedding Vendor.</p>
                </div>
                <div class="col-md-6 top-links">
                    <ul class="listnone">
                        <li><a href="faq.php"> Help </a></li>
                        <li><a href="pricing-plan.php">Pricing</a></li>
                        <li><a href="signup-couple.php" class=" ">I m couple</a></li>
                        <li><a href="signup-vendor.php">Are you vendor?</a></li>
                        <li><a href="login-page.php">Log in</a></li>
                        <li>
                            <a role="button" data-toggle="collapse" href="#searcharea" aria-expanded="false" aria-controls="searcharea"> <i class="fa fa-search"></i> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3 logo">
                    <div class="navbar-brand">
                        <a href="index.php"><img src="images/logo.png" alt="Wedding Vendors" class="img-responsive"></a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="navigation" id="navigation">
                        <ul>
                            <li class="active"><a href="index.php">Home</a>
                                <ul>
                                    <li><a href="index.php" title="Home" class="animsition-link">Home</a></li>
                                    <li><a href="index-2.php" title="Home v.2" class="animsition-link">Home v.2</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Listing</a>
                                <ul>
                                    <li><a href="vendor-listing-row-map.php" title="Home" class="animsition-link">List / Half Map</a></li>
                                    <li><a href="vendor-listing-sidebar.php" title="Home" class="animsition-link">List / Sidebar Left</a></li>
                                    <li><a href="vendor-listing-no-sidebar.php" title="Home" class="animsition-link">List / No Sidebar</a></li>
                                    <li><a href="vendor-listing-top-map.php" title="Home" class="animsition-link">Top Map / List</a></li>
                                    <li><a href="vendor-list-4-colmun.php" title="Home" class="animsition-link">4 Column List</a></li>
                                    <li><a href="vendor-list-3-colmun.php" title="Home" class="animsition-link">3 Column List</a></li>
                                    <li><a href="vendor-list-horizontal.php" title="Home" class="animsition-link">Horizontal List </a></li>
                                    <li><a href="vendor-list-new.php" title="Home" class="animsition-link">List Variations </a></li>
                                    <li><a href="vendor-listing-bubba.php">Bubba Style Listing</a></li>
                                    <li><a href="vendor-listing-ocean.php">Ocean Style Listing</a></li>
                                </ul>
                            </li>
                            <li><a href="vendor-details.php">Vendor</a>
                                <ul>
                                    <li><a href="vendor-details.php">Vendor Simple</a></li>
                                    <li><a href="vendor-details-tabbed.php">Vendor Tabbed</a></li>
                                    <li><a href="vendor-profile.php">Vendor Profile</a></li>
                                </ul>
                            </li>
                            <li><a href="venue-listing.php" title="Home" class="animsition-link">Suppliers</a>
                                <ul>
                                    <li><a href="venue-listing.php">Venue List</a></li>
                                    <li><a href="photography-listing.php">Photographer List</a></li>
                                    <li><a href="dresses-listing.php">Dresses List</a></li>
                                    <li><a href="florist-listing.php">Florist List</a></li>
                                    <li><a href="videography-listing.php">Videography List</a></li>
                                    <li><a href="cake-listing.php">Cake List</a></li>
                                    <li><a href="music-listing.php">Music List</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Planning Tools</a>
                                <ul>
                                    <li><a href="planning-to-do.php">To Do List</a></li>
                                    <li><a href="planning-budget.php">Budget Planner</a></li>
                                    <li><a href="couple-landing-page.php">Couple Signup (LP)</a></li>
                                    <li><a href="couple-dashboard.php">Couple Admin</a></li>
                                    <li><a href="dashboard-vendor.php">Vendor Admin</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Features</a>
                                <ul>
                                    <li><a href="#">Blog</a>
                                        <ul>
                                            <li><a href="blog.php">Blog Listing</a></li>
                                            <li><a href="blog-single.php">Blog Single</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about-us.php">About us</a></li>
                                    <li><a href="contact-us.php">Contact us</a></li>
                                    <li><a href="pricing-plan.php">Pricing Table</a></li>
                                    <li><a href="faq.php">FAQ's</a></li>
                                    <li><a href="404-error.php">404 Error</a></li>
                                    <li><a href="#">Shortcodes</a>
                                        <ul>
                                            <li><a href="shortcode-columns.php">Column</a></li>
                                            <li><a href="shortcode-accordion.php">Accordion</a></li>
                                            <li><a href="shortcode-tabs.php">Tabs</a></li>
                                            <li><a href="shortcode-pagination.php">Paginations</a></li>
                                            <li><a href="shortcode-typography.php">Typography</a></li>
                                            <li><a href="shortcode-accordion.php">Accordion</a></li>
                                            <li><a href="shordcods-alerts.php">Alert</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="wedding-guideline.php">Template Guideline</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Real Weddings</a>
                                <ul>
                                    <li><a href="real-wedding-listing.php">Listing</a></li>
                                    <li><a href="real-wedding-single.php">Real Wedding Single</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tp-page-head">
        <!-- page header -->
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="page-header text-center">
                        <div class="icon-circle">
                            <i class="icon icon-size-60 icon-padlock-1 icon-white"></i>
                        </div>
                        <h1>Forgot your password?</h1>
                        <p>Have you forgotten your password? Please provide the email address you signed up with and we will send you a link to reset it.</p>
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
                <form method="post" id="myform">
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="control-label" for="email">E-mail<span class="required">*</span></label>
                        <input id="email" name="email" type="text" placeholder="E-Mail" class="form-control input-md" required>
                    </div>
                    <div class="form-group">
                        <button id="submit" name="submit" class="btn btn-primary">Reset Password</button>
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
    <script src="jquery.validate.js" type="text/javascript"></script>
     <script>
            $(document).ready(function()
            {
                $("#myform").validate();
            });
              
        </script>
</body>

</html>
