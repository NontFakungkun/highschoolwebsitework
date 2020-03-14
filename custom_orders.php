<?php
    session_start();
	if (empty($_SESSION['admin'])) {
    $_SESSION['admin'] = 0;
}
    if ($_SESSION['admin'] != 1){ 
    header ('Location: login.php'); 
    exit(); 
 }  //If have not logged in, redirect to login page - restricted page for admin
 include 'Includes/connection.php';
 ?>
 
<!DOCTYPE html>
<html>

<head>


<meta http-equiv="content-type" content="text/html; charset=utf-8" /> <!--chartset attributes tells the browser that the charterset is utf-8-->
<title>Pizza Plaza - Search/Edit Order</title>
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
	<a href="edit_customers.php" >Edit Customers</a>
	<a href="custom_orders.php" class="current">Search/Edit Orders |</a>
	<a href="login.php" >Log in</a>
	<a href="logout.php" >Log out</a>

		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
		</a>
	</div>
	</header>
	
	<br><br><br><br><br><br>
	<div class='one-third'>
		<h3>Search order by:</h3>   			
		<p> Customer </p>
    <form method = "POST" size "3"> 
        <select name="CustomerID" required> 
                
                <?php
                //search customer who has put order
                    $all_names_query = "SELECT `orders`.`OrderID`, `customers`.`CustomerID`, `customers`.`FirstName` , `customers`.`LastName`
                                        FROM `customers`, `orders`
                                        WHERE `orders`.`CustomerID` = `customers`.`CustomerID`
                                        ORDER BY `customers`.`FirstName` ASC";
                    $all_names_results = mysqli_query ($dbcon, $all_names_query);
                    echo "<option value=>";
                    echo "Select Customer";
                    echo "</option>";
                    while ($displayname = mysqli_fetch_assoc($all_names_results)) 
                    {echo "<option value = '".$displayname['CustomerID']."'>".$displayname['FirstName']." ".$displayname['LastName']."</option>";
                    }
                ?>
                
        </select> 
            <input type="submit" name = 'submit' value = "Search Order"> 
    </form> 
		<p> Menu </p>
    <form method = "POST" size "3"> 
        <select name="MenuID" required> 
                
                <?php
                //search menu by list
                    $all_names_query = "SELECT *
                                        FROM `menu`
                                        ORDER BY `menu`.`MenuID` ASC";
                    $all_names_results = mysqli_query ($dbcon, $all_names_query);
                    echo "<option value=>";
                    echo "Select Menu";
                    echo "</option>";
                    while ($displayname = mysqli_fetch_assoc($all_names_results)) 
                    {echo "<option value = '".$displayname['MenuID']."'>".$displayname['MenuName']." </option>";
                    }
                ?>
                
        </select> 
            <input type="submit" name = 'submit' value = "Search Order"> 
    </form> 
		<p> Deal </p>
    <form method = "POST" size "3"> 
        <select name="DealID" required> 
                
                <?php
                //search deal by list
                    $all_names_query = "SELECT *
                                        FROM `deals`
                                        ORDER BY `deals`.`DealID` ASC";
                    $all_names_results = mysqli_query ($dbcon, $all_names_query);
                    echo "<option value=>";
                    echo "Select Deal";
                    echo "</option>";
                    while ($displayname = mysqli_fetch_assoc($all_names_results)) 
                    {echo "<option value = '".$displayname['DealID']."'>".$displayname['DealName']." </option>";
                    }
                ?>
                
        </select> 
            <input type="submit" name = 'submit' value = "Search Order"> 
    </form> 
    <?php 
    //Get info from the $_POST array 
    
	$CustomerID = '';
if (isset($_POST['CustomerID'])) {
$CustomerID = $_POST['CustomerID']; 
}
    //search for order detail related to the selected customer - menu part
    $search_menu_order_customer_query = "SELECT `customers`.`FirstName`, `customers`.`LastName`, `orders`.`OrderID`, `orders`.`Delivery`, `menu`.`MenuName`, `orderproducts`.`Quantity`
                    FROM `orders`, `customers`, `orderproducts`, `menu`
                    WHERE `customers`.`CustomerID` = '".$CustomerID."' 
					AND `orders`.`CustomerID` = `customers`.`CustomerID`
                    AND `orderproducts`.`OrderID` = `orders`.`OrderID`
                    AND `orderproducts`.`MenuID` = `menu`.`MenuID`
                    ORDER BY `orders`.`OrderID` ASC"; 
                    
	$search_menu_order_customer_results = mysqli_query($dbcon, $search_menu_order_customer_query); 
