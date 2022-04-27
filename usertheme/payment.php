

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> payment gateway for vendor payment</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/sweetalert2/sweetalert2.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/toastr/toastr.min.css">

    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>

<body class="">
    
<div class="wrapper">
        <div class="container mt-5">
            <h2>Payment Gateway</h2>
        </div>
    <center>
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8x">
                            <div class="card">
                               
                                <div class="card-body">
        <table class="table table-striped">
            <th>Booking id</th>
            <th>Date</th>
            <th>Username</th>
            <th>Vendor</th>
            <th>Price</th>
            <?php
            require './class/connection.php';
            session_start();
            if(isset($_GET['pyd']))
            {
                
            
            $sql ="SELECT
    `tbl_booking`.`booking_id`
    , `tbl_booking`.`booking_date`
    , `tbl_user`.`user_name`
    , `tbl_vendormaster`.`vendor_name`
    , `tbl_booking`.`booking_price`
FROM
    `tbl_vendormaster`
    INNER JOIN `tbl_booking` 
        ON (`tbl_vendormaster`.`vendor_id` = `tbl_booking`.`vendor_id`)
    INNER JOIN `tbl_user` 
        ON (`tbl_user`.`user_id` = `tbl_booking`.`user_id`)
WHERE (`tbl_booking`.`booking_id` ='{$_GET['pyd']}');";
            $q = mysqli_query($connection,$sql);
            while ($row = mysqli_fetch_array($q))
            {
               echo "<tr>";
               echo"<td>{$row['booking_id']}</td>";
               echo "<td>{$row['booking_date']}</td>";
               echo "<td>{$row['user_name']}</td>";
               echo "<td>{$row['vendor_name']}</td>";
               echo "<td>{$row['booking_price']}</td>";
               echo "</tr>";
            }
            }
            else
            {
                
            
            foreach ($_SESSION['vcart'] as $key => $value)
                    {
                        $pq = mysqli_query($connection, "select * from tbl_vendormaster where vendor_id = '{$value}' ") or die (mysqli_error($connection));
                        $pd = mysqli_fetch_array($pq);
                        echo "<tr>";
                        echo "<td>{$_SESSION['username']}</td>";
                         echo "<td>{$pd['vendor_name']}</td>";
                         echo "<td>{$pd['vendor_price']}</td>";
                              echo "<td><img src='../upload{$pd['vendor_photo']}' style='width:50px;'></td>";
                         
                        echo "</tr>";
                        
                    }
            }
            ?>
            
        </table>
                                    </div>
                                </div>
        </div>
        </center>
        <div class="container mt-5">
            <div class="row" style="border: 2px solid black;height: 450px;">
                <div class="col-5 col-sm-3">
                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                        aria-orientation="vertical">
                    
                        <a class="nav-link active" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile"
                            role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Bank Transfer</a>
                        <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages"
                            role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Credit / Debit</a>
                    </div>
                </div>
                <div class="col-7 col-sm-9">
                    <form name="myForm" id="myForm" method="post" action="">
                        <div class="tab-content" id="vert-tabs-tabContent">
                         
                            <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel"
                                aria-labelledby="vert-tabs-profile-tab">
                                <table class="table table-borderless">
                                    <input hidden name="payment_method" value="Bank-Transfer" hidden>
                                    <tr>
                                        <td>Bank Name</td>
                                        <td>Bank Holder Name</td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Bank Name" name="name"
                                                onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'');"></td>
                                        <td><input type="text" class="form-control" placeholder="Holder name"
                                                name="holder_Name"
                                                onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'');"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">IFSC Code</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><input type="text" class="form-control"
                                                placeholder="Enter IFSC Code" name="ifsc_code"> </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <button class="btn btn-primary form-control" type="submit" name="payment_now">Payment Now</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel"
                                aria-labelledby="vert-tabs-messages-tab">
                                <table class="table table-borderless" style="width: 500px;">
                                    <input hidden name="payment_method" value="Credit-Debit" hidden>
                                    <tr>
                                        <td colspan="2">Card Owner Name <span class="float-right"><b></b></span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><input type="text" class="form-control"
                                                placeholder="Enter First Name" name="holder_name"
                                                onkeyup="this.value=this.value.replace(/[^a-zA-Z]/g,'');"></td>
                                    </tr>
                                    <tr>
                                        <td>Card Number</td>
                                        <td>CVV </td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="**************"
                                                name="c_number" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');">
                                        </td>
                                        <td><input type="text" class="form-control" placeholder="***" name="cvv_number"
                                                onkeyup="this.value=this.value.replace(/[^0-9]/g,'');"> </td>
                                    </tr>
                                </table>
                                <table class="table table-borderless" style="width: 500px;">
                                    <tr>
                                        <td colspan="3">
                                            <i class="fa fa-credit-card" aria-hidden="true"
                                                style="padding-left: 10px;padding-right: 10px;"></i>
                                            <i class="fab fa-paypal" style="padding-right: 22px;"></i>
                                            <i class=" fab fa-google-pay" style="padding-right: 22px;"></i>
                                            <i class="fab fa-amazon-pay" style="padding-right: 22px;"></i>
                                            <i class="fab fa-cc-paypal" style="padding-right: 22px;"></i>
                                            <i class="fab fa-cc-visa" style="padding-right: 22px;"></i>
                                            <i class="fab fa-cc-amex" style="padding-right: 22px;"></i>
                                            <i class="fab fa-cc-discover" style="padding-right: 22px;"></i>
                                            <i class="fab fa-cc-mastercard"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Valid until</td>
                                        <td>
                                            <select style="width: 120px;" name="month" class="form-control">
                                                <option value="">Month</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select style="width: 120px;" name="year" class="form-control">
                                                <option value="">Year</option>
                                                <option value="2030">2030</option>
                                                <option value="2029">2029</option>
                                                <option value="2028">2028</option>
                                                <option value="2027">2027</option>
                                                <option value="2026">2026</option>
                                                <option value="2025">2025</option>
                                                <option value="2024">2024</option>
                                                <option value="2023">2023</option>
                                                <option value="2022">2022</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <button class="btn btn-primary form-control"  type="submit" name="payment_now">Payment Now</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
        
    


    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js?v=3.2.0"></script>

    <!-- Start Jquery Validation -->
    <script src="https://jqueryvalidation.org/files/lib/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <style>
        .error {
            color: red;
        }
    </style>
    <script>
        $(document).ready(function () {
            $("#myForm").validate({
                rules: {
                    'name': {
                        required: true,
                    },
                    'holder_Name': {
                        required: true,
                    },
                    'ifsc_code': {
                        required: true,
                        minlength: 14,
                        maxlength: 14
                    },
                    'holder_name': {
                        required: true,
                    },
                    'c_number': {
                        required: true,
                        minlength: 16,
                        maxlength: 16
                    },
                    'cvv_number': {
                        required: true,
                        minlength: 3,
                        maxlength: 3
                    },
                    'month': {
                        required: true,
                    },
                    'year': {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Please Enter Bank Name",
                    },
                    holder_Name: {
                        required: "Please Enter Card Holder Name",
                    },
                    ifsc_code: {
                        required: "Please Enter IFSC Code",
                    },
                    holder_name: {
                        required: "Please Enter Card Holder Name",
                    },
                    c_number: {
                        required: "Please Enter Card Number",
                    },
                    cvv_number: {
                        required: "Please Enter CVV Number",
                    },
                    month: {
                        required: "Please Select Month",
                    },
                    year: {
                        required: "Please Select Year",
                    },
                },
                submitHandler: function () {
                    myFunction();
                }
            });
        });
   
  
       <?php 
       
       if(isset($_GET['pyd']))
       {
           $payment = $_GET['pyd'];
       echo " function myFunction() {
            setTimeout(function () {
                swal({
                    title: 'Payment Gateway',
                    text: 'Payment Successfully.',
                    type: 'success'
                }, function () {
                    window.location = 'pymentprocess.php?id= $payment';
                });
            }, 1000);
        }";
       }
       else
       {
            echo " function myFunction() {
            setTimeout(function () {
                swal({
                    title: 'Payment Gateway',
                    text: 'Payment Successfully.',
                    type: 'success'
                }, function () {
                    window.location = 'pymentprocess.php';
                });
            }, 1000);
        }";
       }
        ?>
    </script>
    
</body>

</html>