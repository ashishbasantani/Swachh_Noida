<?php
$thispage="Login";
?>
<HTML>
 <head>
	<title>Login</title>
	<script src="jquery.min.js"></script>
	<script>
	   $(document).ready(function()
		 {	

			$("#a1").show();
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
 <!--<body style="background-color:#AFF5E2"> -->
 <body>
	<div style="padding:3%;background-color:#E0E0E0;height:80%;width:550px;margin-left:30%;font-size:30px;
				text-align:center;font-family:Arial;font-size:22px;margin-top:70px">
				
		<p style="font-size:40px">LOGIN</p><br>
		<input type="radio" name="choice" value="User"  checked="checked" id="q1"> User 
		&nbsp &nbsp
		<input type="radio" name="choice" value="Worker" id="q2"> Sector Incharge 

	
	<div id="a1" style="padding:3%;height:270px; width:300px;margin-left:17%;margin-top:50px;"> 
		<form  autocomplete=off method="post" action="Login_User.php">
			<input type="email" name="mail" placeholder="Email" class="form-control" required>
			<br>
			<input type="password" name="pass" placeholder="Password" class="form-control" required>
			<br><br>
			<button class="btn btn-success btn-lg" id="but"> LOGIN </button>
		</form>
	</div>
	<div id="a2" style="padding:3%;height:270px; width:300px;margin-left:17%;margin-top:50px;"> 
		<form  autocomplete=off method="post" action="Login_Incharge.php">
			<input type="email" name="mail" placeholder="Email" class="form-control">
			<br>
			<input type="password" name="pass" placeholder="Password" class="form-control">
			<br><br>
			<button class="btn btn-success btn-lg" id="but"> LOGIN </button>
		</form>
	</div>
	</div>
	</body>	
	<?php
		include_once "Footer.php"
	?>
	</body>	
