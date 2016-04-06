 <script>
        (function(){
        "use strict";
            // script to load OpenWeather API
            var defaultLat = 29.424933;
            var defaultLon = -98.488355;


            var defaultWeather = function(event){
                $.get("http://api.openweathermap.org/data/2.5/forecast/daily", {
                    lat: defaultLat,
                    lon: defaultLon,
                    APPID: "0a5faae42ab05b77622877da6f519e86",
                    units: "imperial"
                }).done (function(data){
                        // script to insert forecast data in the browser 
                    $('#forecast').html('');
                    $('#location').html('<h3>' + data.city.name + '</h3>');
                    for (var i = 0; i < data.list.length; i++) {
                        var div = $('<div>');
                        div.addClass('block card-panel');
                        div.append('<img src="http://openweathermap.org/img/w/' + data.list[i].weather[0].icon + '.png">');
                        div.append('<p>' + data.list[i].weather[0].description + '</p>');
                        div.append('<p> Hi ' + parseInt(data.list[i].temp.max) + '</p>');
                        div.append('<p> Lo ' + parseInt(data.list[i].temp.min) + '</p>');
                        $('#forecast').append(div);
                    }
                    console.log(data);
                });
            };

            // script to load default weather forecast for San Antonio
            defaultWeather();

            // script to submit latitude and longitude to change forecast location
            $(document).on('click', '#submit', function(changeLocation){
                defaultLat = parseFloat($('#lat').val());
                defaultLon = parseFloat($('#lon').val());
          
                var newCenter = {
                    lat:  defaultLat,
                    lng:  defaultLon,
                };
    
                defaultWeather();  

                map.setCenter(newCenter);
                marker.setPosition(newCenter);
            });

            // script to add Google map to page
            // Set our map options
            var mapOptions = {
            zoom: 10,
            center: {
                lat:  defaultLat,
                lng: defaultLon,
                },
            };

            // Render the map
            var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

            // script for the marker

            var marker = new google.maps.Marker({
            animation: google.maps.Animation.DROP,
            position: {
                lat: mapOptions.center.lat,
                lng: mapOptions.center.lng,
            }, 
            map: map,
            draggable: true
            });

            // script to grab new latitude and longitude once marker is dragged
            google.maps.event.addListener(marker, 'dragend', function(event){
                $('#lat').val(marker.getPosition().lat().toFixed(3) );
                $('#lon').val(marker.getPosition().lng().toFixed(3));

                defaultLat = parseFloat($('#lat').val());
                defaultLon = parseFloat($('#lon').val());

                var newCenter = {
                    lat:  defaultLat,
                    lng:  defaultLon,
                };
    
                defaultWeather();  

                map.setCenter(newCenter);
                marker.setPosition(newCenter);

            });
            
            // script to center marker on new location and display on the map
            marker.setMap(map);
        })();
        </script>