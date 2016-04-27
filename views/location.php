<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      var map;
      var mapOptions = {
          // Tọa độ muốn hiển thị ban đầu (tung độ,vỹ độ)
          center: new google.maps.LatLng(10.771971, 106.697845),
          // Mức độ zoom
          zoom: 8
      };
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPIwOElsEmexvULARiURGO-jyS3WwprfU&callback=initMap"
    async defer></script>
  </body>
</html>