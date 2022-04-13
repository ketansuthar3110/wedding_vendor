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
    <div class="vendor-page-header">
        <div class="vendor-profile-img"> </div>
        <div class="vendor-profile-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 hidden-xs">
                        <div class="vendor-profile-block">
                            <div class="vendor-profile"> <img src="images/vendor-logo.jpg" alt="" class="img-responsive"> </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="profile-meta mb30">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="vendor-profile-title">Edward Villson</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4"><span class="meta-address"> <i class="fa fa-map-marker"></i> <span class="address"> Studio spaces,110 Pennington, London, E1W 2BB </span> </span>
                                </div>
                                <div class="col-md-4"><span class="meta-email"><i class="fa fa-envelope"></i>Info@weddingvenue.com</span></div>
                                <div class="col-md-4"><span class="meta-call"><i class="fa fa-phone"></i>1800-123-456 / 789</span></div>
                            </div>
                        </div>
                        <div class="profile-meta">
                            <div class="row">
                                <div class="col-md-4"><span class="meta-website"><i class="fa fa-link"></i> http://www.myvenue.com</span></div>
                                <div class="col-md-6">
                                    <div class="vendor-profile-social"> <span>
                  <ul class="listnone">
                    <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                  </ul>
                  </span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" ">
        <div class="container">
            <div class="row">
                <div class="venue-details">
                    <div class="col-md-9">
                        <div class="st-tabs">
                            <!-- Nav tabs -->
                           
                            <!-- Tab panes -->
                            
                            <!-- /.tab content start-->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="">
                            <div class="well-box" id="inquiry">
                                <h2>Send Enquiry to Vendor</h2>
                                <p>Fill in your details and a Venue Specialist will get back to you shortly.</p>
                                <form class="">
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="control-label" for="name-one">Name:<span class="required">*</span></label>
                                        <div class="">
                                            <input id="name-one" name="name" type="text" placeholder="Name" class="form-control input-md" required>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="control-label" for="phone">Phone:<span class="required">*</span></label>
                                        <div class="">
                                            <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control input-md" required>
                                            <span class="help-block"> </span> </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="control-label" for="email-one">E-Mail:<span class="required">*</span></label>
                                        <div class="">
                                            <input id="email-one" name="email" type="text" placeholder="E-Mail" class="form-control input-md" required>
                                        </div>
                                    </div>
                                    <!-- Select Basic -->
                                    <div class="form-group no-padding">
                                        <label class="control-label" for="date">Wedding Date</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="weddingdate" placeholder="Wedding Date">
                                            <span class="input-group-addon" id="basic-addon2"><i class="fa fa-calendar"></i></span> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="guest">Number of Guests:<span class="required">*</span></label>
                                        <div class="">
                                            <select id="guest" name="guest" class="form-control">
                                                <option value="35 to 50">35 to 50</option>
                                                <option value="50 to 65">50 to 65</option>
                                                <option value="65 to 85">65 to 85</option>
                                                <option value="85 to 105">85 to 105</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Multiple Radios -->
                                    <div class="form-group">
                                        <label class="control-label">Send me info via</label>
                                        <div class="checkbox checkbox-success">
                                            <input type="checkbox" name="checkbox" id="checkbox-0" value="1" class="styled">
                                            <label for="checkbox-0" class="control-label"> E-Mail </label>
                                        </div>
                                        <div class="checkbox checkbox-success">
                                            <input type="checkbox" name="checkbox" id="checkbox-1" value="2" class="styled">
                                            <label for="checkbox-1" class="control-label"> Need Call back </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button name="submit" class="btn btn-primary">Book MY Venue now</button>
                                    </div>
                                </form>
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
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script>
    $(function() {
        $("#weddingdate").datepicker();
    });
    </script>
</body>

</html>
