<?php
$thispage="Home";
session_start();
if(empty($_SESSION["userid"]))
{
	header("Location:../Login.php");
}
$id=$_SESSION["userid"];
include "Connect.php";
$obj=new Operations;
$uid=$obj->get($id);
?>

<html>
	<head>
		<title>Register Complaint</title>
		<link href="../bootstrap.min.css" rel="stylesheet">
	</head>
<?php
		$obj->fetch($uid);
?>		
		

		