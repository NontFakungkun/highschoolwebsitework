<?php 
session_start();
$_SESSION['warning'] = 0;
$username = $_POST['username']; 
$password = $_POST['password']; 
//if username or password is NULL then header directs to login page 
if (!$username || !$password) { 
$URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/login.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0;"URL=' . $URL . '">'; 
}  
include 'connection.php';
$hash_pass = MD5($password); //translate password with MD5 encryption so it is harder to be hacked
//run a query to see if the details match
$pass_check_query = "SELECT * 
                    FROM `users`
                    WHERE `Username` = '".$username."'
                    AND `Password` = '".$hash_pass."'"; 
$pass_check_result = mysqli_query ($dbcon, $pass_check_query); 
$pass_check_rows = mysqli_num_rows($pass_check_result);
//if no row, back to login page
if($pass_check_rows<1) {
	echo "<script>alert('Wrong username or password!') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/index.php' </script>";
    $URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/login.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0;"URL=' . $URL . '">'; 
} 
// if 1 row shows, bring to index page with access to all pages
else{
    $_SESSION['admin'] = 1;
    echo "<script>alert('You have logged in!') </script>";
    echo "<script>window.location'http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/index.php' </script>";
    $URL="http://nontfakungkun.student.bdsc.school.nz/Pizza%20Plaza%20(AS91633)/index.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content=0; "URL=' . $URL . '">'; //page directed to index
} 

?> 
