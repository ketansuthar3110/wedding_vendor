<?php

if(!isset($_SESSION['vendorid']))
{
    header("location:login-vendor.php");
}
?>
<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg fixed-top"  style="background-color: #ccffcc">
                <a class="navbar-brand" href="index.html" style="color: #000000">vendor</a>
                
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        
                        <li class="nav-item dropdown notification">
                            
                        </li>
                       
                        <li class="nav-item dropdown nav-user"  style="background-color: #ffcc66;">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" style="color: #000000" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo "Hello  {$_SESSION['vendorname']}"; ?></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                   
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="master.php"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="change-pass-vendor.php"><i class="fas fa-cog mr-2"></i>Change Password</a>
                                <a class="dropdown-item" href="logout-vendor.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>