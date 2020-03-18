<?php
$thispage="Home";
session_start();
if(empty($_SESSION["userid"]))
{
header("Location:../Signin.php");
}
$umail=$_SESSION["userid"];
?>
<html>
	<head>
		<title>Home</title>
		<script src="jquery.min.js"></script>
		<script>
			$(document).ready(function()
			 {	
			 
				$("#a1").hide();
				$("#a2").hide();
				
				$("#q1").click(function(){
				$("#a1").slideToggle();
				$("#a2").hide();
				});
				
				$("#q2").click(function(){
				$("#a2").slideToggle();
				$("#a1").hide();
				});
			});	
		</script>
	</head>
<?php
	include_once "Header.php"
?>
<div style="margin-top:200px;">
	<p id=q1 style="height:70px;width:200px;margin-left:100px;text-align:center;font-family:Forte;font-size:20px;border:2px solid blue;">
		Register a new Complaint
	</p>
	<div id=a1 style="width:250px;margin-left:200px;float:right;position:absolute;right:650px;top:250px;">
		<iframe src="Reg_Complaint.php"  scrolling="auto" frameborder=0 width="750" style="border:5px solid black;">
		</iframe>
	</div>
	<p id=q2 style="height:70px;width:200px;margin-left:100px;text-align:center;font-family:Forte;font-size:20px;border:2px solid blue;">
		View Complaint <br>Status
	</p>
	<div id=a2 style="width:250px;margin-left:200px;float:right;position:absolute;right:650px;top:250px;">
		<iframe src="Comp_status.php" width="750" scrolling="auto" frameborder=0 style="border:5px solid black;">
		</iframe>
	</div>
</div>
<?php
	include "Footer.php";
?>	