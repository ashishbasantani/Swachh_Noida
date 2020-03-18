<?php
 $thispage="Register";	
	include "Header.php";
?>
<html>
 <head>
	<title>Register</title>
 </head>
 <body style="background-color:#AFF5E2">
<?php
   include "Connect.php";
   if(isset($_POST["fname"]))	
    {
		$fnam=$_POST["fname"];
		$fname=filter_var($fnam,FILTER_SANITIZE_SPECIAL_CHARS);
		$lnam=$_POST["lname"];
		$lname=filter_var($lnam,FILTER_SANITIZE_SPECIAL_CHARS);
		$pass=sha1($_POST["pass"]);
		$mail=$_POST["mail"];
		$email=filter_var($mail,FILTER_SANITIZE_EMAIL);
		$mob=$_POST["mobile"];
		
		
		$obj=new register;
		$inf=$obj->insert($fname,$lname,$pass,$email,$mob);
		if($inf=="1")
		{
			echo "<center><h3><br>CONGRATS...!!!</h3>
			 <div>
				<img src=\"Pics/happy.jpg\" width=30% height=30%><br>
				<h4>You are now registered as <b>USER</b><br><br>
			 </div></center>";
		}
		else
		{
			echo "<center><h3 style=\" color:red \">Sorry..!! <br>Some Error Occured. We are fixing it.<br>
			Register after some time, with proper details.<br></h3>
			<img src=\"Pics/Sorry2.jpeg\" width=30% height=30%></center>";
		}
	}
	else
	{
	 header("Location:Register.php");
	}
		
		
?>