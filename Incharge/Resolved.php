<?php
$thispage="Resolved";
session_start();
if(empty($_SESSION["userid"]))
{
header("Location:../Signin.php");
}
$umail=$_SESSION["userid"];
?>
<html>
	<head>
		<link href="../style.css" rel="stylesheet">
		<title> Resolved </title>
	<style>
		table {
		width: 100%;
		border:1px solid #FFD700;
		border-radius:2px;
		margin-left:3px;
		margin-right:0;
		}
		th, td {
		border-bottom: 1px solid #ddd;
		padding: 15px;
		text-align: left;
		}
		tr:nth-child(even) {background-color: #f2f2f2}
		tr:hover {background-color: #f5f5f5}
		a
		{
		text-decoration:none;
		color:black;
		} 
	</style>
	</head>
<?php
	include_once "Header.php";
	include "../Connect.php";
?>	
<table>
	<caption>All Resolved Complaints</caption>
	<tr>
		<th> C_ID </th>
		<th> U_ID </th>
		<th> Complaint Description </th>
		<th> Complaint Location </th>
		<th> Complaint Resolved Location </th>
		<th> Complaint Reference Image </th>
		<th> Complaint Close Reference Image </th>
		<th> Complaint Status </th>
	</tr>
<?php	
		/*$obj=new Complaints;
		$obj->Resolved();*/
		$con=mysqli_connect("localhost","root","","eco");
		$cmd="Select cid,uid,com_desc,com_loc_long,com_loc_lati,com_res_loc_long,com_res_loc_lati,com_img,com_res_img,status from resolve";
			$res=mysqli_query($con,$cmd);
			while(($row=mysqli_fetch_array($res)))
			{	
						$long=$row["com_loc_long"];
						$lati=$row["com_loc_lati"];
						echo "<tr><td><font color=\"red\">".$row["cid"]."</td>";
						echo "<td>".$row["uid"]."</td> ";
						echo "<td>".$row["com_desc"]."</td>";
						//echo "<td>".$row["com_loc_long"]."  ".$row["com_loc_lati"]." </td>";
						$data = file_get_contents("https://us1.locationiq.com/v1/reverse.php?key=5f0c8819bfdb2d&lat=$lati&lon=$long&format=json");
						$data = json_decode($data,true);
						echo "<td>".$data["display_name"]."</td>";
						
						$long2=$row["com_res_loc_long"];
						$lati2=$row["com_res_loc_lati"];
						//echo "<td>".$row["com_res_loc_long"]."  ".$row["com_res_loc_lati"]." </td>";
						$data = file_get_contents("https://us1.locationiq.com/v1/reverse.php?key=5f0c8819bfdb2d&lat=$lati2&lon=$long2&format=json");
						$data = json_decode($data,true);
						echo "<td>".$data["display_name"]."</td>";
						
						echo "<td><img src='../Users/".$row["com_img"]."' width=80 height=50></td> ";
						echo "<td><img src='../Users/".$row["com_res_img"]."' width=80 height=50></td> ";
						echo "<td>".$row["status"]."</font></td></tr>";				
						
			}	
		
		
		
?>
</table>








<?php
	include "Footer.php";
?>	