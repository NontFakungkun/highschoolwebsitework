<?php 
session_start(); 
include 'connection.php'; //connection.php has $dbcon code 

//The following variables save values from respective post arrays 

if($_POST['submit'] == 'Start Order')
	{
	$CustomerID = $_POST['CustomerID'];
	$Delivery = $_POST['Delivery']; 
 
$order_insert_query = "INSERT INTO orders (CustomerID, Delivery)
VALUES ('$CustomerID', '$Delivery')"; 

if ($dbcon -> query($order_insert_query) === TRUE)
{
	$_SESSION['last_order_id'] = $dbcon->insert_id;
	echo $last_order_id = $_SESSION['last_order_id'];
}
else
{
	echo "<script>alert('Not inserted') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order_product.php' </script>";
}

$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order_product.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';

}
//==============================================================================
if($_POST['submit'] == 'Update Address')
	{
	$CustomerID = $_POST['CustomerID'];
	$StreetNum = htmlentities($_POST['StreetNum'], ENT_QUOTES);
	$Street = htmlentities($_POST['Street'], ENT_QUOTES);
	$Suburb = htmlentities($_POST['Suburb'], ENT_QUOTES);
	$City = htmlentities($_POST['City'], ENT_QUOTES);
	$Postcode = $_POST['Postcode']; 

$address_update_query = "UPDATE customers 
                        SET StreetNum = '$StreetNum', Street = '$Street', Suburb = '$Suburb', City = '$City', Postcode = '$Postcode'  
                        WHERE CustomerID = '$CustomerID'"; 

$address_update_result = mysqli_query($dbcon, $address_update_query); 


if(!$address_update_result) { echo "<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order_product.php' </script>";} 

else {
echo "<script>alert(' Address is updated') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order_product.php' </script>";
 } 
$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order_product.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';

}
//==============================================================================
if($_POST['submit'] == 'Add This Menu')
	{
	$last_order_id = $_SESSION['last_order_id'];
	$MenuID = $_POST['MenuID'];
	$MenuQuantity = $_POST['MenuQuantity']; 
	echo "".$last_order_id." ".$MenuID." ".$MenuQuantity."";

$order_menu_insert_query = "INSERT INTO `orderproducts` (`OrderID`, `MenuID`, `Quantity`)
VALUES ('$last_order_id', '$MenuID', '$MenuQuantity')"; 


$order_menu_insert_result = mysqli_query ($dbcon, $order_menu_insert_query); 
 
if(!$order_menu_insert_result) { echo "<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order_product.php' </script>";} 

else { echo "<script>alert(' A menu has been added to your order') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order_product.php' </script>";
 } 
$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order_product.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';

}
//=============================================================================
if($_POST['submit'] == 'Add This Deal')
	{
	$last_order_id = $_SESSION['last_order_id'];
	$DealID = $_POST['DealID'];
	$DealQuantity = $_POST['DealQuantity']; 
	echo "".$last_order_id." ".$DealID." ".$DealQuantity."";
 
$order_deal_insert_query = "INSERT INTO `orderdeals` (`OrderID`, `DealID`, `Quantity`)
VALUES ('$last_order_id', '$DealID', '$DealQuantity')"; 

$order_deal_insert_result = mysqli_query ($dbcon, $order_deal_insert_query); 


if(!$order_deal_insert_result) { 
echo "<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order_product.php' </script>";} 

else { echo "<script>alert('  A deal has been added to your order') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order_product.php' </script>";
} 
$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order_product.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';

}
//==============================================================================

if($_POST['submit'] == 'Cancel This Menu')
{ 
$last_order_id = $_SESSION['last_order_id'];
$MenuID = $_POST['MenuID'];
$order_menu_delete_query = "DELETE 
					FROM `orderproducts`
					WHERE `orderproducts`.`OrderID` = '$last_order_id'
					AND `orderproducts`.`MenuID` = '$MenuID'";

$order_menu_delete_result = mysqli_query ($dbcon, $order_menu_delete_query);

if(!$order_menu_delete_result) {echo "<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order_product.php' </script>";} 

else { echo "<script>alert('  The menu has been canceled') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order_product.php' </script>";
} 

$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order_product.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';
}
//==============================================================================
if($_POST['submit'] == 'Cancel This Deal')
{ 
$last_order_id = $_SESSION['last_order_id'];
$DealID = $_POST['DealID'];
$order_deal_delete_query = "DELETE 
					FROM `orderdeals`
					WHERE `orderdeals`.`OrderID` = '$last_order_id'
					AND `orderdeals`.`DealID` = '$DealID'";

$order_deal_delete_result = mysqli_query ($dbcon, $order_deal_delete_query);
 
if(!$order_deal_delete_result) {echo "<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order_product.php' </script>";} 

else {echo "<script>alert(' The deal has been canceled') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order_product.php' </script>";
 } 

$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order_product.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';
}
//==============================================================================
if($_POST['submit'] == 'Cancel Order')
{ 

$last_order_id = $_SESSION['last_order_id'];


$order_deal_delete_query = "DELETE 
					FROM `orderdeals`
					WHERE `orderdeals`.`OrderID` = '$last_order_id'";

$order_deal_delete_result = mysqli_query ($dbcon, $order_deal_delete_query);


$order_menu_delete_query = "DELETE 
					FROM `orderproducts`
					WHERE `orderproducts`.`OrderID` = '$last_order_id'";

$order_menu_delete_result = mysqli_query ($dbcon, $order_menu_delete_query);

$order_delete_query = "DELETE 
					FROM `orders`
					WHERE `orders`.`OrderID` = '$last_order_id'";

$order_delete_result = mysqli_query ($dbcon, $order_delete_query);
if(!$order_deal_delete_result) {echo "<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order.php' </script>";} 

else {echo "<script>alert(' The Order has been canceled') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order.php' </script>";
} 

$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';
}

