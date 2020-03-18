<?php
$thispage="Home";
session_start();
/*if(empty($_SESSION["userid"]))
{
	header("Location:../Signin.php");
}*/
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
	<form action="Complaint.php" method="POST" enctype="multipart/form-data">
		<div  style="margin-left:15px;width:300px; font-size:18px">
		<br><input type="text" name="desc" placeholder="Description of garbage" class="form-control">
		<br>
		Upload Your Pic
			<!--<input type="file" name="upic" required accept="image/jpeg image/gif image/png" onchange="readURL(this)" class="form-control">--><br>
			<input type="file" name="upic" accept="image/* " required>
			<img src="#" alt="Image of Garbage" id="disp">
			<!--<button class="btn btn-info">Upload</button>	-->
			<br>	<br>
<body onload="getLocation()">
<script>
function getLocation() 
	{
	alert("Called");
		if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition);
		}
		else { 
		z.innerHTML = "Geolocation is not supported by this browser.";
		}
	}


function showPosition(position) {
alert("Call");
	x=position.coords.latitude;
	y=position.coords.longitude;
  <?php $abc = "<script>document.write(x)</script>"?>  
			<?php $def = "<script>document.write(y)</script>"; ?>  
	}
</script>

			<input type="hidden"  name="lati" value="<?php echo 'php_'.$abc;?>">
			<input type="hidden"  name="long" value="<?php echo 'php_'.$def;?>">
			<button onclick="getLocation" class="btn btn-warning" id="but" style="margin-top:10px"> Submit </button><br><br><br>
		 </div>
	</form>
</body>