<!DOCTYPE html>
<?php
     include 'Includes/connection.php';

?>
<html lang="en"> <!--The lang attribute tells the browser that the language is going to be English-->

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" /><!--chartset attributes tells the browser that the charterset is utf-8-->
<title>Pizza Plaza - Menu</title>

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
	
	<a href="index.php" >Home</a>
	<a href="menu_search.php" class="current">Menu</a>
	<a href="customers.php" >Customers</a>
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
<div class ='half-left'>		
<h2>Search Menu</h2><!-- this is the content for the section--> 
<form name = 'menu_search.php' method = 'post' action = 'menu_search.php'> 
        <select name="menu" required> 
                <?php
				// Search all menu to pick one - drop down box
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
		<br>
            <input type="submit"> 
    </form> 
	    <br> Or use Search Bar <br> 
		<form name = 'menu_search' method = 'post' action = 'menu_search.php'> 
		<input type = 'text' maxlength = "35" name = 'menu_search' required> <br> 
		<input type = 'submit' name = 'submit' value = 'Search'> </form> 
		</form>
        <?php 
		$menu_search = '';
		if (isset($_POST['menu_search'])) {
			$menu_search = $_POST['menu_search'];
		}// Search bar query
		$menu_search_query = "SELECT * 
				FROM `menu` 
				WHERE `MenuName` 
				LIKE '".$menu_search."'";

$menu_search_result = mysqli_query($dbcon, $menu_search_query); 
$menu_search_results_record = mysqli_fetch_assoc($menu_search_result);
$menu_search_rows = mysqli_num_rows($menu_search_result); 
    //Show the amount of row found by search bar
    if (!$menu_search_rows){echo "";}
    else {
    if ($menu_search_rows > 0) { echo "<br> There were ".$menu_search_rows." results!!"; 
    } 
    else { echo "<br> No results found!"; } 
    }
