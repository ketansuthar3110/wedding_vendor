<?php
require './class/connection.php';
session_start();
$i=1;
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    unset($_SESSION['vcart'][$id]);
    
}
if(isset($_SESSION['vcart']) && !empty(($_SESSION['vcart'])))
{
    
    echo "<table width=50%>";
   
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
}

echo "</table>";
}
else
{
    echo "cart is empty";
    echo "<a href='vendor-listing-sidebar.php'>Book more</a>";

}
echo "<a href='vendor-listing-sidebar.php'>Buy more</a>";
if(isset($_SESSION['userid'] ))
{
    echo "<a href='pyment.php'>Checkout</a>";
}
else
{
    echo "<a href='login.php' >please login to order</a>";
}
?>
