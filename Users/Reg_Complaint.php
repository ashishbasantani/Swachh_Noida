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
		<title>Register Complaint</title>
		<link href="../bootstrap.min.css" rel="stylesheet">
		<script>
			function readURL(input)
			{
				if(input.files && input.files[0])
				{
					var reader=new FileReader();
					reader.onload=function(e)
					{
						$('#disp').attr('src',e.target.result).width(100).height(80)
					};
					reader.readAsDataURL(input.files[0]);
				}
			}
		</script> 
		
	</head>
	<body onload="getLocation()">
	<form action="Complaint.php" method="POST" enctype="multipart/form-data">
		<div  style="margin-left:15px;width:300px; font-size:18px">
		<br><input type="text" name="desc" placeholder="Description of garbage" class="form-control">
		<br>
		Upload Pic
		<br>
			<input type="file" name="upic" accept="image/* ;camera=capture" required onclick="loadFileAsText()">
			<br>	<br>
				<textarea id="x" name="h1" hidden></textarea>
				<textarea id="y" name="h2" hidden></textarea>
<script>
			var x=0;
			var y=0;
			function getLocation() 
				{
				alert("called");
					if (navigator.geolocation)
					{
						navigator.geolocation.getCurrentPosition(showPosition);
					}
					else
					{ 
					alert("else");
						z.innerHTML = "Geolocation is not supported by this browser.";
					}
				}
	
	
			function showPosition(position) 
			{
				x=position.coords.latitude;
				y=position.coords.longitude;alert("call");
				
			}	
			function loadFileAsText(){

					  document.getElementById("x").value = x;
					   document.getElementById("y").value = y
				  }
			
</script>
			
			<button class="btn btn-warning" id="but" style="margin-top:10px"> Submit </button><br><br>
		 </div>
	</form>

