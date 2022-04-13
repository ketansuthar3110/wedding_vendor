<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "db_wedding";
$connection = mysqli_connect($host, $user , $password, $database);
session_start();

if(!isset($_SESSION['userid']))
{
    header("location:login-page.php");
}
?>
<div class="collapse" id="searcharea">
        <!-- top search -->
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="button">Search</button>
          </span>
        </div>
    </div>
    <!-- /.top search -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 top-message">
                    <p>Hi <?php echo $_SESSION['username']; ?> Welcome to Wedding Vendor</p>
                    
                </div>
                <div class="col-md-6 top-links">
                    <ul class="listnone">
                        <li><a href="faq.php"> Help </a></li>
                        <li><a href="pricing-plan.php">Pricing</a></li>
                        <li><a href="signup-couple.php" class=" ">I m couple</a></li>
                        <li><a href="./vendor-panel/pages/login-vendor.php">Are you vendor?</a></li>
                        
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
                <div class="col-md-3 col-sm-12 logo">
                    <div class="navbar-brand">
                        <a href="index.php"><img src="images/logo.png" alt="Wedding Vendors" class="img-responsive"></a>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="navigation" id="navigation">
                        <ul>
                            <li class="active"><a href="index.php">Home</a>
                              
                            </li> <li class=""><a href="about-us.php">About Us</a>
                              
                            </li>
                            </li> <li class=""><a href="contact-us.php">Contact Us</a>
                              
                            </li>
                            <li><a href="vendor-listing-sidebar.php">Vendor</a>
                                <ul>
                                  
                                    <?php
                                                   $selectcatrow = mysqli_query($connection, "select * from tbl_category") or die(mysqli_error($connection));
                                                   while($data = mysqli_fetch_array($selectcatrow))
                                                   {
                                                   echo "<li><a href='vendor-listing-sidebar.php?cid={$data['category_id']}'>{$data['category_name']}</a></li>";
                                                   }
                                                   ?>
                                </ul>
                            </li>
                            <li><a href="#">Account</a>
                                <ul>
                                    <li><a href="#" title="Home" class="animsition-link">View order</a></li>
                                    <li><a href="login-page.php" title="Home" class="animsition-link">Login</a></li>
                                     <li><a href="change-password-user.php" title="Home" class="animsition-link">Change Password</a></li>
                                      <li><a href="logout.php" title="Home" class="animsition-link">Logout</a></li>
                                </ul>
                            </li>
                            
                            
                        </ul>
                    </div>
                
                </div>
            </div>
        </div>
    </div>