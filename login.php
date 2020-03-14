<?php
    session_start();
	if (empty($_SESSION['admin'])) {
    $_SESSION['admin'] = 0;
    
}
if (empty($_SESSION['warning'])){  $_SESSION['warning'] = 0;}
    if ($_SESSION['admin'] != 0){ 
    $URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/index.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0;"URL=' . $URL . '">';

    exit(); 
 }  
 include 'Includes/connection.php';
 ?>
<!DOCTYPE html>
<html lang="en"> 

<head>

<meta http-equiv="content-type"  content="text/html; charset=utf-8" /> <!--chartset attributes tells the browser that the charterset is utf-8-->
<title>Pizza Plaza - Login</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- For importing bar icon -->
<link rel="stylesheet" type="text/css" href="CSS/stylesheet.css"/>
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
	<a href="order.php" >Order |</a>
	<a href="custom_menu.php" >Add/Edit Menu</a>
	<a href="custom_deals.php" >Add/Edit Deals</a>
	<a href="edit_customers.php" >Edit Customers</a>
	<a href="custom_orders.php" >Search/Edit Orders |</a>
	<a href="login.php" class="current">Log in</a>
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
<div class="middle"> <!-- put content on the middle of the page--> 
<h2>Login</h2>
<form name = 'login.php' method = 'POST' action = 'Includes/process_login.php'> 
Username: <input type = 'text' maxlength = "30" name = 'username' required> 
<br><br> 
Password: <input type = 'password' maxlength = "30" name = 'password' required> 
<br> 

<br><br>
<input type = 'submit' name = 'submit' value = 'Login'>
</form> 

</div>
</body>

<footer>
		<div>The image used for icon and logo in the website is made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
		<P>  &copy Copyright - Nont Fakungkun </p>
		</footer>