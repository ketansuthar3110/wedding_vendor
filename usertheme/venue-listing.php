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
                        <div class="icon-circle">
                            <i class="icon icon-size-60 icon-wedding-arch icon-white"></i>
                        </div>
                        <h1>Wedding Venue Listing</h1>
                        <p>Find the perfect wedding vendor for your wedding. Search wedding reception vendor reviews and vendors in your area.</p>
                        <span class="label label-default">12 Venue Vendor</span>
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
                        <li class="active">Wedding Venue Listings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="filter-sidebar">
                        <div class="col-md-12 form-title">
                            <h2>Refine Your Search</h2>
                        </div>
                        <form>
                            <div class="col-md-12 form-group">
                                <label class="control-label" for="venuetype">Venue Type</label>
                                <select id="venuetype" name="venuetype" class="form-control">
                                    <option value="">Select Venue</option>
                                    <option value="Barn">Barn</option>
                                    <option value="Boutique">Boutique</option>
                                    <option value="Castle">Castle</option>
                                    <option value="Country House">Country House</option>
                                    <option value="Exclusive use">Exclusive use</option>
                                    <option value="Garden weddings">Garden weddings</option>
                                    <option value="Gay friendly">Gay friendly</option>
                                    <option value="Gothic">Gothic</option>
                                    <option value="Hotel">Hotel</option>
                                    <option value="Intimate">Intimate</option>
                                    <option value="Manor House">Manor House</option>
                                    <option value="Marquee">Marquee</option>
                                    <option value="Minimalist">Minimalist</option>
                                    <option value="Modern">Modern</option>
                                    <option value="Outside Weddings">Outside Weddings</option>
                                    <option value="Palace">Palace</option>
                                    <option value="Private School">Private School</option>
                                    <option value="Romantic">Romantic</option>
                                    <option value="Small">Small</option>
                                    <option value="Waterside">Waterside</option>
                                    <option value="Weekend">Weekend</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="control-label" for="capacity">Capacity</label>
                                <select id="capacity" name="capacity" class="form-control">
                                    <option value="">Select Capacity</option>
                                    <option value="0 - 99">0 - 99</option>
                                    <option value="100 - 199">100 - 199</option>
                                    <option value="200 - 299">200 - 299</option>
                                    <option value="300 - 399">300 - 399</option>
                                    <option value="400+">60 - 500</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="price-range default-range">
                                    <label for="amount" class="control-label">Price range:</label>
                                    <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                    <div id="slider-range"></div>
                                </div>
                            </div>
                            <div class="col-md-12 form-group rating">
                                <label class="control-label">Select Rating </label>
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" name="checkbox" id="checkbox-0" value="1" class="styled">
                                    <label for="checkbox-0" class="control-label"> <i class="fa fa-star"></i> </label>
                                </div>
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" name="checkbox" id="checkbox-1" value="2" class="styled">
                                    <label for="checkbox-1" class="control-label"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </label>
                                </div>
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" name="checkbox" id="checkbox-2" value="3" class="styled">
                                    <label for="checkbox-2" class="control-label"> <i class="fa fa-star"></i> <i class="fa fa-star"></i><i class="fa fa-star"></i> </label>
                                </div>
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" name="checkbox" id="checkbox-3" value="4" class="styled">
                                    <label for="checkbox-3" class="control-label"> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </label>
                                </div>
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" name="checkbox" id="checkbox-4" value="5" class="styled">
                                    <label for="checkbox-4" class="control-label"> <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="control-label">Amenities</label>
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" name="checkbox" id="weddinghall" value="Wedding Hall" class="styled">
                                    <label for="weddinghall" class="control-label"> Wedding Hall </label>
                                </div>
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" name="checkbox" id="dining" value="Dining" class="styled">
                                    <label for="dining" class="control-label"> Dining </label>
                                </div>
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" name="checkbox" id="insurance" value="Liability Insurance" class="styled">
                                    <label for="insurance" class="control-label"> Liability Insurance </label>
                                </div>
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" name="checkbox" id="catering" value="In House Catering" class="styled">
                                    <label for="catering" class="control-label"> In House Catering </label>
                                </div>
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" name="checkbox" id="djfacilities" value="5" class="styled">
                                    <label for="djfacilities" class="control-label"> DJ Facilities </label>
                                </div>
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" name="checkbox" id="dancefloor" value="Dance Foor" class="styled">
                                    <label for="dancefloor" class="control-label"> Dance Foor </label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" class="btn btn-primary btn-block">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4 vendor-box">
                            <!-- venue box start-->
                            <div class="vendor-image">
                                <!-- venue pic -->
                                <a href="#"><img src="images/vendor-6.jpg" alt="wedding venue" class="img-responsive"></a>
                                <div class="favourite-bg"><a href="#" class=""><i class="fa fa-heart"></i></a></div>
                            </div>
                            <!-- /.venue pic -->
                            <div class="vendor-detail">
                                <!-- venue details -->
                                <div class="caption">
                                    <!-- caption -->
                                    <h2><a href="#" class="title">Venue Vendor Title</a></h2>
                                    <p class="location"><i class="fa fa-map-marker"></i> Street Address, Name of Town, 12345, Country.</p>
                                    <div class="rating "> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <span class="rating-count">(22)</span> </div>
                                </div>
                                <!-- /.caption -->
                                <div class="vendor-price">
                                    <div class="price">$390 - $600</div>
                                </div>
                            </div>
                            <!-- venue details -->
                        </div>
                        <!-- /.venue box start-->
                        
                        <div class="col-md-12 tp-pagination">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous"> <span aria-hidden="true">Previous</span> </a>
                                </li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next"> <span aria-hidden="true">NEXT</span> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <!-- Footer -->
        <?php
            include './theme/footer.php';
        ?>
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
    <!-- Flex Nav Script -->
    <script src="js/jquery.flexnav.js" type="text/javascript"></script>
    <script src="js/navigation.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/header-sticky.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script type="text/javascript" src="js/price-slider.js"></script>
</body>

</html>
