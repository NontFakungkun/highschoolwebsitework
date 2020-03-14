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
 
<!DOCTYPE html>
<html>

<head><!-- The title part of the website --> 

<meta http-equiv="content-type" content="text/html; charset=utf-8" /> <!--chartset attributes tells the browser that the charterset is utf-8-->
<title>Pizza Plaza - Add/Edit Deals</title>

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
	<a href="custom_menu.php" >Add/Edit Menu</a>
	<a href="custom_deals.php" class="current">Add/Edit Deals</a>
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
		<h3>Add Deal</h3> 
    <form name = 'deal' method = 'post' action = 'Includes/process_menu_deal.php'> 
    Deal Name:<br> <input type="text" name="DealName" maxlength="30" required><br> 
    Description:<br> <input type="text" name="DealDescription" maxlength="150" required><br> 
	Price:<br> <input type="number" min="0" name="DealPrice" maxlength="3" required><br>
	<br>
    <input type='submit' name = 'submit' value = 'Add Deal'> 
    </form> 
	<br><br>
	<h3>Add Menu to Deal</h3>
	<?php
	$all_deal_query = "SELECT *
					FROM `deals`
					";
$all_deal_result = mysqli_query($dbcon, $all_deal_query); 
$all_deal_rows = mysqli_num_rows($all_deal_result);  

//create a dynamic form 
echo "<form name = 'dealadd' action = 'custom_deals.php'>"; 
echo "<select name = 'dealadd' required>"; 
                    echo "<option value=>";
                    echo "Select deal";
                    echo "</option>";
while ($all_deal_record = mysqli_fetch_assoc ($all_deal_result))
{ echo "<option value = '".$all_deal_record['DealID']."'>".$all_deal_record['DealName']."</option>"; } 
echo "</select>"; 
echo " <input type = 'submit' value = 'Choose deal'> <br>"; 
echo "</form>"; 

$current_deal_add = '';
if (isset($_GET['dealadd'])) {
$current_deal_add = $_GET['dealadd']; 
}

if (!$current_deal_add) 
{ echo "Error:Please select a deal to add menu on <br>"; 
$current_deal_add = 0; } 

$current_deal_query = "SELECT * 
                        FROM `deals` 
                        WHERE `deals`.`DealID` = '".$current_deal_add."'";
                        
$current_deal_result = mysqli_query ($dbcon, $current_deal_query);
$current_deal_record = mysqli_fetch_assoc ($current_deal_result); 

?> 

<form name = 'custom_deals.php' method = 'post' action = 'Includes/process_menu_deal.php'> 

<input type = 'hidden' name = 'DealID' value = '<?php echo $current_deal_record['DealID']; ?>' >
Deal Name: <input type = 'text' maxlength = "30" name = 'DealName' value = '<?php echo $current_deal_record['DealName']; ?>' readonly>
<br><br> 
Menu: <select name="MenuID" required> 
                <?php
                    $all_names_query = "SELECT *
                                        FROM `menu`
                                        ORDER BY `menu`.`MenuID` ASC";
                    $all_names_results = mysqli_query ($dbcon, $all_names_query);
                    echo "<option value=>";
                    echo "Select Menu";
                    echo "</option>";
                    while ($displayname = mysqli_fetch_assoc($all_names_results)) 
                    {echo "<option value = '".$displayname['MenuID']."'>".$displayname['MenuName']."</option>";
                    }
                ?>
        </select> 
<br><br> 
Quantity: <input type = 'number' min="0" maxlength = "2" name = 'Quantity' required >
<br><br> 

<input type = 'submit' name = 'submit' value = 'Add This Menu'> 
</form> 
</div>
<!--================================================================-->
	<div class='one-third'>
	<h3>Edit Deal</h3>

<?php 



$all_deal_query = "SELECT *
					FROM `deals`
					";
$all_deal_result = mysqli_query($dbcon, $all_deal_query); 
$all_deal_rows = mysqli_num_rows($all_deal_result);  

//create a dynamic form 
echo "<form name = 'dealedit' action = 'custom_deals.php'>"; 
echo "<select name = 'dealedit' required>"; 
                    echo "<option value=>";
                    echo "Select deal";
                    echo "</option>";
while ($all_deal_record = mysqli_fetch_assoc ($all_deal_result))
{ echo "<option value = '".$all_deal_record['DealID']."'>".$all_deal_record['DealName']."</option>"; } 
echo "</select>"; 
echo " <input type = 'submit' value = 'Edit Deal'> <br>"; 
echo "</form>"; 

$current_deal_edit = '';
if (isset($_GET['dealedit'])) {
$current_deal_edit = $_GET['dealedit']; 
}

if (!$current_deal_edit) 
{ echo "Error:Please select a deal to edit <br>"; 
$current_deal_edit = 0; } 

$current_deal_query = "SELECT * 
                        FROM `deals` 
                        WHERE `deals`.`DealID` = '".$current_deal_edit."'";
                        
$current_deal_result = mysqli_query ($dbcon, $current_deal_query);
$current_deal_record = mysqli_fetch_assoc ($current_deal_result); 

?> 

<form name = 'custom_deals.php' method = 'post' action = 'Includes/process_menu_deal.php'> 

