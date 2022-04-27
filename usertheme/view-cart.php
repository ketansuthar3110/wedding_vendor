<?php
require './class/connection.php';


session_start();
if ($_POST) {
    $name = $_POST['txt1'];
    $mo = $_POST['txt2'];
    $add = $_POST['txt3'];
    $sid = $_SESSION['adminid'];
    $cdate = date('d-m-y');

    $oq = mysqli_query($connection, "insert into tbl_order(order_date,user_id,order_status,shipingname,shipingmobile,shipingadd)values('{$cdate}','{$sid}','pending','{$name}','{$mo}','{$add}')") or die(mysqli_error($connection));

    $orderid = mysqli_insert_id($connection);

    foreach ($_SESSION['vcart'] as $key => $value)
    {
        $pq = mysqli_query($connection, "select * from tbl_product where p_id = '{$value}' ") or die(mysqli_error($connection));
        $pd = mysqli_fetch_array($pq);
        
          $orderdeq=mysqli_query($connection, "insert into order_details(order_id,p_id,p_price)values('{$orderid}','{$value}','{$pd['p_price']}')") or die(mysqli_error($connection));
    
          
          }
          unset($_SESSION['vcart']);
          
          unset($_SESSION['counter']);
          
          echo "<script>alert('thnaks for oder...')</script>";
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
       
        <div class="main-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard-page-head">
                            <div class="page-header">
                                <h1>Wishlist</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-15 my-listing-dashboard">

                        
                           
                           <?php
                                        require './class/connection.php';
                                        
                                        $i=1;
                                        if(isset($_GET['id']))
                                        {
                                            $id = $_GET['id'];
                                            unset($_SESSION['vcart'][$id]);

                                        }
                                        if(isset($_SESSION['vcart']) && !empty(($_SESSION['vcart'])))
                                        {

                                            echo "<table class='table table-striped'>";
                                            echo" <thead>";
                              echo "  <tr>";
                                   echo" <th scope='col'>#</th>";
                                    
                                    
                                    echo"<th scope='col'>Vendor_name</th>";
                                   echo" <th scope='col'>Price</th>";
                                   echo" <th scope='col'>Vendor_pic</th>";
                                   echo" <th scope='col'>Action</th>";

                                echo"</tr>";
                            echo"</thead>";
                                        $total=0;
                                        foreach ($_SESSION['vcart'] as $key => $value)
                                        {
                                            $pq = mysqli_query($connection, "select * from tbl_vendormaster where vendor_id = '{$value}' ") or die (mysqli_error($connection));
                                            $pd = mysqli_fetch_array($pq);
                                            echo "<tr>";
                                            echo "<td>$i</td>";
                                             echo "<td>{$pd['vendor_name']}</td>";
                                             echo "<td>{$pd['vendor_price']}</td>";
                                                  echo "<td><img src='../upload{$pd['vendor_photo']}' style='width:50px;'></td>";
                                              echo "<td><a href='?id=$key'>Remove</a></td>";
                                            echo "</tr>";
                                            $i++;
                                            $total= $pd['vendor_price']+$total;
                                        }
                                       
                                        }
                                        else
                                        {
                                            echo "cart is empty";
                                            echo "<a href='vendor-listing-sidebar.php'>Book more</a>";

                                        }
                                        if(isset($_SESSION['userid'] ))
                                        {
                                            echo "<tr style='background-color:lightblue;'><td colspan=2 style='padding-left: 10px;'><b>Subtotal :</b> </td><td><b>Rs.$total</b></td>";
                                            echo "<td colspan=2><a href='payment.php'><button name='submit' class='btn btn-default btn-lg btn-block'>Checkout</button></a></td></tr>";
                                            
                                             echo "</table>";
                                        }
                                        
                                        else
                                        {
                                            echo "<a href='login.php' >please login to order</a>";
                                        }

                                                                               

                                        ?>

                            
                      

                                        <label class="control-label" for="user">Book More Vendor ?<a href="vendor-listing-sidebar.php"><b>Click here</b></a></label>




                        <!-- listing row -->
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
