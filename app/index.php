

<html>
    <head>
        <link rel="stylesheet" href="css/leaflet.css" />
        <script src="js/jquery.js"></script>
        <script src="js/leaflet.js"></script>


        <style>
            #map {
                height: 700px;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div id="error"></div>
        <div id="map"></div>
        <script>
            $( document ).ready(function() {
                var map = L.map('map').setView([-12.0560257, -77.0866166], 20);

                L.tileLayer('http://127.0.0.1:8080/osm/{z}/{x}/{y}.png', {
                    maxZoom: 22
                }).addTo(map);

                query = navigator.geolocation.getCurrentPosition(success, error, options);

                function getRandomColor() {
                    var letters = '0123456789ABCDEF';
                    var color = '#';
                    for (var i = 0; i < 6; i++ ) {
                        color += letters[Math.floor(Math.random() * 16)];
                    }
                    return color;
                }

                var options = {
                  enableHighAccuracy: true,
                  timeout: 5000,
                  maximumAge: 0
                };

                function success(pos) {
                      var crd = pos.coords;

                      console.log('Your current position is:');
                      console.log('Latitude : ' + crd.latitude);
                      console.log('Longitude: ' + crd.longitude);
                      console.log('More or less ' + crd.accuracy + ' meters.');

                      var latlng = L.latLng(crd.latitude, crd.longitude);

                      $.getJSON("http://127.0.0.1/getPeople.php" + "?lat=" + crd.latitude + "&lon=" +  crd.longitude, function (json) {
                        for(var pearson in json.results){
                            console.log(json.results[pearson]);
                            var circle = L.circle(latlng, {
                                color: 'red',
                                fillColor: '#' + getRandomColor(),
                                fillOpacity: 0.1,
                                radius: json.results[pearson].user.distance_mi * 1000
                            })
                            .addTo(map);
                        }
                      });
                };

                function error(err) {
                  console.warn('ERROR(' + err.code + '): ' + err.message);
                };
            });


        </script>
    </body>
</html>