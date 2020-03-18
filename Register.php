<?php
 $thispage="Register";	
	include "Header.php";
	include "Reg_class.php";
?>
<html>
 <head>
	<title>Register</title>
	<script src="jquery.min.js"></script>
	<script>
	    $(document).ready(function()
		 {	

			$("#a1").show();
			$("#a2").hide();
			$("#a3").hide();
			
			$("#q1").click(function(){
			$("#a1").slideToggle();
			$("#a2").hide();
			$("#a3").hide();
			});
			
			$("#q2").click(function(){
			$("#a2").slideToggle();
			$("#a1").hide();
			$("#a3").hide();
			});
			
			$("#q3").click(function(){
			$("#a3").slideToggle();
			$("#a1").hide();
			$("#a2").hide();
			});
		});
		
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
 <body>
	<div style="padding:2%;background-color:#E0E0E0;width:550px;height:800px;margin-left:30%;font-size:30px;
				text-align:center;font-family:Arial;font-size:22px;margin-top:70px">
		<p style="font-size:40px">REGISTER</p>
		<br>
		<input type="radio" name="choice" value="user"  checked="checked" id="q1"> User&nbsp
		<input type="radio" name="choice" value="worker" id="q2"> Worker&nbsp
		<input type="radio" name="choice" value="Sector Incharge" id="q3"> Sector Incharge 

	
	<div id="a1" style="height:400px; width:300px;margin-left:20%;margin-top:50px;font-size:16px;">
	<form  autocomplete=off method="post" action="Save_User.php">
		<?php
			$obj=new reg;
			$obj->register();
		?>	
		<button class="btn btn-warning btn-lg" id="but"> Register </button><br><br><br>
	</form>
	</div>		
	<div id="a2" style="height:600px; width:300px;margin-left:20%;margin-top:50px;font-size:17px;">
	<form  autocomplete=off method="post" action="Save_Worker.php" enctype="multipart/form-data">
		  <input type="text" name="wid" placeholder="Worker id" required  class="form-control">
		  <br>
		<?php
			$obj=new reg;
			$obj->register();
		?>	
		Upload Your Pic
			<input type="file" name="upic" required accept="image/jpeg image/gif image/png" onchange="readURL(this)"><br>
			<img src="#" alt="Your Image" id="disp">
			<br>	
		 <button class="btn btn-warning btn-lg" id="but" style="margin-top:10px"> Register </button><br><br><br>
	</form>
	</div>
	
	<div id="a3" style="height:500px; width:300px;margin-left:20%;margin-top:50px;font-size:16px;">
	<form  autocomplete=off method="post" action="Save_Incharge.php" enctype="multipart/form-data">
		  <input type="text" name="iid" placeholder="Incharge id" required  class="form-control">
		  <br>
		<?php
			$obj=new reg;
			$obj->register();
		?>	
			<br>
		 <button class="btn btn-warning btn-lg" id="but" style="margin-top:10px"> Register </button><br><br>
	</div>
	</div>
	<?php
		include_once "Footer.php"
	?>
</html>