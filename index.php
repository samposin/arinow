<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Air Now</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<script src="https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<style>
	body { margin: 0; padding: 0; }
	#map { position: absolute; top: 0; bottom: 0; width: 100%; }
</style>
</head>
<body>
<div id="map"></div>

<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoidHc5ODA3IiwiYSI6ImNrZmxzcGcycDB4eWsyeXQ0eHFucWx1OWQifQ.RNNsPYSz_23if7Ctbd8Y4A';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [-77.013,38.919],
        zoom: 3
    });

    $.ajax({
        url: "markers.php",
        cache: false,
        dataType: 'json',
        success: function (response) {
            response.forEach(function (marker) {
                var marker = new mapboxgl.Marker()
                    .setLngLat([marker.lng,marker.lat])
                    .setPopup(
                        new mapboxgl.Popup({
                            offset: 25
                        }) // add popups
                        .setHTML(
                            '<b> Date Issue: ' +marker.DateIssue+' \
                            <br> \
                            Date Forecast: ' +marker.DateForecast+' \
                            <br> \
                            Reporting Area: ' +marker.ReportingArea+' \
                            <br> \
                            State Code: ' +marker.StateCode+' \
                            <br> \
                            Parameter Name: ' +marker.ParameterName+' \
                            <br> \
                            AQI: ' +marker.AQI+' \
                            <br> </b>'
                        )
                    )
                    .addTo(map);
                });
        }
    });

</script>

</body>
</html>
