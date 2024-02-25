// function initAutocomplete() {
//     const map = new google.maps.Map(document.getElementById("map"), {
//         center: { lat: 24.774265 , lng:  46.738586 },
//         zoom: 12,
//         mapTypeId: "roadmap",
//     });
//     // Create the search box and link it to the UI element.
//     const input = document.getElementById("address");
//     const searchBox = new google.maps.places.SearchBox(input);
//     map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
//     // Bias the SearchBox results towards current map's viewport.
//     map.addListener("bounds_changed", () => {
//         searchBox.setBounds(map.getBounds());
//     });
//     let markers = [];
//     // Listen for the event fired when the user selects a prediction and retrieve
//     // more details for that place.
//     searchBox.addListener("places_changed", () => {
//         const places = searchBox.getPlaces();
//
//         if (places.length == 0) {
//             return;
//         }
//         // Clear out the old markers.
//         markers.forEach((marker) => {
//             marker.setMap(null);
//         });
//         markers = [];
//         // For each place, get the icon, name and location.
//         const bounds = new google.maps.LatLngBounds();
//         places.forEach((place) => {
//             if (!place.geometry) {
//                 console.log("Returned place contains no geometry");
//                 return;
//             }
//             const icon = {
//                 url: place.icon,
//                 size: new google.maps.Size(71, 71),
//                 origin: new google.maps.Point(0, 0),
//                 anchor: new google.maps.Point(17, 34),
//                 scaledSize: new google.maps.Size(25, 25),
//             };
//             // Create a marker for each place.
//             markers.push(
//                 new google.maps.Marker({
//                     map,
//                     icon,
//                     title: place.name,
//                     position: place.geometry.location,
//                 })
//             );
//
//             if (place.geometry.viewport) {
//                 // Only geocodes have viewport.
//                 bounds.union(place.geometry.viewport);
//             } else {
//                 bounds.extend(place.geometry.location);
//             }
//
//
//             $("input[name='lat']").val(place.geometry.location.lat());
//             $("input[name='lng']").val(place.geometry.location.lng());
//
//
//         });
//         map.fitBounds(bounds);
//     });
// }

function initAutocomplete() {
    let lat = parseFloat($("input[name='lat']").val());
    let lng = parseFloat($("input[name='lng']").val());
    let address = document.getElementById("map").getAttribute("data-address");

    const map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: lat, lng: lng },
        zoom: 12,
        mapTypeId: "roadmap",
    });

    let markers = [];

    // Assuming you have a valid place object with name and geometry properties
    let place = {
        name: address,
        geometry: {
            location: { lat: lat, lng: lng }
        }
    };

    let marker = new google.maps.Marker({
        map: map,
        title: place.name,
        position: place.geometry.location,
    });

    markers.push(marker);
}
