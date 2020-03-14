<?php
    session_start();
 include 'Includes/connection.php';
 ?>
 
<!DOCTYPE html><!-- Tells the program what type of language will be used on the document -->  
<html>

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" /> <!--chartset attributes tells the browser that the charterset is utf-8-->
<title>Pizza Plaza - Customers</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="CSS/stylesheet.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" type="image/png" href="Images/logo.png"/>
</head>

<body>

	<header>
	<a href="index.php", id="logo"> <img src="Images/logo.png"/> </a>
	<p class="title">Pizza Plaza</p>
	<div class="navbar" id="navbar">
	
	<a href="index.php">Home</a>
	<a href="menu_search.php" >Menu</a>
	<a href="customers.php" class="current">Customers</a>
	<a href="order.php" >Order |</a>
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
	</header>
	
<br><br><br>
<div class ='half-left'>	
	<h3>Choose a customer to display details</h3>   			
    <form method = "POST" size "3"> 
        <select name="customer" required> 
					
                <?php
				// Search for a customer on all customer list
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
            <input type="submit"> 
    </form> 
	
    <?php 
    
	$customer = '';
	if (isset($_POST['customer'])) {
    $customer = $_POST['customer']; 
	}
 
//FInd the customer details
    $customer_query = "SELECT *
                    FROM `customers`
                    WHERE `customers`.`CustomerID` = '".$customer."' 
                    ORDER BY `customers`.`LastName` ASC "; 
                    

    $customer_results = mysqli_query ($dbcon, $customer_query); 

    ?> 
    <p><h3>Customer details</h3></p> 
	<br>
	<table>

  <?php
  while($record = mysqli_fetch_assoc($customer_results)){
	//Read each field of data for displaying the value separately
  echo "
	<tr>
	<th>First Name</th>
    <td>".$record['FirstName']."</td>
	</tr>
	<th>Last Name</th>
    <td>".$record['LastName']."</td>
	</tr>
	<th>Address</th>
    <td>".$record['StreetNum']." ".$record['Street']." ".$record['Suburb']." ".$record['City']." ".$record['Postcode']."</td>
    </tr>
	<th>Telephone</th>
	<td>".$record['Telephone']."</td>
	</tr>
	<th>BirthDate</th>
    <td>".$record['BirthDate']."</td>
	</tr>
	<th>DateJoined</th>
    <td>".$record['DateJoined']."</td>
	</tr>
	<th>Email</th>
    <td>".$record['Email']."</td>
	</tr>"; }
    ?>
	</table>
</div>	
<br>		
<div class ='half-right'>	
	<h3>Add a customer to the database</h3> 
    <form name = 'athletics' method = 'post' action = 'Includes/process_customer.php'> <br> 
	<!--  Input value will be taken to the next page once the button is clicked -->
    First name*:   <input type="text" name="FirstName" maxlength="30" required><br> <br> 
    Last name*:   <input type="text" name="LastName" maxlength="30" required><br><br>  
    Number*: <input type="text" name="StreetNum" maxlength="8" required><br><br>  
	Street*: <input type="text" name="Street" maxlength="50" required><br><br> 
    Suburb*: <input type="text" name="Suburb" maxlength="20" required><br> <br> 
    City*: <input type="text" name="City" maxlength="20" required><br> <br> 
	Postcode*: <input type="number" min="0" name="Postcode" maxlength="6" required><br><br>
	Telephone: <input type="tel" name="Telephone" maxlength="13"><br><br> 
	Date of Birth: <input type="date" name="BirthDate" maxlength="12"><br><br> 
	Date Joined(Today): <input type="date" name="DateJoined" maxlength="12"><br><br>
	Email: <input type="text" name="Email" maxlength="30"><br><br>
	(* is the required field)<br> <br>
    <input type='submit' name = 'submit' value = 'Add Customer'> 
    </form> 
</div>    
	<footer>
		<div>The image used for icon and logo in the website is made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
		<P>  &copy Copyright - Nont Fakungkun </p>
		</footer>
    