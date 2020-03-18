<?php
$thispage="Home";
session_start();
/*if(empty($_SESSION["userid"]))
{
header("Location:../Signin.php");
}*/
include "Header.php";

	echo $_SESSION["userid"];
	echo $_GET["wid"];
?>
<html>
	<head>	
		<title>Jobs</title>
		<style>
			img
			{
				width:10%;
				height:10%;
				margin-left:20px;
				margin-right:20px;
				float:left;
			}
		</style>	
		<script>
			function clicked(file)
			{
				/*var a=new XMLHttpRequest();
			  a.open("GET", "getdetails.php?fname="+file,true);
			  a.send();
			  a.onreadystatechange=function test1()
			  {	
				if(a.readyState==4)
				 document.getElementById("info").innerHTML=a.responseText; 
			  }
			  document.getElementById("info").innerHTML=file;*/
			  alert("called");
			  
			}
		</script>
	</head>
<?php
	$dir=opendir("../Users/Complaints/Pending");
	while($file=readdir($dir))
	{
		if($file!=".." && $file!=".")
		{
				echo "<figure>";
				echo "<img src='../Users/Complaints/Pending/$file' onclick='clicked()'>";
				echo "</figure>";		
		}
	}	

?>
<div id="info" style="border:2px solid black;width:200px;height:50px;"> </div>



<?php
	include "Footer.php";
?>