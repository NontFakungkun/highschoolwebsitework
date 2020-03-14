<?php
    session_start();
	if (empty($_SESSION['admin'])) {
    $_SESSION['admin'] = 0;
}
    if ($_SESSION['admin'] != 1){ 
    header ('Location: login.php'); 
    exit(); 
 }  
 include 'Includes/connection.php';
 ?>
 
<!DOCTYPE html><!-- Tells the program what type of language will be used on the document -->  
<html>

<head><!-- The title part of the website --> 

<meta http-equiv="content-type" content="text/html; charset=utf-8" /> <!--chartset attributes tells the browser that the charterset is utf-8-->
<title>Pizza Plaza - Edit Customers</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/stylesheet.css"/>
</head>

<body>

	<header>
	<a href="index.php", id="logo"> <img src="Images/logo.png"/> </a>
	<p class="title">Pizza Plaza</p>
	<div class="navbar" id="navbar">
	
	<a href="index.php" >Home</a>
	<a href="menu_search.php" >Menu</a>
	<a href="customers.php" >Customers</a>
	<a href="order.php" >Order |</a>
	<a href="custom_menu.php" >Add/Edit Menu</a>
	<a href="custom_deals.php" >Add/Edit Deals</a>
	<a href="edit_customers.php" class="current">Edit Customers</a>
	<a href="custom_orders.php" >Search/Edit Orders |</a>
	<a href="login.php" >Log in</a>
	<a href="logout.php" >Log out</a>

		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
		</a>
	</div>
	</header>

<br><br><br><br><br>
<div class="middle">
<h2>Choose a customer to edit</h2><!-- this is the content for the section--> 

<?php 


//Show all customer to select one
$all_customers_query = "SELECT *
					FROM `customers`
					ORDER BY `customers`.`FirstName` ASC";
$all_customers_result = mysqli_query($dbcon, $all_customers_query); 
$all_customers_rows = mysqli_num_rows($all_customers_result);  
echo "There were ".$all_customers_rows." members in the database. <br/>"; 

//create a dynamic form 
echo "<form name = 'customer' action = 'edit_customers.php'>"; 
echo "<select name = 'customer' required>"; 
                    echo "<option value=>";
                    echo "Select Customer";
                    echo "</option>";
while ($all_customers_record = mysqli_fetch_assoc ($all_customers_result))
{ echo "<option value = '".$all_customers_record['CustomerID']."'>".$all_customers_record['FirstName']." ".$all_customers_record['LastName']."</option>"; } 
echo "</select>"; 
echo " <input type = 'submit' value = 'Edit Customer'> <br>"; 
echo "</form>"; 

//state variable
$current_customer = '';
if (isset($_GET['customer'])) {
$current_customer = $_GET['customer']; 
}

if (!$current_customer) 
{ echo " <br>Error:Please select a customer to edit <br>"; 
$current_customer = 0; } 
//search detail of selected customers
$current_customer_query = "SELECT * 
                        FROM `customers` 
                        WHERE `customers`.`CustomerID` = '".$current_customer."'";
                        
$current_customer_result = mysqli_query ($dbcon, $current_customer_query);
$current_customer_record = mysqli_fetch_assoc ($current_customer_result); 

?> 

<div class="text-left">
<form name = 'edit_customer.php' method = 'post' action = 'Includes/process_customer.php'> 
<!-- Text boxes with former value put in wainting to be edited -->
<input type = 'hidden' name = 'CustomerID' value = '<?php echo $current_customer_record['CustomerID']; ?>'> <br>
First Name*: <input type = 'text' maxlength = "30" name = 'FirstName' required value = "<?php echo $current_customer_record['FirstName'] ?>">
<br><br> 
Last Name*: <input type = 'text' maxlength = "30" name = 'LastName' required value = "<?php echo $current_customer_record['LastName'] ?>">
<br><br> 
Street Number*: <input type = 'text' maxlength = "8" name = 'StreetNum' required value = '<?php echo $current_customer_record['StreetNum']; ?>'>
<br><br>
Street*: <input type = 'text' maxlength = "50" name = 'Street' required value = "<?php echo $current_customer_record['Street'] ?>">
<br><br>
Suburb*: <input type = 'text' maxlength = "20" name = 'Suburb' required value = "<?php echo $current_customer_record['Suburb'] ?>">
<br><br> 
City*: <input type = 'text' maxlength = "20" name = 'City' required value = "<?php echo $current_customer_record['City'] ?>">
<br><br>
Postcode*: <input type = 'number' min="0" maxlength = "6" name = 'Postcode' required value = '<?php echo $current_customer_record['Postcode']; ?>'>
<br><br>
Telephone: <input type = 'number' min="0" maxlength = "13" name = 'Telephone'  value = '<?php echo $current_customer_record['Telephone']; ?>'>
<br><br>
Date of birth: <input type = 'date' maxlength = "12" name = 'BirthDate'  value = '<?php echo $current_customer_record['BirthDate']; ?>'>
<br><br>
Date Joined: <input type = 'date' maxlength = "12" name = 'DateJoined'  value = '<?php echo $current_customer_record['DateJoined']; ?>'>
<br><br>
Email: <input type = 'email' maxlength = "30" name = 'Email'  value = '<?php echo $current_customer_record['Email']; ?>'>
<br><br>
	(* is the required field)<br> <br>

<input type = 'submit' name = 'submit' value = 'Update Customer'> 
<br><br>
<input type = 'submit' name = 'submit' value = 'Remove Customer'>
</form> 
</div>

</div><!-- end of section --> 

<footer>
		<div>The image used for icon and logo in the website is made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
		<P>  &copy Copyright - Nont Fakungkun </p>
		</footer>