if (!$search_menu_order_customer_results) { echo " No result found"; }
	

	//search for order detail related to the selected customer - deal part
	$search_deal_order_customer_query = "SELECT `customers`.`FirstName`, `customers`.`LastName`, `orders`.`OrderID`, `orders`.`Delivery`, `deals`.`DealName`, `orderdeals`.`Quantity`
                    FROM `orders`, `customers`, `orderdeals`, `deals`
                    WHERE `customers`.`CustomerID` = '".$CustomerID."' 
					AND `orders`.`CustomerID` = `customers`.`CustomerID`
                    AND `orderdeals`.`OrderID` = `orders`.`OrderID`
                    AND `orderdeals`.`DealID` = `deals`.`DealID`
                    ORDER BY `orders`.`OrderID` ASC"; 
                    
    //(Since order and deal are slightly different in terms of data detail, I decide to put order related to menu and order on separate table. Therefore, I have to write 2 queries to cover all data)
    $search_deal_order_customer_results = mysqli_query ($dbcon, $search_deal_order_customer_query); 
if (!$search_deal_order_customer_results) { echo " No result found"; }
    //Get info from the $_POST array 
    
	$MenuID = '';
if (isset($_POST['MenuID'])) {
$MenuID = $_POST['MenuID']; 
}
    //search for order detail related to the selected menu
    $search_order_menu_query = "SELECT `menu`.`MenuName`, `customers`.`FirstName`, `customers`.`LastName`, `orderproducts`.`Quantity`, `orders`.`Delivery`, `orders`.`OrderID`
                    FROM `orders`, `customers`, `orderproducts`, `menu`
                    WHERE `menu`.`MenuID` = '".$MenuID."' 
					AND `orders`.`CustomerID` = `customers`.`CustomerID`
                    AND `orderproducts`.`OrderID` = `orders`.`OrderID`
                    AND `orderproducts`.`MenuID` = `menu`.`MenuID`
                    ORDER BY `orders`.`OrderID` ASC"; 
                    
    $search_order_menu_results = mysqli_query ($dbcon, $search_order_menu_query); 
if (!$search_order_menu_results) { echo " No result found"; }

    ?> 
	
	<?php 
    //Get info from the $_POST array 
    
	$DealID = '';
if (isset($_POST['DealID'])) {
$DealID = $_POST['DealID']; 
}
    //search for order detail related to the selected deal
    $search_order_deal_query = "SELECT `customers`.`FirstName`, `customers`.`LastName`, `orders`.`OrderID`, `orders`.`Delivery`, `deals`.`DealName`, `orderdeals`.`Quantity`
                    FROM `orders`, `customers`, `orderdeals`, `deals`
                    WHERE `deals`.`DealID` = '".$DealID."' 
					AND `orders`.`CustomerID` = `customers`.`CustomerID`
                    AND `orderdeals`.`OrderID` = `orders`.`OrderID`
                    AND `orderdeals`.`DealID` = `deals`.`DealID`
                    ORDER BY `orders`.`OrderID` ASC "; 
                    
    $search_order_deal_results = mysqli_query ($dbcon, $search_order_deal_query); 
    if (!$search_order_menu_results) { echo " No result found"; }
 
	?>
	<br>
    <h3>Order details</h3>
   <table>
	<tr>
	
    <th>First Name</th>
    <th>Last Name</th> 
    <th>OrderID</th>
	<th>Item</th>
	<th>Quantity</th>
	<th>Delivery</th>
  </tr>
  <?php
  
  //Display order setail through table

		while($search_menu_order_customer_record = mysqli_fetch_assoc($search_menu_order_customer_results)) {
		
        echo "<td>".$search_menu_order_customer_record['FirstName']."</td>"; 
        echo "<td> ".$search_menu_order_customer_record['LastName']."</td>"; 
        echo "<td> ".$search_menu_order_customer_record['OrderID']."</td>"; 
		echo "<td> ".$search_menu_order_customer_record['MenuName']."</td>";
		echo "<td> ".$search_menu_order_customer_record['Quantity']."</td>";
		echo "<td> ".$search_menu_order_customer_record['Delivery']."</td> </tr>";
		
		} 
		while($search_deal_order_customer_record = mysqli_fetch_assoc($search_deal_order_customer_results)) {
	
			
        echo "<td>".$search_deal_order_customer_record['FirstName']."</td>"; 
        echo "<td> ".$search_deal_order_customer_record['LastName']."</td>"; 
        echo "<td> ".$search_deal_order_customer_record['OrderID']."</td>"; 
		echo "<td> ".$search_deal_order_customer_record['DealName']."</td>";
		echo "<td> ".$search_deal_order_customer_record['Quantity']."</td>";
        echo "<td> ".$search_deal_order_customer_record['Delivery']."</td> </tr>"; 
		
		} 
		while($search_order_menu_record = mysqli_fetch_assoc($search_order_menu_results)) {
	
		echo "<td>".$search_order_menu_record['FirstName']."</td>";
        echo "<td> ".$search_order_menu_record['LastName']."</td>"; 
		echo "<td> ".$search_order_menu_record['OrderID']."</td>";
        echo "<td> ".$search_order_menu_record['MenuName']."</td>"; 
		echo "<td> ".$search_order_menu_record['Quantity']."</td>";
		echo "<td> ".$search_order_menu_record['Delivery']."</td> </tr>"; 
		
		}
		while($search_order_deal_record = mysqli_fetch_assoc($search_order_deal_results)) {
 
        echo "<td>".$search_order_deal_record['FirstName']."</td>";
        echo "<td> ".$search_order_deal_record['LastName']."</td>"; 
		echo "<td> ".$search_order_deal_record['OrderID']."</td>";
        echo "<td> ".$search_order_deal_record['DealName']."</td>"; 
		echo "<td> ".$search_order_deal_record['Quantity']."</td>";
		echo "<td> ".$search_order_deal_record['Delivery']." </td></tr>"; 
		
		} 
    ?>
    </table>
   
