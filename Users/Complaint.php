 <?php
 session_start();
	$id=$_SESSION["userid"];
	$desc=$_POST["desc"];
	$lati=$_REQUEST['h1'];
	$long=$_REQUEST['h2'];
	include "Connect.php";
	$obj=new Operations;
	$uid=$obj->get($id);
	$cid=$obj->get2();
	$cid=$cid+1;
	$c="C000".$cid;
	$upic="Complaints/Pending/".$_FILES["upic"]["name"];
	$utpic=$_FILES["upic"]["tmp_name"];
	move_uploaded_file($utpic,$upic); 
	$obj->insert($c,$cid,$uid,$desc,$long,$lati,$upic,'Pending');
?>