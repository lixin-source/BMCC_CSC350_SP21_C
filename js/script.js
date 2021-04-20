/* --------------------------------------------------------
Home Page
-----------------------------------------------------------*/






/* --------------------------------------------------------
Facilities us Page
-----------------------------------------------------------*/



/* --------------------------------------------------------
Contact Page
-----------------------------------------------------------*/
var map, infoWindow;
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 3.519863, lng: 101.538116 },
        zoom: 15
    });
    infoWindow = new google.maps.InfoWindow;

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            var marker = new google.maps.Marker({
                position: pos,
                map: map,
                title: 'Our Location'
            });

            var infowindow = new google.maps.InfoWindow({
                content: marker
            });


            infoWindow.open(map, marker);
            infoWindow.setContent('Our Current Location');
            map.setCenter(pos);
        }, function () {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
}


function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
}



/* --------------------------------------------------------
Reservation Page
-----------------------------------------------------------*/
function finalCost(){
    var roomType = document.getElementById("room_type").value;
    var personNum = document.getElementById("person_number").value;

    var total = (parseInt(roomType)*100) + ((personNum)*3) 

    document.getElementById("result").innerHTML = total;
}

