function gotoClick(x,y) {
        var pos = { lat: x, lng: y };
	var map = new google.maps.Map(document.getElementById("gmaps-simple"), {
          zoom: 15,
          center: pos,
        });

        var marker = new google.maps.Marker({
          position: pos,
          map: map,
        });

}
function OnloadMap(x,y) {
        var pos = { lat: x, lng: y };
	var map = new google.maps.Map(document.getElementById("gmaps-simple"), {
          zoom: 15,
          center: pos,
        });

        var marker = new google.maps.Marker({
          position: pos,
          map: map,
        });
}
