<?php
require_once 'db_connection.php';

$stmt = $pdo->prepare('SELECT * FROM markers');
$stmt->execute();
$makers = $stmt->fetchAll();
echo json_encode($makers);
