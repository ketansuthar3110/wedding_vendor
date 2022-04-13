<?php
require '../../class/connection.php';
$msgs = "";
$msgn="";
$msg3 = "";
use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;
if($_POST)
{
    $email = $_POST['email'];
    $select = mysqli_query($connection, "select * from tbl_vendormaster where vendor_email = '{$email}'") or die(mysqli_error($connection));
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
$mail->Body    = "HI $email <b>Your password is</b>{$row['vendor_password']}";
   $mail->AltBody ="HI $email <b>Your password is</b>{$row['vendor_password']}";

    $mail->send();
     $msgs = '<div class="alert alert-success" role="alert">
  Mail sent
</div>';
} catch (Exception $e) {
       $msgn = '<div class="alert alert-danger" role="alert">
  Mail not sent;
</div>';
}

    }
    else
    {
          $msg3 = '<div class="alert alert-danger" role="alert">
  Mail not found
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
    <!-- ============================================================== -->
    <!-- forgot password  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card">
            <div class="card-header text-center"><img class="logo-img" src="../assets/images/logo.png" alt="logo"><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form method="post" id="myform">
                    <?php
                    echo $msgs;
                    echo $msgn;
                    echo $msg3;
                    ?>
                    <p>Don't worry, we'll send you an email to reset your password.</p>
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="email" name="email" required="" placeholder="Your Email" autocomplete="off">
                    </div>
                     <button id="submit" name="submit" class="btn btn-primary btn-lg">Reset Password</button>
                </form>
            </div>
            <div class="card-footer text-center">
                
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end forgot password  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="./assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="jquery.validate.js" type="text/javascript"></script>
     <script>
            $(document).ready(function()
            {
                $("#myform").validate();
            });
              
        </script>


</body>

 
</html>