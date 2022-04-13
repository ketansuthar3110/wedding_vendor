<?php
require './class/connection.php';

$vid = $_GET['pid'];
$vq = mysqli_query($connection, "select * from tbl_vendormaster where vendor_id = {$vid} ") or die(mysqli_error($connection));

$count = mysqli_num_rows($vq);

if ($count < 1) {
    header("location:vendor-listing.php");
}


$msg = "";
if ($_POST) {

    $date = $_POST['txt1'];
    $userid = $_POST['txt2'];
    $vid = $_POST['txt3'];
    $bprice = $_POST['txt4'];
    $bstatus = $_POST['txt5'];

    $i = mysqli_query($connection, "insert into tbl_booking(booking_date,user_id,vendor_id,booking_price,booking_status)values('{$date}','{$userid}','{$vid}','{$bprice}','{$bstatus}')") or die(mysqli_error($connection));

    if ($i) {
        $msg = '<div class="alert alert-success" role="alert">
  Record Inserted
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
        <div id="slider" class="owl-carousel owl-theme slider">
            <div class="item">
                <div class="slider-pic"><img src="images/hero-image-2.jpg" alt="Mirror Edge"></div>
            </div>
            <div class="item">
                <div class="slider-pic"><img src="images/venue-pic-3.jpg" alt="Wedding couple pic"></div>
            </div>
            <div class="item">
                <div class="slider-pic"><img src="images/venue-pic.jpg" alt="The Last of us"></div>
            </div>
        </div>
        <div class="tp-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Venue Listing</a></li>
                            <li class="active">Wedding Venue Title Goes Here</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container venue-header">
            <div class="row venue-head">
                <div class="col-md-12 title"> <a href="#" class="label-primary">Boutique</a>
                    <h1>Wedding Venue Title Goes Here</h1>
                    <p class="location"><i class="fa fa-map-marker"></i>110 Pennington Street, London E1W 2BB</p>
                </div>
                <div class="col-md-8 rating-box">
                    <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                </div>
                <div class="col-md-4 venue-action"> <a href="#googleMap" class="btn btn-primary">VIEW MAP</a> <a href="#inquiry" class="btn btn-default">Book Venue</a> </div>
            </div>
        </div>
        <div class="main-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 page-description">
                        <div class="venue-details">
                            <h2>Venue Details</h2>

                            <?php
                            $data = mysqli_fetch_array($vq);

                            echo "<br><h3>{$data['vendor_name']}</h3>";

                            echo "<br><h3>{$data['vendor_details']}</h3>";

                            echo "<br><img style='width:70;' style='height:80;' src='{$data['vendor_photo']}'></img>";
                            echo "<br>Rs.{$data['vendor_price']}";
                            echo "<br><h3>Mo.{$data['vendor_mobileno']}</h3>";
                            echo "<br><h3>Contact us : {$data['vendor_email']}</h3>";

                            echo "<br>";
                            echo "<a href='vendor-listing.php'>Book Now</a>";
                            ?>

                            <h2>Why Our Wedding Venue </h2>
                            <ul class="check-circle">
                                <li>Wedding parties have exclusive use of the venue for the day</li>
                                <li>Last Minute Offer £3,800 inc VAT for any wedding booked in the next 8 weeks.</li>
                                <li>Licensed for civil ceremonies, civil partnerships and outside ceremonies with stunning views.</li>
                                <li>This venue is a superb location for a Wedding Reception catering from 30 to 650 guests.</li>
                            </ul>
                        </div>
                        <!-- comments -->
                        <div class="customer-review">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1>Couples Review</h1>
                                    <div class="review-list">
                                        <!-- First Comment -->
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2 hidden-xs">
                                                <div class="user-pic"> <img class="img-responsive img-circle" src="images/userpic.jpg" alt=""> </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10">
                                                <div class="panel panel-default arrow left">
                                                    <div class="panel-body">
                                                        <div class="text-left">
                                                            <h3>The whole experience was Excellent</h3>
                                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                                        </div>
                                                        <div class="review-post">
                                                            <p> From initially being shown round through booking to breakfast the next morning. Nam eu enim mollis urna egestas interdum eget quis nisl. Ut sem velit, scelerisque nec commodo consequat, imperdiet non diam. </p>
                                                        </div>
                                                        <div class="review-user">By <a href="#">Jaisy and Kartin</a>, on <span class="review-date"></span>04 Apr 2015</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Second Comment -->
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2 hidden-xs">
                                                <div class="user-pic"> <img class="img-responsive img-circle" src="images/userpic.jpg" alt=""> </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10">
                                                <div class="panel panel-default arrow left">
                                                    <div class="panel-body">
                                                        <div class="text-left">
                                                            <h3>The Facilities were Fantastic!</h3>
                                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                                        </div>
                                                        <div class="review-post">
                                                            <p> Curabitur mattis congue consectetur. Nulla facilisis dictum velit, ultrices imperdiet diam luctus quis. Vestibulum in volutpat purus, quis accumsan diam. The pastry heart on the pie was such a lovely touch that you could easily not have done. </p>
                                                        </div>
                                                        <div class="review-user">By <a href="#">Jaisy and Kartin</a>, on <span class="review-date"></span>04 Apr 2015</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Third Comment -->
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2 hidden-xs">
                                                <div class="user-pic"> <img class="img-responsive img-circle" src="images/userpic.jpg" alt=""> </div>
                                            </div>
                                            <div class="col-md-10 col-sm-10">
                                                <div class="panel panel-default arrow left">
                                                    <div class="panel-body">
                                                        <div class="text-left">
                                                            <h3> Aenean elementum dictum estsit amet ullamcorper</h3>
                                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                                        </div>
                                                        <div class="review-post">
                                                            <p> Vivamus condimentum orci non tellus tincidunt volutpat. Suspendisse gravida gravida arcu a pellentesque. Duis aliquet ut justo et accumsan. </p>
                                                        </div>
                                                        <div class="review-user">By <a href="#">Jaisy and Kartin</a>, on <span class="review-date"></span>04 Apr 2015</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review">
                                        <a class="btn btn-primary btn-block btn-lg" role="button" data-toggle="collapse" href="#review" aria-expanded="false" aria-controls="review"> Write A Review </a> </div>
                                    <div class="collapse review-list review-form" id="review">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <h1>Write Your Review</h1>
                                                <form method="post">
                                                    <div class="rating-group">
                                                        <div class="radio radio-success radio-inline">
                                                            <input type="radio" name="radio1" id="radio1" value="option2">
                                                            <label for="radio1" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i></span> </label>
                                                        </div>
                                                        <div class="radio radio-success radio-inline">
                                                            <input type="radio" name="radio1" id="radio2" value="option3">
                                                            <label for="radio2" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i></span> </label>
                                                        </div>
                                                        <div class="radio radio-success radio-inline">
                                                            <input type="radio" name="radio1" id="radio3" value="option3">
                                                            <label for="radio3" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> </label>
                                                        </div>
                                                        <div class="radio radio-success radio-inline">
                                                            <input type="radio" name="radio1" id="radio4" value="option4">
                                                            <label for="radio4" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> </label>
                                                        </div>
                                                        <div class="radio radio-success radio-inline">
                                                            <input type="radio" name="radio1" id="radio5" value="option5">
                                                            <label for="radio5" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> </label>
                                                        </div>
                                                    </div>
                                                    <!-- Text input-->
                                                    <div class="form-group">
                                                        <label class="control-label" for="name">Name</label>
                                                        <div class="">
                                                            <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" required>
                                                        </div>
                                                    </div>
                                                    <!-- Text input-->
                                                    <div class="form-group">
                                                        <label class="control-label" for="email">E-Mail</label>
                                                        <div class=" ">
                                                            <input id="email" name="email" type="text" placeholder="E-Mail" class="form-control input-md" required>
                                                        </div>
                                                    </div>
                                                    <!-- Text input-->
                                                    <div class="form-group">
                                                        <label class=" control-label" for="reviewtitle">Review Title</label>
                                                        <div class=" ">
                                                            <input id="reviewtitle" name="reviewtitle" type="text" placeholder="Review Title" class="form-control input-md" required>
                                                        </div>
                                                    </div>
                                                    <!-- Textarea -->
                                                    <div class="form-group">
                                                        <label class=" control-label">Write Review</label>
                                                        <div class="">
                                                            <textarea class="form-control" rows="8">Write Review</textarea>
                                                        </div>
                                                    </div>
                                                    <!-- Button -->
                                                    <div class="form-group">
                                                        <button name="submit" class="btn btn-primary btn-lg">Submit Review</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.comments -->
                    </div>
                    <div class="col-md-4 page-sidebar">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="venue-info">
                                    <!-- venue-info-->
                                    <div class="capacity">
                                        <div>Capacity:</div>
                                        <span class="cap-people"> 50 - 300 </span> </div>
                                    <div class="pricebox">
                                        <div>Avg price:</div>
                                        <span class="price">$39.50</span></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="well-box" id="inquiry">
                                    <h2>Send Enquiry to Vendor</h2>
                                    <p>Fill in your details and a Venue Specialist will get back to you shortly.</p>
                                    <form method="post" id="myform">
                                        <div class="form-group">
                                            <label for="inputText3" class="control-label">Booking-date</label>
                                            <input id="inputText3" type="date" class="form-control" name="txt1" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputText3" class="control-label">User-name</label>
                                            <?php
                                            $selectcatrow = mysqli_query($connection, "select * from tbl_user") or die(mysqli_error($connection));

                                            echo"<select name='txt2' class='form-control'>";
                                            echo "<option hidden>Select user name</option>";
                                            while ($selectcatrowfetch = mysqli_fetch_array($selectcatrow)) {

                                                echo "<option value='{$selectcatrowfetch['user_id']}'>{$selectcatrowfetch['user_name']}</option>";
                                            }
                                            echo"</select>";
                                            ?> 
                                        </div>
                                        <div class="form-group">
                                            <label for="inputText3" class="control-label">Vendor-name</label>
                                            <?php
                                            $selectcatrow = mysqli_query($connection, "select * from tbl_vendormaster") or die(mysqli_error($connection));

                                            echo"<select name='txt3' class='form-control'>";
                                            echo "<option hidden>Select vendor name</option>";
                                            while ($selectcatrowfetch = mysqli_fetch_array($selectcatrow)) {

                                                echo "<option value='{$selectcatrowfetch['vendor_id']}'>{$selectcatrowfetch['vendor_name']}</option>";
                                            }
                                            echo"</select>";
                                            ?> 
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="control-label">Booking Price</label>
                                            <input id="inputPassword" type="text" name="txt4" placeholder="Enter Price" class="form-control" required>
                                        </div>



                                        <div class="form-group">
                                            <label for="inputText3" class="control-label">Booking-status</label>
                                            <input id="inputText3" type="text" class="form-control" name="txt5" placeholder="Enter booking status" required>
                                        </div>


                                        <div class="form-group"> 
                                            <button name="submit" class="btn btn-default btn-lg btn-block">Book MY Venue now</button>
                                            <button name="submit" class="btn btn-default btn-lg btn-block"onclick="window.location = 'dashboard-my-listing.php'">View</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="profile-sidebar well-box">
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic"> <img src="images/profile_user.jpg" class="img-responsive img-circle" alt=""> </div>
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name">
                                            <h2>John Wilburn</h2>
                                        </div>
                                        <div class="profile-address"> <i class="fa fa-map-marker"></i> Studio spaces,110 Pennington, London, E1W 2BB </div>
                                        <div class="profile-website"> <i class="fa fa-link"></i> <a href="#">http://www.myvenue.com</a> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 ">
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
            </div>
        </div>
        <div id="googleMap" class="map"></div>
        <div class="section-space60">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb30">
                        <h1>Recommend Venues for your Date</h1>
                    </div>
                    <div class="col-md-4 vendor-box">
                        <!-- venue box start-->
                        <div class="vendor-image">
                            <!-- venue pic -->
                            <a href="#"><img src="images/vendor-1.jpg" alt="wedding venue" class="img-responsive"></a>
                        </div>
                        <!-- /.venue pic -->
                        <div class="vendor-detail">
                            <!-- venue details -->
                            <div class="caption">
                                <!-- caption -->
                                <h2><a href="#" class="title">Venue Vendor Title</a></h2>
                                <p class="location"><i class="fa fa-map-marker"></i> Street Address, Name of Town, 12345, Country.</p>
                                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(22)</span> </div>
                            </div>
                            <!-- /.caption -->
                            <div class="vendor-price">
                                <div class="price">$390 - $600</div>
                            </div>
                        </div>
                        <!-- venue details -->
                    </div>
                    <div class="col-md-4 vendor-box">
                        <!-- venue box start-->
                        <div class="vendor-image">
                            <!-- venue pic -->
                            <a href="#"><img src="images/vendor-2.jpg" alt="wedding venue" class="img-responsive"></a>
                        </div>
                        <!-- /.venue pic -->
                        <div class="vendor-detail">
                            <!-- venue details -->
                            <div class="caption">
                                <!-- caption -->
                                <h2><a href="#" class="title">Venue Vendor Title</a></h2>
                                <p class="location"><i class="fa fa-map-marker"></i> Street Address, Name of Town, 12345, Country.</p>
                                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(22)</span> </div>
                            </div>
                            <!-- /.caption -->
                            <div class="vendor-price">
                                <div class="price">$390 - $600</div>
                            </div>
                        </div>
                        <!-- venue details -->
                    </div>
                    <div class="col-md-4 vendor-box">
                        <!-- venue box start-->
                        <div class="vendor-image">
                            <!-- venue pic -->
                            <a href="#"><img src="images/vendor-3.jpg" alt="wedding venue" class="img-responsive"></a>
                        </div>
                        <!-- /.venue pic -->
                        <div class="vendor-detail">
                            <!-- venue details -->
                            <div class="caption">
                                <!-- caption -->
                                <h2><a href="#" class="title">Venue Vendor Title</a></h2>
                                <p class="location"><i class="fa fa-map-marker"></i> Street Address, Name of Town, 12345, Country.</p>
                                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(22)</span> </div>
                            </div>
                            <!-- /.caption -->
                            <div class="vendor-price">
                                <div class="price">$390 - $600</div>
                            </div>
                        </div>
                        <!-- venue details -->
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
        <script type="text/javascript" src="js/slider.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/header-sticky.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script>
            var myCenter = new google.maps.LatLng(23.0203458, 72.5797426);

            function initialize() {
                var mapProp = {
                    center: myCenter,
                    zoom: 9,
                    scrollwheel: false,
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
