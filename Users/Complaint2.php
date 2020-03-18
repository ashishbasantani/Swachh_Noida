<?php
	$upic="Complaints/Pending/".$_FILES["upic"]["name"];
	$utpic=$_FILES["upic"]["tmp_name"];
	move_uploaded_file($utpic,$upic); 
	include "Connect.php";
	$obj=new Operations();
	$obj->inpic($upic);
?>	