<input type = 'hidden' name = 'DealID' value = '<?php echo $current_deal_record['DealID']; ?>'> 
Deal Name: <input type = 'text' maxlength = "30" name = 'DealName' required value = '<?php echo $current_deal_record['DealName']; ?>'>
<br><br> 
Description: <input type = 'text' maxlength = "150" name = 'DealDescription' required value = '<?php echo $current_deal_record['Description']; ?>'>
<br><br> 
Price: <input type = 'number' min="0" maxlength = "10" name = 'DealPrice' required value = '<?php echo $current_deal_record['Price']; ?>'>
<br><br> 
Menu: <select name="MenuID" required> 
                <?php
                    $menu_in_deal_query = "SELECT *
                                        FROM `menu`, `dealproducts`
										WHERE `dealproducts`.`DealID` = '".$current_deal_edit."'
										AND `menu`.`MenuID` = `dealproducts`.`MenuID`
                                        ORDER BY `dealproducts`.`MenuID` ASC";
                    $menu_in_deal_results = mysqli_query ($dbcon, $menu_in_deal_query);
                    echo "<option value=>";
                    echo "Select Menu";
                    echo "</option>";
                    while ($displayname = mysqli_fetch_assoc($menu_in_deal_results)) 
                    {echo "<option value = '".$displayname['MenuID']."'>".$displayname['MenuName']."</option>";
                    }
                ?>
        </select> <br><br>
Quantity: <input type = 'number' min="0" maxlength = "2" name = 'Quantity' required >
<br><br> 
<input type = 'submit' name = 'submit' value = 'Update Deal'> </form> 
	</div>
<!--================================================================-->	
	<div class='one-third'>
	<h3>Remove Deal</h3>
	<?php

    $all_deal_query = "SELECT *
		FROM `deals`";
$all_deal_result = mysqli_query($dbcon, $all_deal_query); 
$all_deal_rows = mysqli_num_rows($all_deal_result);  

//create a dynamic form 
echo "<form name = 'custom_deal.php' method = 'post' action = 'Includes/process_menu_deal.php'> "; 
echo "<select name = 'DealID' required>"; 
                    echo "<option value=>";
                    echo "Select deal";
                    echo "</option>";
while ($all_deal_record = mysqli_fetch_assoc ($all_deal_result))
{ echo "<option value = '".$all_deal_record['DealID']."'>".$all_deal_record['DealName']."</option>"; } 

                ?>
		</select> <br>
    <input type="submit" name = 'submit' value = 'Remove Deal'>
	</form>
	<br><br>
	<h3>Remove Menu from Deal</h3>
	<?php 

$all_deal_query = "SELECT *
					FROM `deals`
					";
$all_deal_result = mysqli_query($dbcon, $all_deal_query); 
$all_deal_rows = mysqli_num_rows($all_deal_result);  

//create a dynamic form 
echo "<form name = 'deal' action = 'custom_deals.php'>"; 
echo "<select name = 'DealID' required>"; 
                    echo "<option value=>";
                    echo "Select deal";
                    echo "</option>";
while ($all_deal_record = mysqli_fetch_assoc ($all_deal_result))
{ echo "<option value = '".$all_deal_record['DealID']."'>".$all_deal_record['DealName']."</option>"; } 
echo "</select>"; 
echo " <input type = 'submit' value = 'Choose Deal'> <br>"; 
echo "</form>"; 

$current_deal_remove = '';
if (isset($_GET['DealID'])) {
$current_deal_remove = $_GET['DealID']; 
}
if (!$current_deal_remove) 
{ echo "Error:Please select a deal to edit <br>"; 
$current_deal_remove = 0; } 

$current_deal_query = "SELECT * 
                        FROM `deals` 
                        WHERE `deals`.`DealID` = '".$current_deal_remove."'";
                        
$current_deal_result = mysqli_query ($dbcon, $current_deal_query);
$current_deal_record = mysqli_fetch_assoc ($current_deal_result); 

?> 
 <br> Menu: <br> 
 <form name = 'custom_deal.php' method = 'post' action = 'Includes/process_menu_deal.php'>
 <input type = 'hidden' name = 'DealID' value = '<?php echo $current_deal_record['DealID']; ?>'>
 <select name="MenuID" required> 
                <?php
                    $menu_in_deal_query = "SELECT *
                                        FROM `menu`, `dealproducts`
										WHERE `dealproducts`.`DealID` = '".$current_deal_remove."'
										AND `menu`.`MenuID` = `dealproducts`.`MenuID`
                                        ORDER BY `dealproducts`.`MenuID` ASC";
                    $menu_in_deal_results = mysqli_query ($dbcon, $menu_in_deal_query);
                    echo "<option value=>";
                    echo "Select Menu";
                    echo "</option>";
                    while ($displayname = mysqli_fetch_assoc($menu_in_deal_results)) 
                    {echo "<option value = '".$displayname['MenuID']."'>".$displayname['MenuName']."</option>";
                    }
                ?>
				</select> <br>
    <input type="submit" name = 'submit' value = 'Remove This Menu'>
	</form>
	</div>
	<footer>
		<div>The image used for icon and logo in the website is made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
		<P>  &copy Copyright - Nont Fakungkun </p>
		</footer>
    
    