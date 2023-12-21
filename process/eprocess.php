<?php
session_start();
require_once ('dbh.php');

$email = $_POST['mailuid'];
$password = $_POST['pwd'];

$sql = "SELECT * from `employee` WHERE email = '$email' AND password = '$password'";
$sqlid = "SELECT id from `employee` WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $sql);
$id = mysqli_query($conn , $sqlid);

$empid = "";
if(mysqli_num_rows($result) == 1){
	$asso = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $asso['email'];
	$employee = mysqli_fetch_array($id);
	$empid = ($employee['id']);
	
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('LOGIN SUCCESSFUL!')
    window.location.href='..//eloginwel.php?id=$empid';
    </SCRIPT>");

}

else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Email or Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}
?>