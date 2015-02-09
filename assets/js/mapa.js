$(document).ready(function() {
      

	var testigo=0;

	$( ".you" ).click(function() {


		if(testigo == 0){  //con testigo simplemente obtenemos si el mapa estÃ¡ mostrado o no. PodrÃ­a hacerse de maneras mÃ¡s elegantes obteniendo el valor del 'display' de '.mapYou'
			getLocation(); 
		} else {
			$( ".mapYou" ).toggle(2000);
		}
	});


	var x = getElementsByClassName("you")[0];

	function getLocation() {

	    testigo=1;
	
	    if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition,showError);
	    } else {
		x.innerHTML = "Geolocation is not supported by this browser.";
	    }
	}

	function showPosition(position) {
	    var latlon = position.coords.latitude+","+position.coords.longitude;
	    var img_url = "http://maps.googleapis.com/maps/api/staticmap?center="
	    +latlon+"&zoom=14&size=400x300&sensor=false";
	    document.getElementsByClassName("mapYou")[0].innerHTML = "<img src='"+img_url+"'>";
            alert(latlon);
		
		$( ".mapYou" ).toggle(2000); //mostramos el mapa DESPUÃ‰S de obtenerlo
	}

	function showError(error) {
	    switch(error.code) {
		case error.PERMISSION_DENIED:
		    x.innerHTML = "User denied the request for Geolocation."
		    break;
		case error.POSITION_UNAVAILABLE:
		    x.innerHTML = "Location information is unavailable."
		    break;
		case error.TIMEOUT:
		    x.innerHTML = "The request to get user location timed out."
		    break;
		case error.UNKNOWN_ERROR:
		    x.innerHTML = "An unknown error occurred."
		    break;
	    }
	}

});

