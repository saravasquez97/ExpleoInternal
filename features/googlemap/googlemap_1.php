<?php

// Setting default values for Google Maps API.
// DO NOT EDIT
$latitude_default = CONFIG['GoogleMaps']['latitude'];
$longitude_default = CONFIG['GoogleMaps']['longitude'];
$API_TOKEN_default = CONFIG['GoogleMaps']['API_TOKEN'];
$zoom_default = CONFIG['GoogleMaps']['zoom'];

// These values can be set to whatever you want for the specific feature
$latitude = $latitude_default;
$longitude = $longitude_default;
$API_TOKEN = $API_TOKEN_default;
$zoom = 5;

?>

<!-- Google Map Feature -->
<div id="googleMap" class="py-5" style="width:100%;height:400px;"></div>
<script>
    function myMap() {
        var uluru = {lat: <?php echo $latitude; ?>, lng: <?php echo $longitude;?>};
        var mapProp= {
            center:uluru,
            zoom:<?php echo $zoom;?>,
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $API_TOKEN; ?>&callback=myMap"></script>