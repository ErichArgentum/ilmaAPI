<?php
require "../database.php";
require "./functions.php";

$marker = json_decode(file_get_contents('php://input'), true);

if(empty($marker["name"])) fail("no name");

if(empty($marker["pos"])) fail("no pos");
if(empty($marker["desc"])) fail("description");
if(empty($marker["pos"]["lat"])) fail("no latitude");
if(empty($marker["pos"]["lng"])) fail("no longitude");

$sql = "INSERT INTO markers (`name`, latitude, longitude, description)
	VALUES (:name, :latitude, :longitude, :desc )";
$stmt = $db->prepare($sql);

$stmt->bindParam("name", $marker["name"]);
$stmt->bindParam("latitude" , $marker["pos"]["lat"]);
$stmt->bindParam("longitude", $marker["pos"]["lng"]);
$stmt->bindParam("desc", $marker["desc"]);


if($stmt->execute()){
	exit(json_encode([
		"status" => 1,
		"msg" => "marker saved",
	]));
}

fail("failed to save");
