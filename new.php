
<script>
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
	document.write(x);
	}
</script>
<body onload="getLocation()">

