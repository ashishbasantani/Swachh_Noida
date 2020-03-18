<html>
<div id="d1" name="Div" style="border:3px solid black;height:200px;width:200px;"> </div>

<script>
	alert("Hey");
	var i,j,x="";
	var d={"results":{"address_components":[{"long_name":"Centre of Computing and Networking","short_name":"CCN","types":["premise"]},{"long_name":"NIT","short_name":"NIT","types":["political","sublocality","sublocality_level_1"]},{"long_name":"Thanesar","short_name":"Thanesar","types":["locality","political"]},{"long_name":"Kurukshetra","short_name":"Kurukshetra","types":["administrative_area_level_2","political"]},{"long_name":"Haryana","short_name":"HR","types":["administrative_area_level_1","political"]}]}};
	for(i in d.results["address_components"])
	{
		 x += d.results["address_components"][i]["long_name"]+", ";	 	
	}
	document.getElementById("d1").innerHTML=x;
</script>


</html>
<?php
 /*$results=array(  "address_components" : [ { "long_name" : "Centre of Computing and Networking", "short_name" : "CCN", "types" : [ "premise" ] }, 
																{ "long_name" : "NIT", "short_name" : "NIT", "types" : [ "political", "sublocality", "sublocality_level_1" ] }, 
																{ "long_name" : "Thanesar", "short_name" : "Thanesar", "types" : [ "locality", "political" ] }
															  ]);*/
															  
															   //{ "long_name" : "Kurukshetra", "short_name" : "Kurukshetra", "types" : [ "administrative_area_level_2", "political" ] }, { "long_name" : "Haryana", "short_name" : "HR", "types" : [ "administrative_area_level_1", "political" ] }
															  
/*$d=array("results"=>["address_components"=>[ ["long_name" => "Centre of Computing and Networking", "short_name" => "CCN", "types" => [ "premise" ] ],
																			["long_name" => "NIT", "short_name" => "NIT", "types" => [ "political", "sublocality", "sublocality_level_1" ] ], 
																			["long_name" => "Thanesar", "short_name" => "Thanesar", "types" => [ "locality", "political" ] ],
																			["long_name" => "Kurukshetra", "short_name" =>"Kurukshetra", "types" => [ "administrative_area_level_2", "political" ] ],
																			["long_name" => "Haryana", "short_name" => "HR", "types" => [ "administrative_area_level_1", "political" ] ]
																		  ] ]
														);
							
$data=json_encode($d)	;
//$data = json_decode($data,True);
echo $data;
echo "<script>alert(\"hello\");var obj=JSON.parse($data); document.getElementById(\"d1\").innerHTML=obj[0] ;</script>";
echo "<script> </script>";*/
//echo $obj[0];


//print_r($data["results"]["address_components"][0]["long_name"]);

/*$add_array  = $data["results"]["address_components"];
//print_r($add_array);
//$add_array = $add_array[0];
//$add_array = $add_array["address_components"];
$country = "Not found";
$state = "Not found"; 
$city = "Not found";
foreach ($add_array as $key) {
  if($key["types"][0] == 'administrative_area_level_2')
  {
    $city = $key["long_name"];
  }
  if($key["types"][0] == 'administrative_area_level_1')
  {
    $state = $key["long_name"];
  }
  if($key["types"][0]== 'country')
  {
    $country = $key["long_name"];
  }
}
echo "Country : ".$country." ,State : ".$state." ,City : ".$city;*/
 //print_r($results);
/* echo json_encode($arr);
 $d=json_encode($arr);
 echo "<br>";
 print_r(json_decode($d));*/
 ?>