</div>
<!------------------------------------------------------------------>
	<div class='one-third'>
	<h3>Choose an order to edit</h3> 
<?php
//Choose order to edit
$all_order_query = "SELECT `orders`.`OrderID`,`orders`.`CustomerID`, `customers`.`CustomerID`, `customers`.`FirstName`, `customers`.`LastName`
                    FROM `orders`, `customers`
					WHERE `orders`.`CustomerID` = `customers`.`CustomerID`
					ORDER BY `customers`.`FirstName` ASC"; 
$all_order_result = mysqli_query($dbcon, $all_order_query); 
$all_order_rows = mysqli_num_rows($all_order_result);  

//create a dynamic form 
echo "<form name = 'OrderID' action = 'custom_orders.php'>"; 
echo "<select name = 'OrderID' required>"; 
                    echo "<option value=>";
                    echo "Select order";
                    echo "</option>";
while ($all_order_record = mysqli_fetch_assoc ($all_order_result))
{ echo "<option value = '".$all_order_record['OrderID']."'>".$all_order_record['OrderID']." ".$all_order_record['FirstName']." ".$all_order_record['LastName']."</option>"; } 
echo "</select>"; 
echo " <input type = 'submit' value = 'Edit Order'> <br>"; 
echo "</form>"; 

$current_order_edit = '';
if (isset($_GET['OrderID'])) {
$current_order_edit = $_GET['OrderID']; 
}

if (!$current_order_edit) 
{ echo "Error:Please select a order to edit <br>"; 
$current_order_edit = 0; } 
//Search detail of the selected order
$current_order_edit_query = "SELECT `orders`.`OrderID` , `customers`.`FirstName`, `orders`.`Delivery` , `customers`.`LastName`, `orders`.`CustomerID` , `customers`.`CustomerID`
                        FROM `orders` , `customers`
                        WHERE `orders`.`OrderID` = '".$current_order_edit."'
                        AND `orders`.`CustomerID` = `customers`.`CustomerID`
						ORDER BY `orders`.`OrderID` ASC;";
                        
$current_order_edit_result = mysqli_query ($dbcon, $current_order_edit_query);
$current_order_edit_record = mysqli_fetch_assoc ($current_order_edit_result); 

?> 

<form name = 'custom_orders.php' method = 'post' action = 'Includes/process_order.php'> 

