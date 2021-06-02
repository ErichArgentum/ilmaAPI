<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google maps</title>
</head>

<body>
    <form action="insert.php" method="POST">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="latitude" placeholder="latitude">
        <input type="text" name="longitude" placeholder="longitude">
        <input type="text" name="description" placeholder="description">
        <button type="submit">Lisa</button>
    </form>
    <div id="map"></div>
    <script src="app.js"></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap">
    </script>
    <style>
        #map {
            height: 100%;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</body>


</html>
