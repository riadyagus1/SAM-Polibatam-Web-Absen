$(document).ready(function () {
    // Simple map
    map = new GMaps({
        el: '#gmaps-simple',
        lat: 1.118383,
        lng: 104.04846,
        zoom: 16,
        panControl: true,
        streetViewControl: true,
        mapTypeControl: true,
        overviewMapControl: true
    });
});
