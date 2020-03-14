<?php
    session_start();
 include 'Includes/connection.php';
 $last_order_id = $_SESSION['last_order_id'];
 ?>
 
<!DOCTYPE html>
<html>

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" /> <!--chartset attributes tells the browser that the charterset is utf-8-->
<title>Pizza Plaza - Order</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="CSS/stylesheet.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" type="image/png" href="Images/logo.png"/>
</head>

<body>

	<header>
	<div id="logo"> <img src="Images/logo.png"/> </div>
		 <p class="title2">Pizza Plaza</p>

	</header>
	
	<br><br><br><br><br><br>
	<div class='one-third'>
	<h3>Add Menu</h3>
	<form name = 'order-product.php' method = 'post' action = 'Includes/process_order.php'> 
        <select name="MenuID" required> 
     <?php
                    $all_menu_query = "SELECT *
                                        FROM `menu`
                                        ORDER BY `menu`.`MenuID` ASC";
                    $all_menu_results = mysqli_query ($dbcon, $all_menu_query);
                    echo "<option value=>";
                    echo "Select Menu";
                    echo "</option>";
                    while ($display_menu = mysqli_fetch_assoc($all_menu_results)) 
                    {echo "<option value = '".$display_menu['MenuID']."'>".$display_menu['MenuName']."</option>";
                    }
                ?>         

        </select> <br><br>
		Quantity: <br><input type = 'number' min="0" maxlength = "2" name = 'MenuQuantity' required >
		<br><br>
		<input type="submit" name = 'submit' value = 'Add This Menu'>  
		</form>
	</div>

	<div class='one-third'>
	<h3>Add Deal</h3>
	<form name = 'order-product.php' method = 'post' action = 'Includes/process_order.php'> 
        <select name="DealID" required> 
     <?php
                    $all_deals_query = "SELECT *
                                        FROM `deals`
                                        ORDER BY `deals`.`DealID` ASC";
                    $all_deals_results = mysqli_query ($dbcon, $all_deals_query);
                    echo "<option value=>";
                    echo "Select Deal";
                    echo "</option>";
                    while ($display_deal = mysqli_fetch_assoc($all_deals_results)) 
                    {echo "<option value = '".$display_deal['DealID']."'>".$display_deal['DealName']."</option>";
                    }
                ?>         

        </select> <br><br>
		Quantity: <br><input type = 'number' min="0" maxlength = "2" name = 'DealQuantity' required >
		<br><br>
		<input type="submit" name = 'submit' value = 'Add This Deal'>  
		</form>
	</div>
	
	<div class='one-third'>
	<?php
	
	$total_price = 0;
		echo "<h3>Order Detail</h3> <br> ";
		
		$current_order_query = "SELECT `orders`.`OrderID`,`orders`.`CustomerID`,`customers`.`CustomerID`,`customers`.`FirstName`,`customers`.`LastName`,`orders`.`Delivery`
                            FROM `orders`, `customers`
							WHERE `orders`.`OrderID` = '".$last_order_id."'
							AND `orders`.`CustomerID` = `customers`.`CustomerID`
							ORDER BY `orders`.`OrderID` ASC";
        $current_order_result = mysqli_query ($dbcon, $current_order_query);

		while ($display_order = mysqli_fetch_assoc($current_order_result)) 
		{echo "".$display_order['FirstName']." ".$display_order['LastName']." - ".$display_order['Delivery']."";}
		

		echo "<br><br> You may update your addrees if you want <br>Your Address: <br>";
		$current_order_address_query = "SELECT `orders`.`OrderID`,`orders`.`CustomerID`,`customers`.`CustomerID`,`customers`.`StreetNum`,`customers`.`Street`,`customers`.`Suburb`,`customers`.`City`,`customers`.`Postcode`
                            FROM `orders`, `customers`
							WHERE `orders`.`OrderID` = '".$last_order_id."'
							AND `orders`.`CustomerID` = `customers`.`CustomerID`
							ORDER BY `orders`.`OrderID` ASC";
        $current_order_address_result = mysqli_query ($dbcon, $current_order_address_query);
		$current_order_address_record = mysqli_fetch_assoc($current_order_address_result);
		echo " 
		<form name = 'prder_product.php' method = 'post' action = 'Includes/process_order.php'> 

