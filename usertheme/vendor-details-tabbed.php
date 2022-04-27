<?php
require './class/connection.php';
session_start();
$vid = $_GET['pid'];
$vq = mysqli_query($connection, "select * from tbl_vendormaster where vendor_id = {$vid} ") or die(mysqli_error($connection));
$data1 = mysqli_fetch_array($vq);
$count = mysqli_num_rows($vq);

if ($count < 1) {
    header("location:vendor-listing.php");
}


$msg = "";
$msgr = "";
$msgreview = "";

if ($_POST) {


    $date = $_POST['txt1'];
    $userid = $_POST['txt2'];
    $vid = $_POST['txt3'];
    $bprice = $_POST['txt4'];
    $bstatus = $_POST['txt5'];

    $i = mysqli_query($connection, "insert into tbl_booking(booking_date,user_id,vendor_id,booking_price,booking_status)values('{$date}','{$userid}','{$vid}','{$bprice}','{$bstatus}')") or die(mysqli_error($connection));
    $lastid = mysqli_insert_id($connection);
    $ordet = mysqli_query($connection,"insert into tbl_booking_details(booking_id,booking_date,user_id,vendor_id,booking_price)values('{$lastid}','{$date}','{$userid}','{$vid}','{$bprice}')") or die(mysqli_error($connection));
    if ($i) {

        header("location:payment.php?pyd={$lastid}");
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
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="css/owl.theme.css">
        <link rel="stylesheet" type="text/css" href="css/owl.transitions.css">
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
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
                            <h1>Vendor Details</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tp-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Vendor List</a></li>
                            <li class="active">Vendor Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-container">
            <div class="container tabbed-page st-tabs">
                <div class="row tab-page-header">
                    <div class="col-md-8 title"> 
                        <h1><?php echo "{$data1['vendor_name']}"; ?></h1>
                        <hr>
                        <p class="location"><i class="fa fa-arrow-right"></i><?php echo"{$data1['vendor_details']}"; ?></p>
                        <p class="location"><i class="fa fa-link"></i><?php echo"{$data1['vendor_email']}"; ?></p>

                        <p class="location"><i class="fa fa-mobile"></i><?php echo"{$data1['vendor_mobileno']}"; ?></p>
                    </div>
                    <div class="col-md-4 venue-data">
                        <div class="venue-info">
                            <!-- venue-info-->
                            <div class="capacity">
                                <div>Capacity:</div>
                                <span class="cap-people"> 50 - 300 </span> </div>
                            <div class="pricebox">
                                <div>Avg price:</div>
                                <span class="price"><?php echo "Rs . {$data1['vendor_price']}"; ?></span></div>
                        </div>
                        <a href="#inquiry" class="btn btn-default btn-lg btn-block">Book Venue</a> </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#photo" title="Gallery" aria-controls="photo" role="tab" data-toggle="tab"> <i class="fa fa-photo"></i> <span class="tab-title">Photo</span></a>
                            </li>
                            <li role="presentation">
                                <a href="#about" title="about info" aria-controls="about" role="tab" data-toggle="tab">
                                    <i class="fa fa-info-circle"></i>
                                    <span class="tab-title">About</span>
                                </a>
                            </li>

                            <li role="presentation">
                                <a href="#reviews" title="Review" aria-controls="reviews" role="tab" data-toggle="tab"> <i class="fa fa-commenting"></i> <span class="tab-title">Reviews</span></a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- tab content start-->
                            <div role="tabpanel" class="tab-pane fade in active" id="photo">
                                <div id="sync1" class="owl-carousel">
                                    <?php
                                    echo" <div class='item'> <img src='../upload{$data1['vendor_photo']}' alt='' class='img-responsive'> </div>";

                                    $img = mysqli_query($connection, "select * from tbl_image where vendor_id = {$data1['vendor_id']}") or die(mysqli_error($connection));
                                    while ($image = mysqli_fetch_array($img)) {
                                        echo" <div class='item'> <img src='../upload{$image['image']}' alt='' class='img-responsive'> </div>";
                                    }
                                    ?>
                                </div>
                                <div id="sync2" class="owl-carousel">
                                    <?php
                                    echo" <div class='item'> <img src='../upload{$data1['vendor_photo']}' alt='' class='img-responsive'> </div>";

                                    $img1 = mysqli_query($connection, "select * from tbl_image where vendor_id = {$data1['vendor_id']}") or die(mysqli_error($connection));

                                    while ($image1 = mysqli_fetch_array($img1)) {
                                        echo" <div class='item'> <img src='../upload{$image1['image']}' alt='' class='img-responsive'> </div>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="about">
                                <div class="venue-details">
                                    <h2>Vendor Details</h2>
                                    <?php
                                    $vq1 = mysqli_query($connection, "select * from tbl_vendormaster where vendor_id = {$vid} ") or die(mysqli_error($connection));
                                    $data = mysqli_fetch_array($vq1);

                                    echo "<br><h3>{$data['vendor_name']}</h3>";

                                    echo "<br><h4>{$data['vendor_details']}</h4>";
                                    echo "<br><h3>Vendor Price Rs.{$data['vendor_price']}</h3>";
                                    echo "<br><h3>Mo.{$data['vendor_mobileno']}</h3>";
                                    echo "<br><h3>Contact us : {$data['vendor_email']}</h3>";

                                    echo "<br>";
                                    echo "<b><a href='#inquiry'>Book Now</a></b>";
                                    ?>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="reviews">
                                <!-- comments -->
                                <div class="customer-review">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h1>Couples Review</h1>
                                            <?php
                                            $sql = "SELECT
                                                        `tbl_review`.`review_date`
                                                        , `tbl_review`.`review_details`
                                                        , `tbl_vendormaster`.`vendor_name`
                                                        , `tbl_user`.`user_name`
                                                    FROM
                                                        `tbl_vendormaster`
                                                        INNER JOIN `tbl_review` 
                                                            ON (`tbl_vendormaster`.`vendor_id` = `tbl_review`.`vendor_id`)
                                                        INNER JOIN `tbl_user` 
                                                            ON (`tbl_user`.`user_id` = `tbl_review`.`user_id`) where tbl_vendormaster.vendor_id=$vid";
                                            $req = mysqli_query($connection, $sql) or die(mysqli_error($connection));

                                            while ($reviewdata = mysqli_fetch_array($req)) {
                                                echo '<div class="review-list">';

                                                echo '<div class="row">';
                                                echo '<div class="col-md-2 col-sm-2 hidden-xs">';
                                                echo '<div class="user-pic"> <img style="width:100px;" class="img-responsive img-circle" src="images/user-icon.png" alt=""> </div>';
                                                echo '</div>';
                                                echo '<div class="col-md-10 col-sm-10">';
                                                echo '<div class="panel panel-default arrow left">';
                                                echo '<div class="panel-body">';

                                                echo '<div class="review-post">';
                                                echo "<p>{$reviewdata['review_details']}</p>";
                                                echo '</div>';
                                                echo "<div class='review-user'>By {$reviewdata['user_name']} <a href='#'></a>, on <span class='review-date'></span>{$reviewdata['review_date']}</div>";
                                                echo '</div>';
                                                echo '</div>';
                                                echo '</div>';
                                                echo '</div>';
                                                echo '</div>';
                                            }
                                            ?>
                                            <div class="review"> <a class="btn tp-btn-primary btn-block tp-btn-lg" role="button" data-toggle="collapse" href="#review" aria-expanded="false" aria-controls="review"> Write A Review </a> </div>
                                            <div class="collapse review-list review-form" id="review">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <h1>Write Your Review</h1>
                                                        <form method="post"  id="myform"  action="reveiwadd.php">
                                                            <?php echo $msgr; ?>

                                                            <input type="hidden" name="pid" value="<?php echo $vid; ?>">
                                                            <!-- Text input-->
                                                            <div class="form-group">
                                                                <label class="control-label" for="name">Name</label>
                                                                <div class="">
                                                                    <?php
                                                                    $selectcatrow = mysqli_query($connection, "select * from tbl_user") or die(mysqli_error($connection));

                                                                    echo"<select name='uname' class='form-control input-md' reqiured>";
                                                                    echo "<option hidden>Select user name</option>";
                                                                    while ($selectcatrowfetch = mysqli_fetch_array($selectcatrow)) {

                                                                        echo "<option value='{$selectcatrowfetch['user_id']}'>{$selectcatrowfetch['user_name']}</option>";
                                                                    }
                                                                    echo"</select>";
                                                                    ?> 
                                                                </div>
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="form-group">
                                                                <label class="control-label" for="email">Vendor name</label>
                                                                <div class=" ">
                                                                    <?php
                                                                    $selectcatrow = mysqli_query($connection, "select * from tbl_vendormaster") or die(mysqli_error($connection));

                                                                    echo"<select name='vname' class='form-control input-md'>";
                                                                    echo "<option hidden>Select vendor name</option>";
                                                                    while ($selectcatrowfetch = mysqli_fetch_array($selectcatrow)) {

                                                                        echo "<option value='{$selectcatrowfetch['vendor_id']}'>{$selectcatrowfetch['vendor_name']}</option>";
                                                                    }
                                                                    echo"</select>";
                                                                    ?> 
                                                                </div>
                                                            </div>
                                                            <!-- Text input-->
                                                            <div class="form-group">
                                                                <label class=" control-label" for="reviewtitle">Review date</label>
                                                                <div class=" ">
                                                                    <input id="reviewtitle" name="rdate" type="date" placeholder="Review Title" class="form-control input-md" required>
                                                                </div>
                                                            </div>
                                                            <!-- Textarea -->
                                                            <div class="form-group">
                                                                <label class=" control-label">Write Review</label>
                                                                <div class="">
                                                                    <textarea class="form-control" rows="8" name="details" placeholder="write your review here"></textarea>
                                                                </div>
                                                            </div>
                                                            <!-- Button -->
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-primary btn-lg">Submit Review</button>
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
                        <!-- /.tab content start-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="side-box" id="inquiry">
                            <h2>Send Enquiry to Vendor</h2>
                            <p>Fill in your details and a Venue Specialist will get back to you shortly.</p>
                            <form method="post" id="myform"  action="cart-process.php">

                                <div class="form-group">
                                    <label for="inputText3" class="control-label">Booking-date</label>
                                    <input id="inputText3" type="date" class="form-control" name="txt1" required>
                                </div>

                                <div class="form-group">
                                    <label for="inputText3" class="control-label">User-name</label>
                                    <?php
                                    $myuserid = $_SESSION['userid'];
                                    echo"<select name='txt2' class='form-control'>";
                                    echo "<option hidden>Select user name</option>";

                                    echo "<option value='{$myuserid}'>{$_SESSION['username']}</option>";

                                    echo"</select>";
                                    ?> 
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="control-label">Vendor-name</label>
                                    <?php
                                    $selectcatrow1 = mysqli_query($connection, "select vendor_name from tbl_vendormaster where vendor_id={$vid}") or die(mysqli_error($connection));

                                    echo"<select name='txt3' class='form-control'>";
                                    echo "<option hidden>Select vendor name</option>";
                                    $selectcatrowfetch1 = mysqli_fetch_array($selectcatrow1);

                                    echo "<option value='{$vid}'>{$selectcatrowfetch1['vendor_name']}</option>";

                                    echo"</select>";
                                    ?> 
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword" class="control-label">Booking Price</label>
                                    <?php
                                    $veprice = mysqli_query($connection, "select vendor_price from tbl_vendormaster where vendor_id={$vid}") or die(mysqli_error($connection));
                                    $vprice = mysqli_fetch_array($veprice);
                                    ?>
                                    <input id="inputPassword" type="text" name="txt4" placeholder="Enter Price" class="form-control" value="<?php echo "{$vprice['vendor_price']}"; ?>" required>
                                </div>



                                <div class="form-group">
                                    <label for="inputText3" class="control-label">Booking-status</label>
                                    <input id="inputText3" type="text" class="form-control" name="txt5" placeholder="Enter booking status" value="pending" required>
                                </div>


                                <div class="form-group"> 
                                    <input type="hidden" name="pid" value="<?php echo $vid ?>"/>
                                    <button name="booknow" class="btn btn-default btn-lg btn-block">Book Vendor Now</button>
                                    <button name="wishlist" class="btn btn-default btn-lg btn-block">Add to Wishlist</button>
                                    <!---  <button name="submit" class="btn btn-default btn-lg btn-block"onclick="window.location = 'view-booking.php'">View</button>--->
                                </div>
                            </form>
                           
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="profile-sidebar side-box">
                            <!-- SIDEBAR USERPIC -->
                            <?php echo "<div class='profile-userpic'> <img src='../upload{$data['vendor_photo']}' class='img-responsive img-circle' alt=''> </div>"; ?>
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name">
                                    <h2><?php echo "{$data1['vendor_name']}"; ?></h2>
                                </div>
                                <div class="profile-address"> <i class="fa fa-arrow-right"></i> <?php echo "{$data1['vendor_details']}"; ?> </div>
                                <div class="profile-website"> <i class="fa fa-mobile"></i><?php echo "{$data1['vendor_mobileno']}"; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="social-sidebar side-box">
                            <ul class="listnone follow-icon">
                                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
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
        <script src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/thumbnail-slider.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/header-sticky.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script>
            var myCenter = new google.maps.LatLng(23.0203458, 72.5797426);

            function initialize() {
                var mapProp = {
                    center: myCenter,
                    zoom: 9,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

                var marker = new google.maps.Marker({
                    position: myCenter,

                    icon: 'images/pinkball.png'
                });

                marker.setMap(map);
                var infowindow = new google.maps.InfoWindow({
                    content: "Hello Address"
                });
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
        <script type="text/javascript" src="js/price-slider.js"></script>
        <script>
            $(function () {
                $("#weddingdate").datepicker();
            });
        </script>
    </body>

</html>