//==============================================================================
if($_POST['submit'] == 'Remove Order')
{ 
$OrderID = $_POST['OrderID'];


$order_deal_delete_query = "DELETE 
					FROM `orderdeals`
					WHERE `orderdeals`.`OrderID` = '$OrderID'";

$order_deal_delete_result = mysqli_query ($dbcon, $order_deal_delete_query);


$order_menu_delete_query = "DELETE 
					FROM `orderproducts`
					WHERE `orderproducts`.`OrderID` = '$OrderID'";

$order_menu_delete_result = mysqli_query ($dbcon, $order_menu_delete_query);

$order_delete_query = "DELETE 
					FROM `orders`
					WHERE `orders`.`OrderID` = '$OrderID'";

$order_delete_result = mysqli_query ($dbcon, $order_delete_query);
if(!$order_delete_result) {echo "<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_orders.php' </script>";} 

else {echo "<script>alert('The order has been removed') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_orders.php' </script>";
 } 

$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_orders.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';

} 
//==============================================================================

if($_POST['submit'] == 'Place Order')
{ 

$OrderPrice = $_POST['OrderPrice'];
$last_order_id = $_SESSION['last_order_id'];

$order_price_update_query = "UPDATE orders 
                        SET TotalPrice = '$OrderPrice'
                        WHERE OrderID = '$last_order_id'"; 
$order_price_update_result = mysqli_query($dbcon, $order_price_update_query); 
echo "<script>alert(' You have placed your order. Money will be collected once you have come pick up the food or the food is delivered!') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order.php' </script>";
session_destroy();
$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/order.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';
 
} 
//==============================================================================

if($_POST['submit'] == 'Update Order')
{ 

$OrderID = $_POST['OrderID'];
$MenuID = $_POST['MenuID'];
$DealID = $_POST['DealID'];
$Delivery = $_POST['Delivery'];
$MenuQuantity = $_POST['MenuQuantity'];
$DealQuantity = $_POST['DealQuantity'];

$order_update_query = "UPDATE orders 
                        SET Delivery = '$Delivery'
                        WHERE OrderID = '$OrderID'"; 
$order_update_result = mysqli_query($dbcon, $order_update_query); 

$order_menu_update_query = "UPDATE orderproducts 
                        SET Quantity = '$MenuQuantity'
                        WHERE OrderID = '$OrderID'
						AND MenuID = '$MenuID'"; 
$order_menu_update_result = mysqli_query($dbcon, $order_menu_update_query); 

$order_deal_update_query = "UPDATE orderdeals 
                        SET Quantity = '$DealQuantity'
                        WHERE OrderID = '$OrderID'
						AND DealID = '$DealID'"; 
$order_deal_update_result = mysqli_query($dbcon, $order_deal_update_query); 

$price_menu_update_query = "SELECT `menu`.`Price`, `orderproducts`.`Quantity`
					FROM `orders`, `menu`, `orderproducts`
					WHERE `orderproducts`.`OrderID` = '$OrderID'
					AND `orderproducts`.`MenuID` = `menu`.`MenuID`
					AND `orders`.`OrderID` = `orderproducts`.`OrderID`";

$price_menu_update_result = mysqli_query ($dbcon, $price_menu_update_query);

			
 while ($price_menu_update_record = mysqli_fetch_assoc ($price_menu_update_result)) {
						$multiplied_menu_price = $price_menu_update_record['Price'] * $price_menu_update_record['Quantity'];
 $total_price += $multiplied_menu_price;}
						
$price_deal_update_query = "SELECT `deals`.`Price`, `orderdeals`.`Quantity`
					FROM `orders`, `deals`, `orderdeals`
					WHERE `orderdeals`.`OrderID` = '$OrderID'
					AND `orderdeals`.`DealID` = `deals`.`DealID`
					AND `orders`.`OrderID` = `orderdeals`.`OrderID`";

$price_deal_update_result = mysqli_query ($dbcon, $price_deal_update_query);

			
 while ($price_deal_update_record = mysqli_fetch_assoc ($price_deal_update_result)) {
						$multiplied_deal_price = $price_deal_update_record['Price'] * $price_deal_update_record['Quantity'];
 $total_price += $multiplied_deal_price;}
						
$order_price_update_query = "UPDATE orders 
                        SET TotalPrice = '$total_price'
                        WHERE OrderID = '$OrderID'"; 
$order_price_update_result = mysqli_query ($dbcon, $order_price_update_query);
if (!$order_update_result) 
{ echo "<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_orders.php' </script>"; } 
else 
{echo "<script>alert('  Order details are updated') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_orders.php' </script>";
 } 


$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_orders.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';

} 
?>