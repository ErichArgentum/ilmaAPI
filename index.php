<?php

$city = $_GET['city'] ? $_GET['city'] : 'Kuressaare';

$url = 'http://api.openweathermap.org/data/2.5/weather?q='.$city .'&appid=' . $app_id .'units=metric';

$fileName = './cache.json' . strtolower($city) . '.json';
$cacheTime = 300;

if (file_exists($fileName) && (time() - filemtime($fileName) < $cacheTime )) {
    $content = file_get_contents($fileName);
    echo("Loen failist");
} else {
    $content = file_get_contents($url);

    $file = fopen($fileName, 'w');
    fwrite($file, $content);
    fclose($file);
    echo "Loen API-st";

}


var_dump($content);

$oWeather = json_decode($content);

//var_dump($oWeather);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuressaare ilm</title>
</head>
<body>
    <h1><?= $oWeather->name;?></h2>
    
    <img src="http://openweathermap.org/img/wn/<?=$oWeather->weather[0]->icon;?>@2x.png">
    <h3><?= $oWeather->weather[0]->main;?></h3>
    
    <h2>Temp:</h2>
    <h2><?= $oWeather->main->temp;?></h2>

    <h2>Tuule kiirus ja suund:</h2>
    <h2><?= $oWeather->wind->speed;?></h2>
    <h2><?= $oWeather->wind->deg;?></h2>

    <h2>Pilved:</h2>
    <h2><?= $oWeather->clouds->all;?></h2>
    <!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>
      let map;

      function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: -34.397, lng: 150.644 },
          zoom: 8,
        });
      }
    </script>
  </head>
  <body>
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSvr26ITEMstbg9NfnHwbgDY1EXfe-HGE&callback=initMap&libraries=&v=weekly"
      async
    ></script>
  </body>
      




</html>

</body>
</html>