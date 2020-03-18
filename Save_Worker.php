<?php
 $thispage="Register";	
	include "Header.php";
session_start();	
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
		$id=$_POST["wid"];
		$wid=filter_var($id,FILTER_SANITIZE_SPECIAL_CHARS);
		$fnam=$_POST["fname"];
		$fname=filter_var($fnam,FILTER_SANITIZE_SPECIAL_CHARS);
		$lnam=$_POST["lname"];
		$lname=filter_var($lnam,FILTER_SANITIZE_SPECIAL_CHARS);
		$pass=sha1($_POST["pass"]);
		$mail=$_POST["mail"];
		$email=filter_var($mail,FILTER_SANITIZE_EMAIL);
		$mob=$_POST["mobile"];
		
		$upic="Workers/Userpics/".$_FILES["upic"]["name"];
		$utpic=$_FILES["upic"]["tmp_name"];
		move_uploaded_file($utpic,$upic); 	
		
		$obj=new register;
		$inf=$obj->insert2($wid,$fname,$lname,$pass,$email,$mob,$upic);
		if($inf=="1")
		{
			/*echo "<center><h3><br>CONGRATS...!!!</h3>
			 <div>
				<img src=\"Images/happy.jpg\" width=30% height=30%><br>
				<h4>You are now registered as a <b>Worker</b> <br><br>
			 </div></center>";*/
			 $_SESSION["userid"]=$mail;
			 header("Location:Workers/Home.php?wid=$wid");
		}
		else
		{
			echo "<center><h3 style=\" color:red \">Sorry..!! <br>Some Error Occured. We are fixing it.<br>
			Register after some time, with proper details.<br></h3>
			<img src=\"Images/Sorry2.jpeg\" width=30% height=30%></center>";
		}
	}
	else
	{
	 header("Location:Register.php");
	}	
?>
