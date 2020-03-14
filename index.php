<?php
	session_start();
    include 'Includes/connection.php';
	if (empty($_SESSION['admin'])) {
    $_SESSION['admin'] = 0;
}
    if ($_SESSION['admin'] != 1){ 
    echo "You are not logged in"; }
	else {echo "You are now logged in";}
?>
<!DOCTYPE html>
<html lang="en"> <!--The lang attribute tells the browser that the language is going to be English-->

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" /><!--chartset attributes tells the browser that the charterset is utf-8-->
<title>Pizza Plaza</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="CSS/stylesheet.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" type="image/png" href="Images/logo.png"/>
</head>

	<header>
	<a href="index.php", id="logo"> <img src="Images/logo.png"/> </a>
	<p class="title">Pizza Plaza</p>
	<div class="navbar" id="navbar">
	
	<a href="index.php" class="current">Home</a>
	<a href="menu_search.php" >Menu</a>
	<a href="customers.php" >Customers</a>
	<a href="order.php" >Order |</a>
	<a href="custom_menu.php" >Add/Edit Menu</a>
	<a href="custom_deals.php" >Add/Edit Deals</a>
	<a href="edit_customers.php" >Edit Customers</a>
	<a href="custom_orders.php" >Search/Edit Orders |</a>
	<a href="login.php" >Log in</a>
	<a href="logout.php" >Log out</a>

		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i> <!-- Navigation bar icon for handling the minimiseds creen -->
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

	<body class='background'>
	<br><br><br><br><br><br>
	<div class='welcome'>
	Welcome to Pizza Plaza. Have a good one!
	</div> <br>
	<div class='underline'> </div>
	
	<div class="order-tab">
		<p class="order-text">Feel like to have a great pizza meal? Place Your Order NOW!</p>
		<div class='button-holder'>
		<a class="order-button" href="order.php">Order</a>
		</div>
	</div>
	<!-- Choice bars -->
	<div class='warp'>
	<section class="one-third">
			<a href="menu_search.php">
			<h4>Menu & Deal</h4>
			
	</section>
	
	<section class="one-third">
			<a href="customers.php">
			<h4>Customers</h4>
			
		</section>
	
	<section class="one-third">
			<a href="edit_customers.php">
			<h4>Edit Customers</h4>

	</section>
		
	<section class="one-third">
			<a href="custom_menu.php"> 
			<h4>Custom Menu</h4>
			
		</section>
	
	<section class="one-third">
			<a href="custom_deals.php"> 
			<h4>Custom Deal</h4>
			
	</section>
	
	<section class="one-third">
			<a href="custom_orders.php"> 
			<h4>Custom Order</h4>

	</section>
	</div>
</body>
		
		<footer>
		<div>The image used for icon and logo in the website is made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
		<P>  &copy Copyright - Nont Fakungkun </p>
		</footer>
		
</html>