<input type = 'hidden' name = 'CustomerID' value = '".$current_order_address_record['CustomerID']."'>
Street Number: <input type = 'text' maxlength = '8' name = 'StreetNum' required value = '".$current_order_address_record['StreetNum']."'>
<br><br>
Street: <input type = 'text' maxlength = '50' name = 'Street' required value = '".$current_order_address_record['Street']."'>
<br><br>
Suburb: <input type = 'text' maxlength = '20' name = 'Suburb' required value = '".$current_order_address_record['Suburb']."'>
<br><br> 
City: <input type = 'text' maxlength = '20' name = 'City' required value = '".$current_order_address_record['City']."'>
<br><br>
Postcode: <input type = 'number' min='0' maxlength = '6' name = 'Postcode' required value = '".$current_order_address_record['Postcode']."'>
<br><br>
<input type = 'submit' name = 'submit' value = 'Update Address'> </form> ";
		
		$current_order_menu_query = "SELECT `orderproducts`.`OrderID`,`orderproducts`.`MenuID`,`orderproducts`.`Quantity`,`menu`.`MenuID`,`menu`.`MenuName`,`menu`.`Description`,`menu`.`Calories`,`menu`.`Price`
                            FROM `orderproducts`, `menu`
							WHERE `orderproducts`.`OrderID` = '".$last_order_id."'
							AND `orderproducts`.`MenuID` = `menu`.`MenuID`
							ORDER BY `menu`.`MenuID` ASC";
        $current_order_menu_result = mysqli_query ($dbcon, $current_order_menu_query);
		
		$current_order_deal_query = "SELECT `orderdeals`.`OrderID`,`orderdeals`.`DealID`,`orderdeals`.`Quantity`,`deals`.`DealID`,`deals`.`DealName`,`deals`.`Description`,`deals`.`Price`
                            FROM `orderdeals`, `deals`
							WHERE `orderdeals`.`OrderID` = '".$last_order_id."'
							AND `orderdeals`.`DealID` = `deals`.`DealID`
							ORDER BY `deals`.`DealID` ASC";
        $current_order_deal_result = mysqli_query ($dbcon, $current_order_deal_query);
		
		
		
		echo  "<br> <h3>Menu </h3>";
	
	?>
		<table>
	<tr>
	
    <th>Menu - Quantity</th>
    <th>Description</th> 
    <th>Calories</th>
	<th>Price</th>
	<th> </th>
  </tr>
  <?php
  while ($display_menu = mysqli_fetch_assoc($current_order_menu_result)) {
						$multiplied_menu_price = $display_menu['Price'] * $display_menu['Quantity'];
						$total_price += $multiplied_menu_price;
				echo "
				<form name = 'order-product.php' method = 'post' action = 'Includes/process_order.php'>
				<input type = 'hidden' name = 'MenuID' value = '".$display_menu['MenuID']."'>
				<tr>
    <td>".$display_menu['MenuName']." x ".$display_menu['Quantity']."</td>
    <td>".$display_menu['Description']."</td>
    <td>".$display_menu['Calories']." kJ</td>
	<td>$".$multiplied_menu_price."</td>
	<td><input type='submit' name = 'submit' value = 'Cancel This Menu'></td>
	</form>
  </tr>"; }
?>

		</table>
		<br> <h3>Deal(s) </h3> 
		<table>
	<tr>
	
    <th>Deal - Quantity</th>
    <th>Description</th> 
	<th>Price</th>
	<th> </th>
  </tr>
<?php
		while ($display_deal = mysqli_fetch_assoc($current_order_deal_result)) {
						$multiplied_deal_price = $display_deal['Price'] * $display_deal['Quantity'];
						$total_price += $multiplied_deal_price;
				echo "
				<form name = 'order-product.php' method = 'post' action = 'Includes/process_order.php'>
				<input type = 'hidden' name = 'DealID' value = '".$display_deal['DealID']."'>
				<tr>
    <td>".$display_deal['DealName']." x ".$display_deal['Quantity']."</td>
    <td>".$display_deal['Description']."</td>
	<td>$".$multiplied_deal_price."</td>
	<td><input type='submit' name = 'submit' value = 'Cancel This Deal'></td>
	</form>
  </tr>"; }

		echo "</table>
		<br> <h3>Total Price: $".$total_price." </h3>";
	?>
	<br><br>
	<form name = 'order-product.php' method = 'post' action = 'Includes/process_order.php'> 
    <input type="submit" name = 'submit' value = 'Cancel Order'>
	</form>
	<br><br>
	<form name = 'order-product.php' method = 'post' action = 'Includes/process_order.php'> 
	<input type = 'hidden' name = 'OrderPrice' value = '<?php echo "".$total_price."";?>'>
    <input type="submit" name = 'submit' value = 'Place Order'>
	</form>
	</div>
	<footer>
	<div>The image used for icon and logo in the website is made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/"    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
	<P>  &copy Copyright - Nont Fakungkun </p>
	</footer>
    