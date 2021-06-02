<?php

require_once 'db_connection.php';

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$latitude = filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_STRING);
$longitude = filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

echo $name;
echo $latitude;
echo $longitude;
echo $description;

$stmt = $pdo->prepare('INSERT INTO markers (name, latitude, longitude, description, added) VALUES (:name, :latitude, :longitude, :description, now());');
$stmt->execute(['name' => $name, 'latitude' => $latitude, 'longitude' => $longitude, 'description' => $description]);

header('Location: index.php');
