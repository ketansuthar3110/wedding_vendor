<?php
require './class/connection.php';
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
        <!-- Font used in template -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Istok+Web:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
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
                        <div class="profile-pic col-md-2"><img src="images/profile-dashbaord.png" alt=""></div>
                        <div class="profile-info col-md-9">
                            <h1 class="profile-title">Member Name<small>Welcome Back memeber</small></h1>
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
                            <li><a href="dashboard-vendor.php"><i class="fa fa-dashboard db-icon"></i>My Dashboard</a></li>
                            <li><a href="dashboard-profile.php"><i class="fa fa-user db-icon"></i>My Profile</a></li>
                            <li class="active"><a href="dashboard-my-listing.php"><i class="fa fa-list db-icon"></i>My Listing </a></li>
                            <li><a href="dashboard-add-listing.php"><i class="fa fa-plus-square db-icon"></i>Add listing</a></li>
                            <li><a href="dashboard-pricing.php"><i class="fa fa-list-alt db-icon"></i>Pricing Plan</a></li>
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
                            <div class="page-header">
                                <h1>My booking list <small>Find your listing and edit or delete your venue listing.</small></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-15 my-listing-dashboard">
                        
                          <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">User_name</th>
                                                <th scope="col">Vendor_name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Status</th>

                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <?php
                                        if (isset($_GET['did'])) {
                                            $delid = $_GET['did'];
                                            $dq = mysqli_query($connection, "delete from tbl_booking where booking_id = '{$delid}'") or die(mysqli_error($connection));
                                            if ($dq) {
                                                $dmsg = '<div class="alert alert-success" role="alert">
                         Record Deleted
                        </div>';
                                            }
                                        }
                                        $sql = "SELECT
                                                        `tbl_booking`.`booking_id`
                                                        , `tbl_booking`.`booking_date`
                                                        , `tbl_user`.`user_name`
                                                        , `tbl_vendormaster`.`vendor_name`
                                                        , `tbl_booking`.`booking_price`
                                                        , `tbl_booking`.`booking_status`
                                                    FROM
                                                        `tbl_user`
                                                        INNER JOIN `tbl_booking` 
                                                            ON (`tbl_user`.`user_id` = `tbl_booking`.`user_id`)
                                                        INNER JOIN `tbl_vendormaster` 
                                                            ON (`tbl_vendormaster`.`vendor_id` = `tbl_booking`.`vendor_id`)
                                                    ORDER BY `tbl_booking`.`booking_id` ASC;";
                                        
                                        $f =mysqli_query($connection, $sql) or die(mysqli_error($connection));
                                                while ($data = mysqli_fetch_array($f)) {
                                            echo "<tr>";
                                            echo "<td>{$data['booking_id']}</td>";
                                            echo "<td>{$data['booking_date']}</td>";
                                            echo "<td>{$data['user_name']}</td>";
                                            echo "<td>{$data['vendor_name']}</td>";
                                            echo "<td>{$data['booking_price']}</td>";
                                            echo "<td>{$data['booking_status']}</td>";

                                            echo "<td> <a href='dashboard-my-listing.php?did=$data[0]'>Delete</a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </table>
                      

                        
                               
                
                        <!-- listing row -->
                    </div>
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
    </body>

</html>