<input type = 'hidden' name = 'OrderID' value = '<?php echo $current_order_edit_record['OrderID']; ?>'> 
Customer: <br>
First Name: <input type = 'text' maxlength = "30" name = 'FirstName' readonly value = '<?php echo $current_order_edit_record['FirstName']; ?>'>
<br><br> 
Last Name: <input type = 'text' maxlength = "30" name = 'LastName' readonly value = '<?php echo $current_order_edit_record['LastName']; ?>'>
<br><br> 
Delivery: <input type = 'text' maxlength = "150" name = 'Delivery' required value = '<?php echo $current_order_edit_record['Delivery']; ?>'>
<br><br> 
Menu: <select name="MenuID" > 
                <?php
                    $menu_in_order_query = "SELECT `menu`.`MenuID`, `orderproducts`.`MenuID`, `menu`.`MenuName`, `orderproducts`.`OrderID`
                                        FROM `menu`, `orderproducts`
										WHERE `orderproducts`.`OrderID` = '".$current_order_edit."'
										AND `menu`.`MenuID` = `orderproducts`.`MenuID`
                                        ORDER BY `orderproducts`.`MenuID` ASC";
                    $menu_in_order_results = mysqli_query ($dbcon, $menu_in_order_query);
                    echo "<option value=>";
                    echo "Select Menu";
                    echo "</option>";
                    while ($displayname = mysqli_fetch_assoc($menu_in_order_results)) 
                    {echo "<option value = '".$displayname['MenuID']."'>".$displayname['MenuName']."</option>";
                    }
                ?>
        </select> <br>
Quantity: <input type = 'number' min="0" maxlength = "2" name = 'MenuQuantity'  >
<br><br>
Deal: <select name="DealID" > 
                <?php
                    $deal_in_order_query = "SELECT `deals`.`DealID`, `orderdeals`.`DealID`, `deals`.`DealName`, `orderdeals`.`OrderID`
                                        FROM `deals`, `orderdeals`
										WHERE `orderdeals`.`OrderID` = '".$current_order_edit."'
										AND `deals`.`DealID` = `orderdeals`.`DealID`
                                        ORDER BY `orderdeals`.`DealID` ASC";
                    $deal_in_order_results = mysqli_query ($dbcon, $deal_in_order_query);
                    echo "<option value=>";
                    echo "Select Deal";
                    echo "</option>";
                    while ($displayname = mysqli_fetch_assoc($deal_in_order_results)) 
                    {echo "<option value = '".$displayname['DealID']."'>".$displayname['DealName']."</option>";
                    }
                ?>
        </select> <br>
Quantity: <input type = 'number' min="0" maxlength = "2" name = 'DealQuantity'  >
<br><br> 

<input type = 'submit' name = 'submit' value = 'Update Order'> </form> 
	</div>
<!------------------------------------------------------------------>	
	<div class='one-third'>
	<h3>Remove Order</h3>
	<form name = 'order' method = 'post' action = 'custom_orders.php'> 
 
        <select name='OrderID' required> 
	<?php

                    $all_orders_query = "SELECT *
                                        FROM `orders`, `customers`
										WHERE `orders`.`CustomerID` = `customers`.`CustomerID`
                                        ORDER BY `orders`.`OrderID` ASC";
                    $all_orders_results = mysqli_query ($dbcon, $all_orders_query);
                    echo "<option value=>";
                    echo "Select Order";
                    echo "</option>";
                    while ($displayname = mysqli_fetch_assoc($all_orders_results)) 
                    {echo "<option value = '".$displayname['OrderID']."'>".$displayname['OrderID']." ".$displayname['FirstName']." ".$displayname['LastName']."</option>";
                    }
               
		echo "</select> <br> <input type='submit' name = 'submit' value = 'Choose Order'>";
		echo" </form> ";
		
	$current_order_delete = '';
if (isset($_POST['OrderID'])) {
$current_order_delete = $_POST['OrderID']; 
}
	$customer_order_query = "SELECT `customers`.`FirstName`, `customers`.`LastName`, `orders`.`OrderID`
                                        FROM `customers`, `orders`
										WHERE `orders`.`OrderID` = '".$current_order_delete."'
										AND `customers`.`CustomerID` = `orders`.`CustomerID`";
                    $customer_order_results = mysqli_query ($dbcon, $customer_order_query);
               $customer_order_record  = mysqli_fetch_assoc($customer_order_results);
echo " Order detail: <input type = 'text' maxlength = '30' name = 'CustomerID' readonly value = '".$customer_order_record['OrderID']." ".$customer_order_record['FirstName']." ".$customer_order_record['LastName']."'>
<br><br> ";


		echo"</form> <br>
	<form name = 'custom_orders.php' method = 'post' action = 'Includes/process_order.php'> ";
	echo"<input type = 'hidden' name = 'OrderID' value = '".$current_order_delete."'> ";
    echo "<input type='submit' name = 'submit' value = 'Remove Order'> ";
	?>
	</form>
	</div>
	<footer>
		<div>The image used for icon and logo in the website is made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
		<P>  &copy Copyright - Nont Fakungkun </p>
		</footer>
    
    