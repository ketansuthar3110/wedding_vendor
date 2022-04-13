<?php
require './class/connection.php';


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
                                                  while($selectcatrowfetch = mysqli_fetch_array($selectcatrow))
                                                  {
                                                      
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
                                                  while($selectarearowfetch = mysqli_fetch_array($selectarearow))
                                                  {
                                                      
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
    <div class="section-space80">
        <!-- Feature Blog Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title mb60 text-center">
                        <h1>Your Wedding Planing Start Here</h1>
                        <p>Various versions have evolved over the years sometimes by accident sometimes on purpose.</p>
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
                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p>
                    </div>
                </div>
                <!-- /.feature block -->
                <div class="col-md-4">
                    <div class="feature-block feature-center">
                        <!-- feature block -->
                        <div class="feature-icon"><img src="images/mail.svg" alt=""></div>
                        <h2>Contact vendor</h2>
                        <p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                    </div>
                </div>
                <!-- /.feature block -->
                <div class="col-md-4">
                    <div class="feature-block feature-center">
                        <!-- feature block -->
                        <div class="feature-icon"><img src="images/couple.svg" alt=""></div>
                        <h2>Save Your Date</h2>
                        <p>The generated Lorem Ipsum is therefore always free from repetition injected humour or non-characteristic words etc.</p>
                    </div>
                </div>
                <!-- /.feature block -->
            </div>
            <!-- /.feature center -->
        </div>
    </div>
    <!-- Feature Blog End -->
    <div class="section-space80 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title mb60 text-center">
                        <h1>Featured Wedding Vendor</h1>
                        <p>Many desktop publishing packages and web page editors now use orem psum as their default model text.</p>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-4">
                    <!-- vendor box start-->
                    <div class="vendor-box">
                        <div class="vendor-image">
                            <!-- vendor pic -->
                            <a href="#"><img src="images/vendor-1.jpg" alt="wedding vendor" class="img-responsive"></a>
                            <div class="feature-label"></div>
                            <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                        </div>
                        <!-- /.vendor pic -->
                        <div class="vendor-detail">
                            <!-- vendor details -->
                            <div class="caption">
                                <!-- caption -->
                                <h2><a href="#" class="title">Venue Vendor Title</a></h2>
                                <p class="location"><i class="fa fa-map-marker"></i> Street Address, Name of Town, 12345, Country.</p>
                                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(2)</span> </div>
                            </div>
                            <!-- /.caption -->
                            <div class="vendor-price">
                                <div class="price">$190 - $600</div>
                            </div>
                        </div>
                        <!-- vendor details -->
                    </div>
                </div>
                <!-- /.vendor box start-->
                <div class="col-md-4">
                    <!-- vendor box start-->
                    <div class="vendor-box">
                        <div class="vendor-image">
                            <!-- vendor pic -->
                            <a href="#"><img src="images/vendor-4.jpg" alt="wedding vendor" class="img-responsive"></a>
                            <div class="rated-label"></div>
                            <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                        </div>
                        <!-- /.vendor pic -->
                        <div class="vendor-detail">
                            <!-- vendor details -->
                            <div class="caption">
                                <!-- caption -->
                                <h2><a href="#" class="title"> Wedding Dress Vendor Title</a></h2>
                                <p class="location"><i class="fa fa-map-marker"></i> Street Address, Name of Town, 12345, Country.</p>
                                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(3)</span> </div>
                            </div>
                            <!-- /.caption -->
                            <div class="vendor-price">
                                <div class="price">$290 - $600</div>
                            </div>
                        </div>
                    </div>
                    <!-- vendor details -->
                </div>
                <!-- /.vendor box start-->
                <div class="col-md-4 vendor-box">
                    <!-- vendor box start-->
                    <div class="vendor-image">
                        <!-- vendor pic -->
                        <a href="#"><img src="images/vendor-3.jpg" alt="wedding vendor" class="img-responsive"></a>
                        <div class="popular-label"></div>
                        <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                    </div>
                    <!-- /.vendor pic -->
                    <div class="vendor-detail">
                        <!-- vendor details -->
                        <div class="caption">
                            <!-- caption -->
                            <h2><a href="#" class="title">Vendor Photographer Title</a></h2>
                            <p class="location"><i class="fa fa-map-marker"></i> Street Address, Name of Town, 12345, Country.</p>
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(5)</span> </div>
                        </div>
                        <!-- /.caption -->
                        <div class="vendor-price">
                            <div class="price">$390 - $600</div>
                        </div>
                    </div>
                    <!-- vendor details -->
                </div>
            </div>
        </div>
    </div>
    <div class="section-space80">
        <!-- top location -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title mb60 text-center">
                        <h1>Top Wedding Locations</h1>
                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 location-block">
                    <!-- location block -->
                    <div class="vendor-image">
                        <a href="#"><img src="images/location-pic.jpg" alt="" class="img-responsive"></a> <a href="#" class="venue-lable"><span class="label label-default">New York City</span></a> </div>
                </div>
                <!-- /.location block -->
                <div class="col-md-4 location-block">
                    <!-- location block -->
                    <div class="vendor-image">
                        <a href="#"><img src="images/location-pic-2.jpg" alt="" class="img-responsive"></a> <a href="#" class="venue-lable"><span class="label label-default">Sydney</span></a> </div>
                </div>
                <!-- /.location block -->
                <div class="col-md-4 location-block">
                    <!-- location block -->
                    <div class="vendor-image">
                        <a href="#"><img src="images/location-pic-3.jpg" alt="" class="img-responsive"></a> <a href="#" class="venue-lable"><span class="label label-default">Russia</span></a> </div>
                </div>
                <!-- /.location block -->
                <div class="col-md-8 location-block">
                    <!-- location block -->
                    <div class="vendor-image">
                        <a href="#"><img src="images/location-pic-4.jpg" alt="" class="img-responsive"></a> <a href="#" class="venue-lable"><span class="label label-default">Germany</span></a> </div>
                </div>
                <!-- /.location block -->
                <div class="col-md-4 location-block">
                    <!-- location block -->
                    <div class="vendor-image">
                        <a href="#"><img src="images/location-pic-5.jpg" alt="" class="img-responsive"></a> <a href="#" class="venue-lable"><span class="label label-default">Paris</span></a> </div>
                </div>
                <!-- /.location block -->
            </div>
        </div>
    </div>
    <!-- /.top location -->
    <div class="section-space80 bg-light">
        <!-- Testimonial Section -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title mb60 text-center">
                        <h1>Just Get Married Happy Couple</h1>
                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 tp-testimonial">
                    <div id="testimonial" class="owl-carousel owl-theme">
                        <div class="item testimonial-block">
                            <div class="couple-pic"><img src="images/couple.jpg" alt="" class="img-circle"></div>
                            <div class="feedback-caption">
                                <p>"Had our wedding on 15th may 2015 and have to say Jenny and the team made it a wonderful and enjoyable day were Notting was a problem from the build up to the day."</p>
                            </div>
                            <div class="couple-info">
                                <div class="name">Dave Macwan</div>
                                <div class="date">Thu, 21st June, 2015</div>
                            </div>
                        </div>
                        <div class="item testimonial-block">
                            <div class="couple-pic"><img src="images/couple-2.jpg" alt="" class="img-circle"></div>
                            <div class="feedback-caption">
                                <p>"Vestibulum vitae neque urna. Duis ut mauris mi. Sed vehicula vestibulum finias their default model text and a search for lorem ipsum will uncover manym elit posuerenia eget sem."</p>
                            </div>
                            <div class="couple-info">
                                <div class="name">Marry &amp; Leary</div>
                                <div class="date">Thu, 13th July, 2015</div>
                            </div>
                        </div>
                        <div class="item testimonial-block">
                            <div class="couple-pic"><img src="images/couple-3.jpg" alt="" class="img-circle"></div>
                            <div class="feedback-caption">
                                <p>"Had our wedding on 15th Oct 2015 and have to say Jenny and the team made it a wonderful and enjoyable day were Notting was a problem from the build up to the day."</p>
                            </div>
                            <div class="couple-info">
                                <div class="name">Jhon Doe &amp; Doe Jassica</div>
                                <div class="date">Thu, 21st Aug, 2015</div>
                            </div>
                        </div>
                        <div class="item testimonial-block">
                            <div class="couple-pic"><img src="images/couple-4.jpg" alt="" class="img-circle"></div>
                            <div class="feedback-caption">
                                <p>"Etiam ut metus nisi. Sed non laoreet nisi tinciin interdum risus felis enjoyable day were Notting was a problem from the build up to the dayvel eleifend milaoreet consectetur."</p>
                            </div>
                            <div class="couple-info">
                                <div class="name">Dave Macwan</div>
                                <div class="date">Thu, 12th Sept, 2015</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /. Testimonial Section -->
    <div class="section-space80">
        <!-- Call to action -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 couple-block">
                    <div class="couple-icon"><img src="images/couple.svg" alt=""></div>
                    <h2>Are you couple find the venue ?</h2>
                    <p>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                    <a href="#" class="btn btn-primary">Find Vendor</a> </div>
                <div class="col-md-6 vendor-block">
                    <div class="vendor-icon"><img src="images/vendor.svg" alt=""></div>
                    <h2>Are you wedding vender ?</h2>
                    <p>Fusce eget elementum quam, vel tempor justo. Ut imperdiet eget sapien dictum aliquam. Nulla maximus sodales dignissim.</p>
                    <a href="#" class="btn btn-primary">Add Your Listing</a></div>
            </div>
        </div>
    </div>
    <!-- /. Call to action -->
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
