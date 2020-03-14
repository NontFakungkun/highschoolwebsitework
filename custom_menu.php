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
<title>Pizza Plaza - Add/Edit Menu</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/stylesheet.css"/>
</head>

<body>

	<header>
	<a href="index.php", id="logo"> <img src="Images/logo.png"/> </a>
	<p class="title">Pizza Plaza</p>
	<div class="navbar" id="navbar">
	
	<a href="index.php">Home</a>
	<a href="menu_search.php" >Menu</a>
	<a href="customers.php" >Customers</a>
	<a href="order.php" >Order |</a>
	<a href="custom_menu.php" class="current">Add/Edit Menu</a>
	<a href="custom_deals.php" >Add/Edit Deals</a>
	<a href="edit_customers.php" >Edit Customers</a>
	<a href="custom_orders.php" >Search/Edit Orders |</a>
	<a href="login.php" >Log in</a>
	<a href="logout.php" >Log out</a>

		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
		</a>
	</div>
	</header>
	
	<br><br><br><br><br><br>
	<div class='one-third'>
		<h3>Add Menu</h3> 
    <form name = 'menu' method = 'post' action = 'Includes/process_menu_deal.php'> 
    Menu Name:<br> <input type="text" name="MenuName" maxlength="30" required><br> 
    Description:<br> <input type="text" name="MenuDescription" maxlength="150" required><br> 
    Calories:<br> <input type="number" min="0" name="Calories" maxlength="20"><br> 
	Price:<br> <input type="number" min="0" name="Price" maxlength="20" required><br>
	<br>
    <input type='submit' name = 'submit' value = 'Add Menu'> 
    </form> 
</div>

	<div class='one-third'>
	<h3>Edit Menu</h3><!-- this is the content for the section--> 

<?php 


$all_menu_query = "SELECT *
					FROM `menu`
					";
$all_menu_result = mysqli_query($dbcon, $all_menu_query); 
$all_menu_rows = mysqli_num_rows($all_menu_result);  

//create a dynamic form 
echo "<form name = 'menu' action = 'custom_menu.php'>"; 
echo "<select name = 'menu' required>"; 
                    echo "<option value=>";
                    echo "Select menu";
                    echo "</option>";
while ($all_menu_record = mysqli_fetch_assoc ($all_menu_result))
{ echo "<option value = '".$all_menu_record['MenuID']."'>".$all_menu_record['MenuName']."</option>"; } 
echo "</select>"; 
echo " <input type = 'submit' value = 'Edit menu'> <br>"; 
echo "</form>"; 

	$current_menu = '';
	if (isset($_GET['menu'])) {
    $current_menu = $_GET['menu']; 
	}

if (!$current_menu) 
{ echo "Error:Please select a menu to edit <br>"; 
$current_menu = 0; } 

$current_menu_query = "SELECT * 
                        FROM `menu` 
                        WHERE `menu`.`MenuID` = '".$current_menu."'";
                        
$current_menu_result = mysqli_query ($dbcon, $current_menu_query);
$current_menu_record = mysqli_fetch_assoc ($current_menu_result); 

?> 

<form name = 'custom_menu.php' method = 'post' action = 'Includes/process_menu_deal.php'> 

<input type = 'hidden' name = 'MenuID' value = '<?php echo $current_menu_record['MenuID']; ?>'> 
Menu Name: <input type = 'text' maxlength = "30" name = 'MenuName' required value = '<?php echo $current_menu_record['MenuName']; ?>'>
<br><br> 
Description: <input type = 'text' maxlength = "150" name = 'MenuDescription' required value = '<?php echo $current_menu_record['Description']; ?>'>
<br><br> 
Calories: <input type = 'number' min="0" maxlength = "10" name = 'Calories' required value = '<?php echo $current_menu_record['Calories']; ?>'>
<br><br>
Price: <input type = 'number' min="0" maxlength = "3" name = 'Price' required value = '<?php echo $current_menu_record['Price']; ?>'>
<br><br> 

<input type = 'submit' name = 'submit' value = 'Update Menu'> </form> 
	</div>
	
	<div class='one-third'>
	<h3>Remove Menu</h3>
	<?php

    $all_menu_query = "SELECT *
		FROM `menu`";
$all_menu_result = mysqli_query($dbcon, $all_menu_query); 
$all_menu_rows = mysqli_num_rows($all_menu_result);  

//create a dynamic form 
echo "<form name = 'custom_menu.php' method = 'post' action = 'Includes/process_menu_deal.php'> "; 
echo "<select name = 'MenuID' required>"; 
                    echo "<option value=>";
                    echo "Select menu";
                    echo "</option>";
while ($all_menu_record = mysqli_fetch_assoc ($all_menu_result))
{ echo "<option value = '".$all_menu_record['MenuID']."'>".$all_menu_record['MenuName']."</option>"; } 

                ?>
		</select> <br>
    <input type="submit" name = 'submit' value = 'Remove Menu'>
	</form>
	</div>
	<footer>
		<div>The image used for icon and logo in the website is made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
		<P>  &copy Copyright - Nont Fakungkun </p>
		</footer>
    
    