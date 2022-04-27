<?php
require './class/connection.php';
$msgs = "";
$msgn = "";
$msg3 = "";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_POST) {
    $email = $_POST['email'];
    $select = mysqli_query($connection, "select * from tbl_admin where admin_email = '{$email}'") or die(mysqli_error($connection));
    $count = mysqli_num_rows($select);

    $row = mysqli_fetch_array($select);

    if ($count > 0) {

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
//Load Composer's autoloader
        require './vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = 'phpmaildemo3@gmail.com';                     //SMTP username
            $mail->Password = 'init.001';                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Recipients
            $mail->setFrom('phpmaildemo3@gmail.com', 'demo');
            $mail->addAddress($email, $email);     //Add a recipient
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Forget Password';
            $mail->Body = "HI $email <b>Your password is</b>{$row['admin_password']}";
            $mail->AltBody = "HI $email <b>Your password is</b>{$row['admin_password']}";

            $mail->send();
            $msgs = '<div class="alert alert-success" role="alert">
  Mail sent
</div>';
        } catch (Exception $e) {
            $msgn = '<div class="alert alert-danger" role="alert">
  Mail not sent;
</div>';
        }
    } else {
        $msg3 = '<div class="alert alert-danger" role="alert">
  Mail not found
</div>';
    }
}
?>






<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Forgot Password - srtdash</title>
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

        <!-- login area start -->
        <div class="login-area">
            <div class="container">
                <div class="login-box ptb--100">
                    <form method="post">
                        <?php
                    echo $msgs;
                    echo $msgn;
                    echo $msg3;
                    ?>
                        <div class="login-form-head">
                            <h4>Forgot Password</h4>
                            <p>Please enter your registered email id </p>
                        </div>
                        <div class="login-form-body">
                            <div class="form-gp">
                                <label for="exampleInputEmail1">Email</label>
                                <input class="form-control form-control-lg" type="email" name="email" required="" placeholder="" autocomplete="off">

                                <i class="ti-lock"></i>
                            </div>
                            <div class="submit-btn-area mt-5">
                                <button id="form_submit" type="submit">Reset <i class="ti-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- login area end -->

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