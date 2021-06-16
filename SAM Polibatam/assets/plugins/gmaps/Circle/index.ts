let PRESERVE_COMMENT_ABOVE; // force tsc to maintain the comment above eslint-disable-line

// This example creates circles on the map, representing populations in North
// America.

// First, create an object containing LatLng and population for each city.

interface City {
  center: google.maps.LatLngLiteral;
  population: number;
}

const citymap: Record<string, City> = {
  Polibatam: {
    center: { llat: 1.118383, lng: 104.04846 }
};

function initMap(): void {
  // Create the map.
  const map = new google.maps.Map(
    document.getElementById("map") as HTMLElement,
    {
      zoom: 16.5,
      center: { llat: 1.118383, lng: 104.04846 },
      mapTypeId: "terrain",
    }
  );

  // Construct the circle for each value in citymap.
  // Note: We scale the area of the circle based on the population.
  for (const city in citymap) {
    // Add the circle for this city to the map.
    const cityCircle = new google.maps.Circle({
      strokeColor: "#FF0000",
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: "#FF0000",
      fillOpacity: 0.35,
      map,
      center: citymap[city].center,
      radius: Math.sqrt(citymap[city].population) * 100,
    });
  }
}