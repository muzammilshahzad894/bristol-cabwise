let geocoder;
let distanceService;
let originAutocomplete;
let destinationAutocomplete;
let originPlace = null;
let destinationPlace = null;
let distance = 1;

$(document).ready(function () {
    // Initialize Google Places Autocomplete for pickup address
    const pickupInput = document.getElementById('pickupLocation');
    originAutocomplete = new google.maps.places.Autocomplete(pickupInput);

    // Initialize Google Places Autocomplete for destination address
    const destinationInput = document.getElementById('dropLocation');
    destinationAutocomplete = new google.maps.places.Autocomplete(destinationInput);

    geocoder = new google.maps.Geocoder();
    distanceService = new google.maps.DistanceMatrixService();

    // Listen for place changes in the input fields
    originAutocomplete.addListener('place_changed', handlePlaceChange);
    destinationAutocomplete.addListener('place_changed', handlePlaceChange);

    function handlePlaceChange() {
        originPlace = originAutocomplete.getPlace();
        destinationPlace = destinationAutocomplete.getPlace();

        if (originPlace && destinationPlace) {
            calculateDistance();
        }
    }

    function calculateDistance() {
        if (!originPlace || !destinationPlace) {
            console.error('Error: Please select both pickup and drop locations.');
            return;
        }

        const originLatLng = originPlace.geometry.location;
        const destinationLatLng = destinationPlace.geometry.location;

        distanceService.getDistanceMatrix({
            origins: [originLatLng],
            destinations: [destinationLatLng],
            travelMode: google.maps.TravelMode.DRIVING,
        }, (response, status) => {
            if (status === "OK") {
                const distanceText = response.rows[0].elements[0].distance.text;
                console.log("Distance: " + distanceText); 
                distance = distanceText;
                updatefleetPrice(distance);
            } else {
                console.error("Error: " + status);
            }
        });
    }
});

