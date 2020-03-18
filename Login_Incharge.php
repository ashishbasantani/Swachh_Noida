<?php
 include "Connect.php";
 session_start(); 
?>
<head>
	<title>Login</title>
</head>
<body>
<?php
  if(isset($_POST["mail"]))
   {
	$mail=$_POST["mail"];
	$pass=$_POST["pass"];
	$obj=new register;
	
		$spf=$obj->log2($mail,$pass);
		if($spf==-1)
		{
		 $thispage="login";
		 include_once "header.php";
		 echo "<center><h3 style=\"color:red\">Invalid User ID or password</h3>
		   <img src=Images/Sorry2.jpeg width=30% height=30%></center>";
		}
		else 
		{
		 //if(isset($_POST["rem"]))
		 //{
		  //setcookie("cook", $uid, time()+86400);
		 //}
		 $_SESSION["userid"]=$mail;
		 header("Location:Incharge/Pending.php?id=$mail");	
		 }
	}
   else
	{
			 header("Location:../Home.php?id=$mail");	
	}
?>		 