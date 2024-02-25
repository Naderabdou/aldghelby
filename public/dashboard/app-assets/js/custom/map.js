function initAutocomplete() {
    let lat = $("input[name='lat']").val();
    let lng = $("input[name='lng']").val();


    const map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -32.8688, lng: 151.2195 },
        zoom: 13,
        mapTypeId: "roadmap",
    });
    // Create the search box and link it to the UI element.
    const input = document.getElementById("address");
    const searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    // Bias the SearchBox results towards current map's viewport.
    map.addListener("bounds_changed", () => {
        searchBox.setBounds(map.getBounds());
    });
    let markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener("places_changed", () => {
        const places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }
        // Clear out the old markers.
        markers.forEach((marker) => {
            marker.setMap(null);
        });
        markers = [];
        // For each place, get the icon, name and location.
        const bounds = new google.maps.LatLngBounds();
        places.forEach((place) => {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }
            const icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25),
            };
            // Create a marker for each place.
            markers.push(
                new google.maps.Marker({
                    map,
                    icon,
                    title: place.name,
                    position: place.geometry.location,
                })
            );

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }


            $("input[name='lat']").val(place.geometry.location.lat());
            $("input[name='lng']").val(place.geometry.location.lng());


        });
        map.fitBounds(bounds);
    });






    if (lat && lng) {


        const map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: parseFloat(lat), lng: parseFloat(lng) },
            zoom: 13,
            mapTypeId: "roadmap",
        });
        let markerEdit = new google.maps.Marker({
            position: {lat: parseFloat(lat), lng: parseFloat(lng)},
            map: map,

            title: $("#address").val(),

            draggable: true
        });
        markerEdit.addListener('dragend', function() {
            $("input[name='lat']").val(marker.getPosition().lat());
            $("input[name='lng']").val(marker.getPosition().lng());
        });

        const input = document.getElementById("address");


        const searchBox = new google.maps.places.SearchBox(input);


        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener("bounds_changed", () => {
            searchBox.setBounds(map.getBounds());
        });
        let markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener("places_changed", () => {

            const places = searchBox.getPlaces();
            console.log(places);

            if (places.length == 0) {
                return;
            }
            // Clear out the old markers.
            markers.forEach((marker) => {
                marker.setMap(null);
            });
            markers = [];
            // For each place, get the icon, name and location.
            const bounds = new google.maps.LatLngBounds();
            places.forEach((place) => {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                const icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25),
                };

                // Create a marker for each place.
                markers.push(

                    new google.maps.Marker({
                        map,
                        icon,
                        title: place.name,
                        position: place.geometry.location,
                    })
                );

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }


                $("input[name='lat']").val(place.geometry.location.lat());
                $("input[name='lng']").val(place.geometry.location.lng());


            });
            map.fitBounds(bounds);
        });

    }
    /*if(lat && lng){

        let marker = new google.maps.Marker({
            position: {lat: parseFloat(lat), lng: parseFloat(lng)},
            map: map,
            draggable: true
        });
        marker.addListener('dragend', function() {
            $("input[name='lat']").val(marker.getPosition().lat());
            $("input[name='lng']").val(marker.getPosition().lng());
        });
    }*/

}
