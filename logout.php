<?php
    session_start(); 
    //set up SESSION to any value other than 1, delete the privilege
	include 'Includes/connection.php';
    $_SESSION['admin'] = 0; 
	session_destroy(); 
	$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/index.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0;"URL=' . $URL . '">';

?>

