 <div id="map"></div>
<script>
			var x;var y;
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
				alert("get called");
					if (navigator.geolocation)
					{
						navigator.geolocation.getCurrentPosition(showPosition);
					}
					else
					{ 
						z.innerHTML = "Geolocation is not supported by this browser.";
					}
				}
	
	
			function showPosition(position) 
			{
			alert("pos called");
				x=position.coords.latitude;
				y=position.coords.longitude;
			initMap();	
			}
			
			<?php $abc = "<script>document.write(x)</script>"?>  
			<?php $def = "<script>document.write(y)</script>"?>  	
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key&callback=initMap">
    </script>
<?php echo $abc;echo $def; ?>
<body onload="getLocation()">