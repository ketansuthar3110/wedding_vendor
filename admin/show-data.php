<?php
require './class/connection.php';

$sql = "SELECT
    `tbl_vendormaster`.`vendor_id`
    , `tbl_vendormaster`.`vendor_name`
    , `tbl_vendormaster`.`vendor_gender`
    , `tbl_vendormaster`.`vendor_details`
    , `tbl_category`.`category_name`
    , `tbl_area`.`area_name`
    , `tbl_vendormaster`.`vendor_photo`
    , `tbl_vendormaster`.`vendor_price`
    , `tbl_vendormaster`.`vendor_mobileno`
    , `tbl_vendormaster`.`vendor_email`
FROM
    `tbl_category`
    INNER JOIN `tbl_vendormaster` 
        ON (`tbl_category`.`category_id` = `tbl_vendormaster`.`category_id`)
    INNER JOIN `tbl_area` 
        ON (`tbl_area`.`area_id` = `tbl_vendormaster`.`area_id`);";
$q  = mysqli_query($connection, $sql) or die (mysqli_error($connection));

echo "<table border='1'>";
echo "<th>Vendor ID</th>";
echo "<th>Vendor Name</th>";
echo "<th>Vendor Gender</th>";
echo "<th>Vendor Details</th>";
echo "<th>Category Name</th>";
echo "<th>Area Name</th>";
echo "<th>Vendor Pic</th>";
echo "<th>Vendor Price</th>";
echo "<th>Vendor Mobile</th>";
echo "<th>Vendor Email</th>";
while($row = mysqli_fetch_array($q))
{
    echo "<tr>";
    echo "<td>{$row['vendor_id']}</td>";
    echo "<td>{$row['vendor_name']}</td>";
    echo "<td>{$row['vendor_gender']}</td>";
    echo "<td>{$row['vendor_details']}</td>";
    echo "<td>{$row['category_name']}</td>";
    echo "<td>{$row['area_name']}</td>";
     echo "<td>{$row['vendor_photo']}</td>";
    echo "<td>{$row['vendor_price']}</td>";
    echo "<td>{$row['vendor_mobileno']}</td>";
    echo "<td>{$row['vendor_email']}</td>";
    echo "</tr>";
}
echo "</table>";
?>
