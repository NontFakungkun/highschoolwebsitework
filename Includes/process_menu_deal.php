<!DOCTYPE html>
<meta http-equiv="content-type"  content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="CSS/stylesheet.css"/>
<body>
<?php 
include 'connection.php'; //connection.php has $dbcon code 


if($_POST['submit'] == 'Add Menu')
	{
$MenuName = htmlentities($_POST['MenuName'], ENT_QUOTES);
$MenuDescription = htmlentities($_POST['MenuDescription'], ENT_QUOTES);
$Calories = $_POST['Calories']; 
$Price = $_POST['Price']; 
$menu_insert_query = "INSERT INTO `menu` (`MenuName`, `Description`, `Calories`, `Price`) 
VALUES ('$MenuName', '$MenuDescription', '$Calories', '$Price')"; 

$menu_insert_result = mysqli_query ($dbcon, $menu_insert_query); 
 
if(!$menu_insert_result) { echo "<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_menu.php' </script>";} 

else { echo "<script>alert('  New menu has been added') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_menu.php' </script>";
 } 
$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_menu.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';

}
 

if($_POST['submit'] == 'Update Menu')
{ 
$MenuID = $_POST['MenuID'];
$MenuName = htmlentities($_POST['MenuName'], ENT_QUOTES);
$MenuDescription = htmlentities($_POST['MenuDescription'], ENT_QUOTES);
$Calories = $_POST['Calories']; 
$Price = $_POST['Price']; 
$menu_update_query = "UPDATE menu
                        SET MenuName = '$MenuName', Description = '$MenuDescription', Calories = '$Calories', Price = '$Price' 
                        WHERE MenuID = '$MenuID'"; 

$menu_update_result = mysqli_query($dbcon, $menu_update_query); 

if (!$menu_update_result) 
{ echo "<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_menu.php' </script>";} 
else 
{ echo "<script>alert('  menu details are updated') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_menu.php' </script>";
} 
$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_menu.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';

} 

if($_POST['submit'] == 'Remove Menu')
	{
$MenuID = $_POST['MenuID'];

$menu_insert_query = "DELETE 
					FROM `menu`
					WHERE MenuID = '$MenuID'";
					
$menu_insert_result = mysqli_query ($dbcon, $menu_insert_query); 
 
if(!$menu_insert_result) { echo "<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_menu.php' </script>";} 

else { echo "<script>alert('  The menu has been removed') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_menu.php' </script>";
 } 
$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_menu.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';

}
//==============================================================================
if($_POST['submit'] == 'Add Deal')
	{
$DealName = htmlentities($_POST['DealName'], ENT_QUOTES);
$DealDescription = htmlentities($_POST['DealDescription'], ENT_QUOTES);
$DealPrice = $_POST['DealPrice'];

$deal_insert_query = "INSERT INTO deals (DealName, Description, Price) 
VALUES ('$DealName', '$DealDescription', '$DealPrice')"; 

$deal_insert_result = mysqli_query ($dbcon, $deal_insert_query); 
 
if(!$deal_insert_result) {echo "<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_deals.php' </script>";} 

else { echo "<script>alert('  New deal has been added') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_deals.php' </script>";
 } 
$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_deals.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';
}

if($_POST['submit'] == 'Add This Menu')
{
$DealID = $_POST['DealID']; 
$MenuID = $_POST['MenuID']; 
$Quantity = $_POST['Quantity'];
 
$deal_menu_insert_query = "INSERT INTO dealproducts (DealID, MenuID, Quantity) 
VALUES ('$DealID', '$MenuID', '$Quantity')"; 

$deal_menu_insert_result = mysqli_query ($dbcon, $deal_menu_insert_query); 

if(!$deal_menu_insert_result) {echo "<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_deals.php' </script>";} 

else { echo "<script>alert('  The menu has been added to the selected deal') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_deals.php' </script>";
 } 
$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_deals.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';

}

if($_POST['submit'] == 'Update Deal')
{ 
$DealID = $_POST['DealID']; 
$DealName = htmlentities($_POST['DealName'], ENT_QUOTES);
$DealDescription = htmlentities($_POST['DealDescription'], ENT_QUOTES);
$DealPrice = $_POST['DealPrice'];
$MenuID = $_POST['MenuID']; 
$Quantity = $_POST['Quantity'];

$deal_update_query = "UPDATE deals
                        SET DealName = '$DealName', Description = '$DealDescription', Price = '$DealPrice' 
                        WHERE DealID = '$DealID'"; 
$deal_update_result = mysqli_query($dbcon, $deal_update_query); 

if (!$deal_update_result) 
{ echo "<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_deals.php' </script>"; } 
else 
{ echo "<script>alert('  deal details are updated') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_deals.php' </script>";
 } 
$deal_menu_update_query = "UPDATE dealproducts
                        SET Quantity = '$Quantity' 
                        WHERE DealID = '$DealID'
						AND MenuID = '$MenuID'"; 
$deal_menu_update_result = mysqli_query($dbcon, $deal_menu_update_query); 

if (!$deal_menu_update_result) 
{ echo "<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_deals.php' </script>"; } 
$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_deals.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';
} 

if($_POST['submit'] == 'Remove Deal')
	{
$DealID = $_POST['DealID']; 

$deal_delete_query = "DELETE 
					FROM `deals`
					WHERE `deals`.`DealID` = '$DealID'";
					
$deal_delete_result = mysqli_query ($dbcon, $deal_delete_query); 

$menu_delete_query = "DELETE 
					FROM `dealproducts`
					WHERE `dealproducts`.`DealID` = '$DealID'";
					
$menu_delete_result = mysqli_query ($dbcon, $menu_delete_query);

if(!$menu_delete_result) { echo "<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_deals.php' </script>";} 

else { echo "<script>alert('  the deal has been removed') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_deals.php' </script>";
 } 
$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_deals.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';

}
//==============================================================================
if($_POST['submit'] == 'Remove This Menu')
	{
$DealID = $_POST['DealID']; 
$MenuID = $_POST['MenuID']; 

$deal_menu_delete_query = "DELETE 
					FROM `dealproducts`
					WHERE `dealproducts`.`DealID` = '$DealID'
					AND `dealproducts`.`MenuID` = '$MenuID'";
					
$deal_menu_delete_result = mysqli_query ($dbcon, $deal_menu_delete_query); 


if(!$deal_menu_delete_result) { echo "<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_deals.php' </script>";} 

else { echo "<script>alert('The selected menu has been removed from the deal') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_deals.php' </script>";
 } 
$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/custom_deals.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';

}

?>
<br>
</body>