?> 
	  <?php 
    //Get info from the $_POST array 
	$menu = '';
	if (isset($_POST['menu'])) {
    $menu = $_POST['menu'];
	}
    //Search detail of selected menu
    $menu_query = "SELECT *
                    FROM `menu`
                    WHERE `menu`.`MenuID` = '".$menu."' 
                    ORDER BY `menu`.`MenuName` ASC "; 

    $menu_results = mysqli_query ($dbcon, $menu_query); 
	
    //search recipes includes in menu
    $recipes_query = "SELECT `recipes`.`RecipeName`, `recipes`.`Calories`
                    FROM `recipes`, `menu`, `menurecipes`
                    WHERE `menu`.`MenuID` = '".$menu."' 
					AND `recipes`.`RecipeID` = `menurecipes`.`RecipeID`
					AND `menu`.`MenuID` = `menurecipes`.`MenuID`
                    ORDER BY `recipes`.`RecipeID` ASC"; 
                    
    $recipes_results = mysqli_query ($dbcon, $recipes_query); 
	$menu_results_record = mysqli_fetch_assoc($menu_results);
    
    $recipes_search_query = "SELECT `recipes`.`RecipeName`, `recipes`.`Calories`
                    FROM `recipes`, `menu`, `menurecipes`
                    WHERE `menu`.`MenuName` 
                    LIKE '".$menu_search."' 
					AND `recipes`.`RecipeID` = `menurecipes`.`RecipeID`
					AND `menu`.`MenuID` = `menurecipes`.`MenuID`
                    ORDER BY `recipes`.`RecipeID` ASC"; 
                    
    $recipes_search_results = mysqli_query ($dbcon, $recipes_search_query); 
	
    ?> 
	
    <br><br> 
    <p><h2>Menu details</h2></p> 
	<br>
    <table>
	<tr>
	
    <th>Menu Name</th>
    <th>Description</th> 
    <th>Calories</th>
	<th>Price</th>
  </tr>
  <?php
  // display result in table as long as there is a row exists
  if (!$menu_results_record){}
  else {echo "<tr>
    <td>".$menu_results_record['MenuName']."</td>
    <td>".$menu_results_record['Description']."</td>
    <td>".$menu_results_record['Calories']." kJ</td>
	<td>$".$menu_results_record['Price']."</td>
  </tr>"; }
  
if (!$menu_search_results_record){}
  else {
  echo "<tr>
    <td>".$menu_search_results_record['MenuName']."</td>
    <td>".$menu_search_results_record['Description']."</td>
    <td>".$menu_search_results_record['Calories']." kJ</td>
	<td>$".$menu_search_results_record['Price']."</td>";
  }	
?>
  </tr>
</table>
<br>
<div class="menu-pic"> <!-- Display an image -->
	<?php if (!$menu_results_record['MenuName'] ) {}
	else{
	echo "<img src='Images/".$menu_results_record['MenuName'].".png'>"; }
	
	if (!$menu_search_results_record['MenuName'] ) {}
	else{
	echo "<img src='Images/".$menu_search_results_record['MenuName'].".png'>"; }
	?>
	</div>
<br> <h3>Recipes in Pizza </h3> <br>
<table>
	<tr>
    <th>Recipe Name</th>
    <th>Calories</th>
  </tr>
  <?php
   // display recipes in table as long as there is a row exists
  while($recipes_results_record = mysqli_fetch_assoc($recipes_results)){
  echo "<tr>
    <td>".$recipes_results_record['RecipeName']."</td>
    <td>".$recipes_results_record['Calories']." kJ</td>
  </tr>"; }
  while($recipes_search_results_record = mysqli_fetch_assoc($recipes_search_results)){
  echo "<tr>
    <td>".$recipes_search_results_record['RecipeName']."</td>
    <td>".$recipes_search_results_record['Calories']." kJ</td>"; }
?>
  </tr>
</table>
	
	
	</div>
	
	<div class ='half-right'>	
	
	<h2>Search Deal</h2><!-- this is the content for the section--> 
<form name = 'menu_search.php' method = 'post' action = 'menu_search.php'> 
        <select name="deal" required> 
                <?php
					//search all deal
                    $all_names_query = "SELECT *
                                        FROM `deals`
                                        ORDER BY `deals`.`DealName` ASC";
                    $all_names_results = mysqli_query ($dbcon, $all_names_query);
                    echo "<option value=>";
                    echo "Select Deal";
                    echo "</option>";
                    while ($displayname = mysqli_fetch_assoc($all_names_results)) 
                    {echo "<option value = '".$displayname['DealID']."'>".$displayname['DealName']."</option>";
                    }
                ?>
                
        </select> 
            <input type="submit"> 
    </form> 
	  <?php 
    //Get info from the $_POST array 
	$deal = '';
	if (isset($_POST['deal'])) {
    $deal = $_POST['deal']; 
	}
    
    //search detail of selected deal
    $deal_query = "SELECT `deals`.`DealName`, `deals`.`Description`, `deals`.`Price`
                    FROM `deals`
                    WHERE `deals`.`DealID` = '".$deal."' "; 

    $deal_results = mysqli_query ($dbcon, $deal_query); 

	//search product includes in the selected deal
	$dealproduct_query = "SELECT `menu`.`MenuName`, `menu`.`Description`, `menu`.`Calories`, `menu`.`Price`
                    FROM `deals`, `menu`, `dealproducts`
                    WHERE `deals`.`DealID` = '".$deal."' 
					AND `deals`.`DealID` = `dealproducts`.`DealID`
					AND `menu`.`MenuID` = `dealproducts`.`MenuID`
                    ORDER BY `menu`.`MenuID` ASC"; 
					
    $dealproduct_results = mysqli_query ($dbcon, $dealproduct_query); 
    ?> 
    <br><br>
    <p><h2>Deal details</h2></p> 
		<br>
    <table>
	<tr>
	
    <th>Deal Name</th>
    <th>Description</th> 
	<th>Price</th>
  </tr>
  <?php
  //display deal details
  while($menu_results_record = mysqli_fetch_assoc($deal_results)){
  echo "<tr>
    <td>".$menu_results_record['DealName']."</td>
    <td>".$menu_results_record['Description']."</td>
	<td>$".$menu_results_record['Price']."</td>";}
?>
  </tr>
</table>

<br> <h3>Deal includes </h3> <br>
<table>
	<tr>
    <th>Menu Name</th>
    <th>Description</th> 
    <th>Calories</th>
	<th>Price</th>
  </tr>
  
  <?php
  //display menu within the deal
  while($dealproduct_record = mysqli_fetch_assoc($dealproduct_results)){
  echo "<tr>
    <td>".$dealproduct_record['MenuName']."</td>
    <td>".$dealproduct_record['Description']."</td>
    <td>".$dealproduct_record['Calories']." kJ</td>
  <td>$".$dealproduct_record['Price']."</td>";}
?>
  </tr>
</table>
    </table>
	</div>

<br><br>
<footer>
		<div>The image used for icon and logo in the website is made by <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" 			    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 			    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
		<P>  &copy Copyright - Nont Fakungkun </p>
		</footer>
