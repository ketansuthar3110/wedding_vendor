<?php
require './class/connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Are you local weddding vendor provider & looking for wedding vendor website template. Wedding Vendor Responsive Website Template suitable for wedding vendor supplier, wedding agency, wedding company, wedding events etc.. ">
        <meta name="keywords" content="Wedding Vendor, wedding template, wedding website template, events, wedding party, wedding cake, wedding dress, wedding couple, couple, Wedding Venues Website Template">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Wedding Vendor | Find The Best Wedding Vendors</title>
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Template style.css -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="css/owl.theme.css">
        <link rel="stylesheet" type="text/css" href="css/owl.transitions.css">
        <!-- Font used in template -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700|Roboto:400,400italic,500,500italic,700,700italic,300italic,300' rel='stylesheet' type='text/css'>
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
        <div class="slider-bg">
            <!-- slider start-->
            <div id="slider" class="owl-carousel owl-theme slider">
                <div class="item"><img src="images/hero-image-3.jpg" alt="Wedding couple just married"></div>
                <div class="item"><img src="images/hero-image-2.jpg" alt="Wedding couple just married"></div>
                <div class="item"><img src="images/hero-image.jpg" alt="Wedding couple just married"></div>
            </div>
            <div class="find-section">
                <!-- Find search section-->
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10 finder-block">
                            <div class="finder-caption">
                                <h1>Find your perfect Wedding Vendor</h1>
                                <p>Over <strong>1200+ Wedding Vendor </strong>for you special date &amp; Find the perfect venue &amp; save you date.</p>
                            </div>
                            <div class="finderform">
                                <form method="get"action="vendor-listing-sidebar.php">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <select class="form-control"name="catid">

                                                <?php
                                                $selectcatrow = mysqli_query($connection, "select * from tbl_category") or die(mysqli_error($connection));

                                                echo "<option>Select category name</option>";
                                                while ($selectcatrowfetch = mysqli_fetch_array($selectcatrow)) {

                                                    echo "<option value='{$selectcatrowfetch['category_id']}'>{$selectcatrowfetch['category_name']}</option>";
                                                }
                                                echo"</select>";
                                                ?> 
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <select class="form-control" name="areaid">
                                                <?php
                                                $selectarearow = mysqli_query($connection, "select * from tbl_area") or die(mysqli_error($connection));

                                                echo "<option>Select area name</option>";
                                                while ($selectarearowfetch = mysqli_fetch_array($selectarearow)) {

                                                    echo "<option value='{$selectarearowfetch['area_id']}'>{$selectarearowfetch['area_name']}</option>";
                                                }
                                                ?> 

                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Find Vendors</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.Find search section-->
        </div>
        <!-- slider end-->
        <div class="section-space80 bg-light">
            <!-- Feature Blog Start -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title mb60 text-center">
                            <h1>Your Wedding Planing Start Here</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- feature center -->
                    <div class="col-md-4">
                        <div class="feature-block feature-center">
                            <!-- feature block -->
                            <div class="feature-icon"><img src="images/vendor.svg" alt=""></div>
                            <h2>Find local vendor</h2>
                            <p></p>
                        </div>
                    </div>
                    <!-- /.feature block -->
                    <div class="col-md-4">
                        <div class="feature-block feature-center">
                            <!-- feature block -->
                            <div class="feature-icon"><img src="images/mail.svg" alt=""></div>
                            <h2>Contact vendor</h2>
                            <p></p>
                        </div>
                    </div>
                    <!-- /.feature block -->
                    <div class="col-md-4">
                        <div class="feature-block feature-center">
                            <!-- feature block -->
                            <div class="feature-icon"><img src="images/couple.svg" alt=""></div>
                            <h2>Book Your Vendor</h2>
                            <p></p>
                        </div>
                    </div>
                    <!-- /.feature block -->
                </div>
                <!-- /.feature center -->
            </div>
        </div>
        <!-- Feature Blog End -->
        <div class="section-space80">
            <!-- top location -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title mb60 text-center">
                            <h1>Our Top Category</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
                <?php
                $sq = mysqli_query($connection, "select * from tbl_category LIMIT 3") or die(mysqli_error($connection));
                while ($data = mysqli_fetch_array($sq)) {
                    echo"<div class='row'>";

                    echo"<div class='col-md-4 vendor-box'><a href='vendor-listing-sidebar.php?cid={$data['category_id']}'>";
                    echo"<div class='grid'>";
                    echo" <figure class='effect-bubba'> <img style='width:300px;' src='./upload/category.png' alt='wedding venue' class='img-responsive'>";
                    echo" <figcaption>";
                    echo"<h2 style='color:black;'>{$data['category_name']}</h2>";

                    echo" <p class='rating'> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star-o'></i> </p>";
                    echo"  </figcaption>";
                    echo" </figure>";
                    echo"</a></div>";
                    echo" </div>";
                }
                ?>    
            </div>
        </div>


        <div class="section-space80">
            <!-- Testimonial Section -->
            <div class="container">
                <div class="row">
                    <div class="col-md-18">
                        <div class="section-title mb60 text-center">
                            <h1>Our Best Vendor</h1>
                            <p>Select any vendor and book now</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 tp-testimonial">
                        <div id="testimonial" class="owl-carousel owl-theme">
                            <?php
                            $sq = mysqli_query($connection, "select * from tbl_vendormaster LIMIT 5;") or die(mysqli_error($connection));

                            while ($data = mysqli_fetch_array($sq)) {


                                echo "<div class='item testimonial-block'>";
                                echo "<div class='col-md-12 vendor-box'>";

                                echo"       <div class='vendor-image'>";

                                echo"   <a href='vendor-details-tabbed.php?pid={$data['vendor_id']}'><img src='../upload{$data['vendor_photo']}' alt='wedding venue' class='img-responsive'></img></a>";
                                echo"      <div class='favourite-bg'><a href='#' class=''><i class='fa fa-heart'></i></a></div>";
                                echo"   </div>";

                                echo"  <div class='vendor-detail'>";

                                echo"<div class='caption'>";

                                echo" <h2><a href='# 'class='title'>{$data['vendor_name']}</a></h2>";
                                echo" <p class='location'><i class='fa fa-map-marker'></i> {$data['vendor_details']}</p>";
                                echo"<p class='location'><i class='fa fa-map-marker'></i> Mo.{$data['vendor_mobileno']}</p>";
                                echo"<div class='rating'> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star-o'></i> <span class='rating-count'>(22)</span> </div>";
                                echo"</div>";

                                echo"      <div class='vendor-price'>";
                                echo"          <div class='price'>Rs.{$data['vendor_price']}</div>";
                                echo"     </div>";
                                echo"     </div>";

                                echo" </div>";

                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- /. Testimonial Section -->
<div class="section-space80 bg-light">
    <!-- Call to action -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 couple-block">
                <div class="couple-icon"><img src="images/couple.svg" alt=""></div>
                <h2>Are you couple find the venue ?</h2>
                <p></p>
                <a href="#" class="btn btn-primary">Find Vendor</a> </div>
            <div class="col-md-6 vendor-block">
                <div class="vendor-icon"><img src="images/vendor.svg" alt=""></div>
                <h2>Are you wedding vender ?</h2>
                <p></p>
                <a href="#" class="btn btn-primary">Create Account As Vendor</a></div>
        </div>
    </div>
</div>

<?php
include './theme/footer.php';
?>
<!-- /. Tiny Footer -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<!-- Flex Nav Script -->
<script src="js/jquery.flexnav.js" type="text/javascript"></script>
<script src="js/navigation.js"></script>
<!-- slider -->
<script src="js/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<!-- testimonial -->
<script type="text/javascript" src="js/testimonial.js"></script>
<!-- sticky header -->
<script src="js/jquery.sticky.js"></script>
<script src="js/header-sticky.js"></script>
</body>

</html>
