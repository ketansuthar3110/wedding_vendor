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
                        <h1>Venue Listing Bubba Style</h1>
                        <p>Venue Listing Bubba Style for multiple use.</p>
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
                        <li class="active">Venue Listing Bubba Style</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="container">
            <?php
            $sq = mysqli_query($connection, "select * from tbl_vendormaster") or die(mysqli_error($connection));
            while($data = mysqli_fetch_array($sq))
            {
           echo"<div class='row'>";
                
           echo"<div class='col-md-4 vendor-box'>";
                    echo"<div class='grid'>";
                       echo" <figure class='effect-bubba'> <img src='images/vendor-1.jpg' alt='wedding venue' class='img-responsive'>";
                           echo" <figcaption>";
                                echo"<h2>{$data['vendor_name']}</h2>";
                              
                               echo" <p class='rating'> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star-o'></i> </p>";
                          echo"  </figcaption>";
                       echo" </figure>";
                    echo"</div>";
            echo" </div>";
            
            }
            ?>    
                <!-- ... -->
            </div>
            <div class="row">
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
   
        <!-- Footer -->
        <?php
                include './theme/footer.php';
        ?>
    <!-- /.Footer -->
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Flex Nav Script -->
    <script src="js/jquery.flexnav.js" type="text/javascript"></script>
    <script src="js/navigation.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/header-sticky.js"></script>
</body>

</html>
