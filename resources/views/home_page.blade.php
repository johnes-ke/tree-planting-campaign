<!DOCTYPE html>
<html lang="en">
<head>
<title>Tree Planting Campaign</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{ asset('css/w3.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
.w3-tangerine {
  font-family: 'Tangerine', serif;
}

#map1 {
        height: 500px;
        width: 100%;
      }
</style>
</head>
<body>

  @include('sweetalert::alert')

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-teal w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>Tree Planting Campaign</b></h3>
  </div>
  <div class="w3-bar-block">
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>  
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Plant a Tree</a>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-teal w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-cyan w3-margin-right" onclick="w3_open()">☰</a>
  <span>Tree Planting Campaign</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:50px" id="showcase">
    <h1 class="w3-jumbo"><b>Tree Planting Campaign</b>
      <img class='w3-round'
        src="{{ asset('storage/assets/images/kenya.png') }}"
        style='width: 100px; height: 50px;'>
    </h1>
    <h1 class="w3-tangerine w3-jumbo w3-text-teal"><b>Plant a Tree to save lives</b></h1>
    <hr style="width:50px;border:5px solid rgb(1, 59, 42)" class="w3-round">

    <div id="map1" class="w3-center w3-round"></div>

    <?php 
      $map_locations = [];
    ?>

      @foreach ($planting_locations as $plant_location)
        <?php 
          $map_locations[] = array($plant_location->planting_point,$plant_location->latitude,$plant_location->longitude);
        ?>
      @endforeach

    <?php  
      showSignsPositionOnMap($map_locations);
      // echo $map_locations = json_encode($map_locations,JSON_PRETTY_PRINT);
    ?>

  </div>
  
  <!-- Contact -->
  <div class="w3-container" id="contact" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-teal"><b>Donate a Tree</b></h1>
    <hr style="width:50px;border:5px solid rgb(1, 59, 42)" class="w3-round">
    <p>Add your details below</p>
    <form action="{{ route('messages.store') }}" method="POST">
        @csrf

      <div class="w3-section">
        <label>Name</label>
        <input class="w3-input w3-border" type="text" name="name" required>
      </div>

      <div class="w3-section">
        <label>Email</label>
        <input class="w3-input w3-border" type="text" name="email" required>
      </div>

      <div class="w3-section">
        <label class="w3-label w3-text-black w3-validate w3-large"><b>Select Location where you want to plant the tree</b>
          <span class="w3-white w3-large w3-text-red">*</span>
        </label>

        <input  name="planting_point"
                id="planting_point"
                value="{{ old('planting_point') }}" 
                class="w3-input w3-border w3-round-large w3-animate-input"style="width:95%"
                required
                type="text"/>

        <input  name="latitude"
                value="{{ old('latitude') }}"
                id="planting_point_latitude" 
                type="hidden"/>

        <input  name="longitude"
                value="{{ old('longitude') }}"
                id="planting_point_longitude" 
                type="hidden"/>

        @error('planting_point')
          <span class="w3-label w3-text-red w3-validate w3-large">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="w3-section">
        <label>Amount to Donate</label>
        <input class="w3-input w3-border" type="text" name="amount" required>
      </div>

      <div class="w3-section">
        <label>Write Your Message here:</label>
        <textarea class="w3-input w3-border" type="text" name="message_content" required>

        </textarea>
      </div>

      <button type="submit" class="w3-button w3-hover-orange w3-round-xlarge w3-block w3-padding-large w3-teal w3-text-white w3-margin-bottom">Send Message</button>
    </form>  
  </div>

<!-- End page content -->
</div>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px"><p class="w3-right">&copy; 2022 <a href="#" title="tree_planting" target="_blank" class="w3-hover-opacity">Tree Planting Campaign</a></p></div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>

<?php 
    function showSignsPositionOnMap($locationsDetails){

      $map_locations = json_encode($locationsDetails,JSON_PRETTY_PRINT);

      //echo $map_locations;

      echo "<script>
              var locations = ".$map_locations.";
              var marker, i;
              var map1;
              var kenya = {lat: -0.023559, lng: 37.906193};
              var searchBox;
              var planting_point_longitude = document.getElementById('planting_point_longitude');
              var planting_point_latitude  = document.getElementById('planting_point_latitude');
      
              function initMap() {

                searchBox = new google.maps.places.SearchBox(document.getElementById('planting_point'));

                map1 = new google.maps.Map(document.getElementById('map1'), {
                  center: kenya,
                  zoom: 6,
                  mapId: 'c0e03eda24d44398',
                });

                // Listen for the event fired when the user selects a prediction and retrieve
                // more details for that place.
                searchBox.addListener('places_changed', function() {

                  var places = searchBox.getPlaces();

                  console.log(places);

                  if (places.length == 0) {
                    return;
                  }

                  places.forEach(function(place) {

                    if (!place.geometry) {
                      console.log('Returned place contains no geometry');
                      return;
                    }

                    //set new geo value
                    planting_point_longitude.value = place.geometry.location.lng();
                    planting_point_latitude.value = place.geometry.location.lat();

                  });

                });

                map1.setCenter(kenya);

                var infowindow = new google.maps.InfoWindow();

                var iconBase = '".asset('storage/assets/images/tree.png')."';

                for (i = 0; i < locations.length; i++) {  
                      marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map1,
                        icon: iconBase
                      });

                      var address = '<div><p><b>locations[i][0]</b></p></div>';
                        
                      google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                          infowindow.setContent(locations[i][0]);
                          infowindow.open(map1, marker);
                        }
                      })(marker, i));
      
                }
                
        
              } //end of init()

            </script>";

    }
?>

<script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap&map_ids=c0e03eda24d44398&libraries=places">
</script>

</body>
</html>
