<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link rel="stylesheet" href="css/weather-icons.min.css" type="text/css" />
  <link rel="stylesheet" href="font/weathericons-regular-webfont.woff" />
</head>

<body>
  <div id="content">
    <div id="mapWrapper">
      <div id="googleMapsDiv"></div>
    </div>

    <div id="mapData">
      <div id="mapDataWrapper">
        <div id="weatherDetailsFromPhp"> </div>
        <div id="countryDetailsFromPhp"> </div>
      </div>
    </div>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjS7jurzbfmGwucFRFFimSbEAcxISbmlc&callback=myMap"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <script>
    var latitude = 53.1355291; // YOUR LATITUDE VALUE
    var longitude = 23.1586053; // YOUR LONGITUDE VALUE

    var myLatLng = {
      lat: latitude,
      lng: longitude
    };

    function myMap() {
      var mapProp = {
        center: new google.maps.LatLng(51.508742, -0.120850),
        zoom: 3,
      };
      var map = new google.maps.Map(document.getElementById("googleMapsDiv"), mapProp);

      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: latitude + ', ' + longitude
      });
      getWeatherDetails();
      getCountryDetails();

      // Update marker on click event on the map
      google.maps.event.addListener(map, 'click', function (event) {
        myLatLng.lat = event.latLng.lat();
        myLatLng.lng = event.latLng.lng();
        marker.setPosition(event.latLng);
        marker.setTitle(event.latLng.lat() + ' ' + event.latLng.lng());

        getWeatherDetails();
        getCountryDetails();
      });
    }

    function getWeatherDetails() {
      $.post('getWeatherDetails.php', {
          lat: myLatLng.lat,
          lng: myLatLng.lng
        },
        function (data) {
          $('#weatherDetailsFromPhp').html(data);
        });
    }

    function getCountryDetails() {
      $.post('getCountry.php', {
          lat: myLatLng.lat,
          lng: myLatLng.lng
        },
        function (data) {
          $('#countryDetailsFromPhp').html(data);
        });
    }
  </script>

</body>

</html>