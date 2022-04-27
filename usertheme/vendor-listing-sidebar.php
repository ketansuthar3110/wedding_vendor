<?php
require './class/connection.php';
session_start();
$pid = "";

$cid = "";
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
                            <i class="icon icon-size-60  icon-list icon-white"></i>
                        </div>
                        <h1>Vendor List</h1>
                        <p>Book Your Vendor</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page header -->
    <div class="tp-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Venue List</li>
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
                                <label class="control-label" for="venuetype">Vendor Type</label>
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
                                <label class="control-label" for="price">Price</label>
                                <select id="price" name="price" class="form-control">
                                    <option value=""> Select Price</option>
                                    <option value="$35 - $50">$35 - $50</option>
                                    <option value="$50 - $60">$50 - $60</option>
                                    <option value="$60 - $70">$60 - $70</option>
                                    <option value="$70 - $80">$70 - $80</option>
                                    <option value="$80 - $90">$80 - $90</option>
                                </select>
                            </div>
                            
                           
                            <div class="col-md-12 form-group">
                                <button type="submit" class="btn btn-primary btn-block">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                       
                        <?php
                        if(isset ($_GET['catid']) && isset ($_GET['areaid']))
                            {
                               $catid = $_GET['catid'];
                               $areaid = $_GET['areaid'];
                               
                                $sq = mysqli_query($connection, "select * from tbl_vendormaster where category_id = '{$catid}' and area_id = '{$areaid}' ") or die(mysqli_error($connection));
            
                                                while($data = mysqli_fetch_array($sq))
                                                {



                                                 echo "<div class='col-md-6 vendor-box'>";

                                                         echo"       <div class='vendor-image'>";

                                                                 echo"   <a href='vendor-details-tabbed.php?pid={$data['vendor_id']}'><img src='../upload{$data['vendor_photo']}' alt='wedding venue' class='img-responsive'></img></a>";
                                                              echo"      <div class='favourite-bg'><a href='#' class=''><i class='fa fa-heart'></i></a></div>";
                                                             echo"   </div>";

                                                              echo"  <div class='vendor-detail'>";

                                                                echo"<div class='caption'>";

                                                                            echo" <h2><a href='# 'class='title'>{$data['vendor_name']}</a></h2>";
                                                                            echo" <p class='location'><i class='fa fa-arrow-right'></i> {$data['vendor_details']}</p>";
                                                                            echo"<p class='location'><i class='fa fa-mobile'></i> Mo.{$data['vendor_mobileno']}</p>";
                                                              echo"<div class='rating'> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star-o'></i> <span class='rating-count'>(22)</span> </div>";
                                                              echo"</div>";

                                                              echo"      <div class='vendor-price'>";
                                                              echo"          <div class='price'>Rs.{$data['vendor_price']}</div>";
                                                               echo"     </div>";
                                                           echo"     </div>";

                                                           echo" </div>";


                                                              }
                            }
                      elseif(isset($_GET['cid']))
                        {
                            $cid = $_GET['cid'];                            
                                        $sq = mysqli_query($connection, "select * from tbl_vendormaster where category_id='{$cid}' ") or die(mysqli_error($connection));
            
                                        while($data = mysqli_fetch_array($sq))
                                        {



                                         echo "<div class='col-md-6 vendor-box'>";

                                                 echo"       <div class='vendor-image'>";

                                                         echo"   <a href='vendor-details-tabbed.php?pid={$data['vendor_id']}'><img src='../upload{$data['vendor_photo']}' alt='wedding venue' class='img-responsive'></a>";
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


                                                     }
                        }
                          else
                          {
                                                $sq = mysqli_query($connection, "select * from tbl_vendormaster") or die(mysqli_error($connection));
            
                                                while($data = mysqli_fetch_array($sq))
                                                {



                                                 echo "<div class='col-md-6 vendor-box'>";

                                                         echo"       <div class='vendor-image'>";

                                                                 echo"   <a href='vendor-details-tabbed.php?pid={$data['vendor_id']}'><img src='../upload{$data['vendor_photo']}' alt='wedding venue' class='img-responsive'></a>";
                                                              echo"      <div class='favourite-bg'><a href='#' class=''><i class='fa fa-heart'></i></a></div>";
                                                             echo"   </div>";

                                                              echo"  <div class='vendor-detail'>";

                                                                echo"<div class='caption'>";

                                                                            echo" <h2><a href='# 'class='title'>{$data['vendor_name']}</a></h2>";
                                                                            echo" <p class='location'><i class='fa fa-arrow-right'></i> {$data['vendor_details']}</p>";
                                                                            echo"<p class='location'><i class='fa fa-mobile'></i> Mo.{$data['vendor_mobileno']}</p>";
                                                              echo"<div class='rating'> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star-o'></i> <span class='rating-count'>(22)</span> </div>";
                                                              echo"</div>";

                                                              echo"      <div class='vendor-price'>";
                                                              echo"          <div class='price'>Rs.{$data['vendor_price']}</div>";
                                                               echo"     </div>";
                                                           echo"     </div>";

                                                           echo" </div>";


                                                              }
                        }
            ?>    
                        <!-- /.venue box start-->
                        
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
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script type="text/javascript" src="js/price-slider.js"></script>
</body>

</html>
