<?php

$data=array("results":{"address_components":[{"long_name":"Centre of Computing and Networking","short_name":"CCN","types":["premise"]},{"long_name":"NIT","short_name":"NIT","types":["political","sublocality","sublocality_level_1"]},{"long_name":"Thanesar","short_name":"Thanesar","types":["locality","political"]},{"long_name":"Kurukshetra","short_name":"Kurukshetra","types":["administrative_area_level_2","political"]},{"long_name":"Haryana","short_name":"HR","types":["administrative_area_level_1","political"]}]});
//$data=	Array ([results] => Array ( [0] => Array ( [address_components] => Array ( [0] => Array ( [long_name] => Centre of Computing and Networking [short_name] => CCN [types] => Array ( [0] => premise ) ) [1] => Array ( [long_name] => NIT [short_name] => NIT [types] => Array ( [0] => political [1] => sublocality [2] => sublocality_level_1 ) ) [2] => Array ( [long_name] => Thanesar [short_name] => Thanesar [types] => Array ( [0] => locality [1] => political ) ) [3] => Array ( [long_name] => Kurukshetra [short_name] => Kurukshetra [types] => Array ( [0] => administrative_area_level_2 [1] => political ) ) [4] => Array ( [long_name] => Haryana [short_name] => HR [types] => Array ( [0] => administrative_area_level_1 [1] => political ) ))) ) [status] => OK ) ;

$d=json_decode($data,true);
print_r($d)			;

						/*$add_array  = $data["results"];
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
						
?>						