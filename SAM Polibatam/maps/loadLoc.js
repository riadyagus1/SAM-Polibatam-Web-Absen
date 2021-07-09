// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.
let map, infoWindow;

function checkDistance(currLat, currLng, homeLat, homeLng) {
	disA = google.maps.geometry.spherical.computeDistanceBetween(
    		new google.maps.LatLng( currLat, currLng ),
    		new google.maps.LatLng( homeLat, homeLng )
	) <= 200;

	disB = google.maps.geometry.spherical.computeDistanceBetween(
    		new google.maps.LatLng( currLat, currLng ),
    		new google.maps.LatLng( 1.118673, 104.048442 )
	) <= 200;

	if (disA == true || disB == true) {
		return true;
	}

	else {
		return false;
	}
}

function AbsenString(currLat, currLng, homeLat, homeLng) {
	disA = google.maps.geometry.spherical.computeDistanceBetween(
    		new google.maps.LatLng( currLat, currLng ),
    		new google.maps.LatLng( homeLat, homeLng )
	) <= 200;

	disB = google.maps.geometry.spherical.computeDistanceBetween(
    		new google.maps.LatLng( currLat, currLng ),
    		new google.maps.LatLng( 1.118673, 104.048442 )
	) <= 200;

	if (disA == true) {
		document.cookie = "AbsenString=Hadir WFH";
	}

	else if (disB == true) {
		document.cookie = "AbsenString=Hadir WFO";
	}

	else {
		console.log("Error!");
	}
}



function initMap(a_lat,a_lng) {
  document.getElementById("btnLanjut").disabled = true;

  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 1.118673, lng: 104.048442 },
    zoom: 16.5,
  });

  const polCircle = new google.maps.Circle({
      strokeColor: "#90EE90",
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: "#90EE90",
      fillOpacity: 0.35,
      map,
      center: { lat: 1.118673, lng: 104.048442 },
      radius: 200,
    });

  const adrCircle = new google.maps.Circle({
      strokeColor: "#90EE90",
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: "#90EE90",
      fillOpacity: 0.35,
      map,
      center: { lat: a_lat, lng: a_lng },
      radius: 200,
    });

  infoWindow = new google.maps.InfoWindow();
  const locationButton = document.createElement("button");
  locationButton.textContent = "Dapatkan Lokasi Terkini";
  locationButton.classList.add("custom-map-control-button");
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
  locationButton.addEventListener("click", () => {
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
          infoWindow.setPosition(pos);
          infoWindow.setContent("Lokasi Ditemukan!");
          infoWindow.open(map);
          map.setCenter(pos);
	  var google_map_pos = new google.maps.LatLng( pos.lat, pos.lng );

	  var title;

	  var google_maps_geocoder = new google.maps.Geocoder();
                google_maps_geocoder.geocode(
                    { 'latLng': google_map_pos },
                    function( results, status ) {
                        if ( status == google.maps.GeocoderStatus.OK && results[0] ) {
                            var address = results[0].formatted_address;
		   	    document.cookie = "currAddr="+address;
			    title = address;
                        }
                    }
                );
          document.getElementById("btnLanjut").disabled = !checkDistance(pos.lat,pos.lng,a_lat,a_lng);
	  AbsenString(pos.lat,pos.lng,a_lat,a_lng);
          var marker = new google.maps.Marker({
          	position: pos,
          	map: map,
	        label: title,
          });
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  });
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation."
  );
  infoWindow.open(map);
}
