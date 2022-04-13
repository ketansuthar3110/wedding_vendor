<?php
require './class/connection.php';
$msg = "";
if ($_POST) {

   $name = $_POST['txt1'];
   $gender = $_POST['txt2'];
   $email= $_POST['txt3'];
   $mobile = $_POST['txt4'];
   $pass = $_POST['txt5'];
   $areaid = $_POST['txt6'];
   $address = $_POST['txt7'];
   
    $i = mysqli_query($connection,"insert into tbl_user(user_name,user_gender,user_email,user_mobile,user_password,area_id,user_address)values('{$name}','{$gender}','{$email}','{$mobile}','{$pass}','{$areaid}','{$address}')") or die (mysqli_error($connection));

    if ($i) {
          $msg="<p>Account Created Now login as a user...<a href='login-page.php'><b>Log In</b></a></p>";

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
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <!-- jquery ui CSS -->
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
    <div class="collapse" id="searcharea">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
    <button class="btn tp-btn-primary" type="button">Search</button>
    </span> </div>
    </div>
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 top-message">
                    <p>Welcome to Wedding Vendor.</p>
                </div>
                <div class="col-md-6 top-links">
                    <ul class="listnone">
                        <li><a href="faq.html"> Help </a></li>
                        <li><a href="pricing-plan.html">Pricing</a></li>
                        <li><a href="signup-couple.html" class=" ">I m couple</a></li>
                        <li><a href="signup-vendor.html">Are you vendor?</a></li>
                        <li><a href="login-page.html">Log in</a></li>
                        <li>
                            <a role="button" data-toggle="collapse" href="#searcharea" aria-expanded="false" aria-controls="searcharea"> <i class="fa fa-search"></i> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3 logo">
                    <div class="navbar-brand">
                        <a href="index.html"><img src="images/logo.png" alt="Wedding Vendors" class="img-responsive"></a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="navigation" id="navigation">
                         
                        <ul>
                            <li class="active"><a href="index.html">Home</a>
                                <ul>
                                    <li><a href="index.html" title="Home" class="animsition-link">Home</a></li>
                                    <li><a href="index-2.html" title="Home v.2" class="animsition-link">Home v.2</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Listing</a>
                                <ul>
                                    <li><a href="vendor-listing-row-map.html" title="Home" class="animsition-link">List / Half Map</a></li>
                                    <li><a href="vendor-listing-sidebar.html" title="Home" class="animsition-link">List / Sidebar Left</a></li>
                                    <li><a href="vendor-listing-no-sidebar.html" title="Home" class="animsition-link">List / No Sidebar</a></li>
                                    <li><a href="vendor-listing-top-map.html" title="Home" class="animsition-link">Top Map / List</a></li>
                                    <li><a href="vendor-list-4-colmun.html" title="Home" class="animsition-link">4 Column List</a></li>
                                    <li><a href="vendor-list-3-colmun.html" title="Home" class="animsition-link">3 Column List</a></li>
                                    <li><a href="vendor-list-horizontal.html" title="Home" class="animsition-link">Horizontal List </a></li>
                                    <li><a href="vendor-list-new.html" title="Home" class="animsition-link">List Variations </a></li>
                                    <li><a href="vendor-listing-bubba.html">Bubba Style Listing</a></li>
                                    <li><a href="vendor-listing-ocean.html">Ocean Style Listing</a></li>
                                </ul>
                            </li>
                            <li><a href="vendor-details.html">Vendor</a>
                                <ul>
                                    <li><a href="vendor-details.html">Vendor Simple</a></li>
                                    <li><a href="vendor-details-tabbed.html">Vendor Tabbed</a></li>
                                    <li><a href="vendor-profile.html">Vendor Profile</a></li>
                                </ul>
                            </li>
                            <li><a href="venue-listing.html" title="Home" class="animsition-link">Suppliers</a>
                                <ul>
                                    <li><a href="venue-listing.html">Venue List</a></li>
                                    <li><a href="photography-listing.html">Photographer List</a></li>
                                    <li><a href="dresses-listing.html">Dresses List</a></li>
                                    <li><a href="florist-listing.html">Florist List</a></li>
                                    <li><a href="videography-listing.html">Videography List</a></li>
                                    <li><a href="cake-listing.html">Cake List</a></li>
                                    <li><a href="music-listing.html">Music List</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Planning Tools</a>
                                <ul>
                                    <li><a href="planning-to-do.html">To Do List</a></li>
                                    <li><a href="planning-budget.html">Budget Planner</a></li>
                                    <li><a href="couple-landing-page.html">Couple Signup (LP)</a></li>
                                    <li><a href="couple-dashboard.html">Couple Admin</a></li>
                                    <li><a href="dashboard-vendor.html">Vendor Admin</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Features</a>
                                <ul>
                                    <li><a href="#">Blog</a>
                                        <ul>
                                            <li><a href="blog.html">Blog Listing</a></li>
                                            <li><a href="blog-single.html">Blog Single</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about-us.html">About us</a></li>
                                    <li><a href="contact-us.html">Contact us</a></li>
                                    <li><a href="pricing-plan.html">Pricing Table</a></li>
                                    <li><a href="faq.html">FAQ's</a></li>
                                    <li><a href="404-error.html">404 Error</a></li>
                                    <li><a href="#">Shortcodes</a>
                                        <ul>
                                            <li><a href="shortcode-columns.html">Column</a></li>
                                            <li><a href="shortcode-accordion.html">Accordion</a></li>
                                            <li><a href="shortcode-tabs.html">Tabs</a></li>
                                            <li><a href="shortcode-pagination.html">Paginations</a></li>
                                            <li><a href="shortcode-typography.html">Typography</a></li>
                                            <li><a href="shortcode-accordion.html">Accordion</a></li>
                                            <li><a href="shordcods-alerts.html">Alert</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="wedding-guideline.html">Template Guideline</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Real Weddings</a>
                                <ul>
                                    <li><a href="real-wedding-listing.html">Listing</a></li>
                                    <li><a href="real-wedding-single.html">Real Wedding Single</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tp-page-head">
        <!-- page header -->
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="page-header text-center">
                        <div class="icon-circle">
                            <i class="icon icon-size-60 icon-lock icon-white"></i>
                        </div>
                        <h1>Sign-up User</h1>
                      
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
                        <li class="active">Sign Up User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-6 singup-couple">
                    <?php
                    echo $msg;
                   
                    ?>
                    <div class="well-box">
                        <h2>User registration</h2>
                       <form method="post" id="myform">
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">User name</label>
                                                <input id="inputText3" type="text" class="form-control" name="txt1" placeholder="Enter name" required>
                                            </div>
                                            <div class="form-group">
                                            <label for="inputText3" class="col-form-label">User Gender</label>
                                            <select name="txt2" class="form-control"required>
                                                <option hidden>Select gender</option>
                                                        <option>Male</option>
                                                        <option>Female</option>     
                                                    </select>
                                               </div>
                                             <div class="form-group">
                                                <label for="inputEmail">User Email</label>
                                                <input id="inputEmail" type="email" name="txt3" placeholder="Enter email address" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">User Mobile</label>
                                                <input id="inputText3" type="text" class="form-control" name="txt4" placeholder="Enter mobile number" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">User Password</label>
                                                <input id="inputPassword" type="password" name="txt5" placeholder="Enter password" class="form-control" required>
                                            </div>
                                           
                                            
                                           
                                            <div class="form-group">
                                              <label for="inputText3" class="col-form-label">Area-name</label>
                                               <?php
                                                   $selectarearow = mysqli_query($connection, "select * from tbl_area") or die(mysqli_error($connection));
                                                
                                               echo"<select name='txt6' class='form-control'>";
                                               echo "<option hidden>Select area name</option>";
                                                  while($selectarearowfetch = mysqli_fetch_array($selectarearow))
                                                  {
                                                      
                                                      echo "<option value='{$selectarearowfetch['area_id']}'>{$selectarearowfetch['area_name']}</option>";
                                                  }
                                                   echo"</select>";
                                                      ?> 
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleFormControlTextarea1">User Address</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" name="txt7" placeholder="Enter address" rows="3" required></textarea>
                                            </div>
                           
                                            <div class="form-group"> 
                                            <button type="submit" class="btn btn-primary">Add Record</button> 
                                        </div>
                                        </form>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 feature-block">
                            <div class="well-box">
                                <div class="feature-icon"> <i class="icon-list-2 icon-size-60 icon-default"></i> </div>
                                <div class="feature-content">
                                    <h3>Wedding Checklist</h3>
                                    <p>Nullam porttitor lorem atdiam quis semper diam orci at neque.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 feature-block">
                            <div class="well-box">
                                <div class="feature-icon"><i class="icon-budget icon-size-60 icon-default"></i></div>
                                <div class="feature-content">
                                    <h3>Wedding Budget</h3>
                                    <p>Donec convallis libero et risus maximus cgestas sem venenatis vel.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 feature-block">
                            <div class="well-box">
                                <div class="feature-icon"><i class="icon-wedding-arch icon-size-60 icon-default"></i></div>
                                <div class="feature-content">
                                    <h3>Wedding Vendors</h3>
                                    <p>Aliquam erat volutpat. Quisque ullamcorper quis ipsum eget consequat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 feature-block">
                            <div class="well-box">
                                <div class="feature-icon"><i class="icon-two-hearts icon-size-60 icon-default"></i></div>
                                <div class="feature-content">
                                    <h3>Everything you need</h3>
                                    <p>Fusce dapibus ex ac justo facili libero et risus maximus convallis.</p>
                                </div>
                            </div>
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
    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script src="js/date-script.js"></script>
<script src="jquery.validate.js" type="text/javascript"></script>
     <script>
            $(document).ready(function()
            {
                $("#myform").validate();
            });
              
        </script>
</body>

</html>
