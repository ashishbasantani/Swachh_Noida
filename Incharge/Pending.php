<?php
$thispage="Pending";
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
		<title> Pending </title>
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
	<style>
      /* Set the size of the div element that contains the map */
      #map {
        height: 150px;  /* The height is 400 pixels */
        width: 20%;  /* The width is the width of the web page */
       }
    </style>
	</head>
<?php
	include_once "Header.php";
	include "../Connect.php"
?>

    
<table>
	<caption>All Pending Complaints</caption>
	<tr>
		<th> C_ID </th>
		<th> U_ID </th>
		<th> Complaint Description </th>
		<th> Complaint Location </th>
		<th> Complaint Reference Image </th>
		<th> Status </th>
	</tr>
<?php	
		$obj=new Complaints;
		$loc=$obj->Pending();
?>		
</table>
<?php
	include "Footer.php";
?>	

<body onload="getLocation()">
  
    <!--The div element for the map -->
    
    <script>
	var x=50;
	var y=60;
// Initialize and add the map
function initMap() {
  // The location of Uluru
  // uluru = {lat: 28.471724899999998, lng: 77.4808461};
  uluru = {lat: x, lng: y};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}


	function getLocation() 
	{
		if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition);
		}
		else { 
		z.innerHTML = "Geolocation is not supported by this browser.";
		}
	}
	
	
	function showPosition(position) {
	x=position.coords.latitude;
	y=position.coords.longitude;
	initMap();
  
	}

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key&callback=initMap">
    </script>
	<div id="map"></div>