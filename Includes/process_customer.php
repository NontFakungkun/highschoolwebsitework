<?php 
include 'connection.php'; //connection.php has $dbcon code 
//htmlentities is used to translate any special character into a readable set of value so it can be stored in database without error
$FirstName = htmlentities($_POST['FirstName'], ENT_QUOTES);
$LastName = htmlentities($_POST['LastName'], ENT_QUOTES);
$StreetNum = htmlentities($_POST['StreetNum'], ENT_QUOTES);
$Street = htmlentities($_POST['Street'], ENT_QUOTES);
$Suburb = htmlentities($_POST['Suburb'], ENT_QUOTES);
$City = htmlentities($_POST['City'], ENT_QUOTES);
$Postcode = $_POST['Postcode']; 
$Telephone = $_POST['Telephone']; 
$BirthDate = $_POST['BirthDate']; 
$DateJoined = $_POST['DateJoined']; 
$Email = $_POST['Email']; 

if($_POST['submit'] == 'Add Customer')
	{
 
$player_insert_query = "INSERT INTO customers (FirstName, LastName, StreetNum, Street, Suburb, City, Postcode, Telephone, BirthDate, DateJoined, Email) 
VALUES ('$FirstName', '$LastName', '$StreetNum', '$Street', '$Suburb', '$City', '$Postcode', '$Telephone', '$BirthDate', '$DateJoined', '$Email')"; 

$player_insert_result = mysqli_query ($dbcon, $player_insert_query); 
 
if(!$player_insert_result) { echo"<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/edit_customers.php' </script>";} 

else { echo "<script>alert('New customer has been added') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/edit_customers.php' </script>";} 
$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/customers.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';
}

if($_POST['submit'] == 'Update Customer')
{ 
$CustomerID = $_POST['CustomerID'];
$player_update_query = "UPDATE customers 
                        SET FirstName = '$FirstName', LastName = '$LastName', StreetNum = '$StreetNum', Street = '$Street', Suburb = '$Suburb', City = '$City', Postcode = '$Postcode' , Telephone = '$Telephone' , BirthDate = '$BirthDate' , DateJoined = '$DateJoined' , Email = '$Email'  
                        WHERE CustomerID = '$CustomerID'"; 

$player_update_result = mysqli_query($dbcon, $player_update_query); 

if (!$player_update_result) 
{ echo "<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/edit_customers.php' </script>"; } 
else 
{ 
    echo "<script>alert('Customer details are updated') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/edit_customers.php' </script>";
} 
$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/edit_customers.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';


}
if($_POST['submit'] == 'Remove Customer')
{ 
    $CustomerID = $_POST['CustomerID'];

$customer_delete_query = "DELETE 
					FROM `customers`
					WHERE CustomerID = '$CustomerID'";

$customer_delete_result = mysqli_query ($dbcon, $customer_delete_query); 
//works as popup to send message to user if the process is successful or not
if(!$customer_delete_result) { echo "<script>alert('An error happened') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/edit_customers.php' </script>";} 

else { echo "<script>alert('  The customer has been removed') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/edit_customers.php' </script>";
 } 
 //redirect user into another page
$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/edit_customers.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">';
}

?>