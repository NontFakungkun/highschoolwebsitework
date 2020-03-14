<?php
    session_start();
 include 'Includes/connection.php';
 ?>
 
<!DOCTYPE html><!-- Tells the program what type of language will be used on the document -->  
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

	</head>

	<header>
	<a href="index.php", id="logo"> <img src="Images/logo.png"/> </a>
	<p class="title">Pizza Plaza</p>
	<div class="navbar" id="navbar">
	
	<a href="index.php">Home</a>
	<a href="menu_search.php" >Menu</a>
	<a href="customers.php" >Customers</a>
	<a href="order.php" class="current">Order |</a>
	<a href="custom_menu.php" >Add/Edit Menu</a>
	<a href="custom_deals.php" >Add/Edit Deals</a>
	<a href="edit_customers.php" >Edit Customers</a>
	<a href="custom_orders.php" >Search/Edit Orders |</a>
	<a href="login.php" >Log in</a>
	<a href="logout.php" >Log out</a>

		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
		</a>
	</div>
		<script>
		function myFunction() {
		var x = document.getElementById("navbar");
		if (x.className === "navbar") {
		x.className += " responsive";
  } else {
    x.className = "navbar";
  }
}
</script>
	</header>
	
	<br><br><br><br><br><br>
    <form name = 'order.php' method = 'post' action = 'Includes/process_order.php' class='middle'> 
	<h2>Start Order</h2>   	
	<br>
	<h3>Customer: </h3>
        <select name="CustomerID" required>      
                <?php
				// Choose a customer
                    $all_names_query = "SELECT *
                                        FROM `customers`
                                        ORDER BY `customers`.`FirstName` ASC";
                    $all_names_results = mysqli_query ($dbcon, $all_names_query);
                    echo "<option value=>";
                    echo "Select customer";
                    echo "</option>";
                    while ($displayname = mysqli_fetch_assoc($all_names_results)) 
                    {echo "<option value = '".$displayname['CustomerID']."'>".$displayname['FirstName']." ".$displayname['LastName']."</option>";
                    }
                ?>
                
        </select> 
			<br><br>
       <!-- Delivery or Pick up choice -->
        <input type="radio" name="Delivery" value="Delivery" required> Delivery<br>
		<input type="radio" name="Delivery" value="Pick Up" required> Pick Up<br>
        <input type='submit' name = 'submit' value="Start Order">
		</form>
		
	



	<footer>
	<div>The image used for icon and logo in the website is made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/"    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
	<P>  &copy Copyright - Nont Fakungkun </p>
	</footer>
    