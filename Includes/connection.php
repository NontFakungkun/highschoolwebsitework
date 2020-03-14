<?php
//used for connection to the database in phpmyadmin
$dbcon = mysqli_connect ("localhost", "nontfakungkun", "Pass2019", "nontfaku_pizzaplaza");
	if ($dbcon == NULL) {
		echo "Cannot connect to database.";
        exit();
    }
    else
        echo "Successfully connected to database.";
?>