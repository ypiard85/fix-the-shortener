<?php

// Insert 

$baseUrl = 'http://'.$_SERVER['HTTP_HOST'].'/?q=';
$target = $_POST['target'];
$code = uniqid();

$query = $database->prepare('INSERT INTO urls (code, target) VALUES (:code, :target)');
$query->execute([
	':code' => $code,
	':target' => $_GET['target'],
]);


// Return content

header('Content-Type: application/json');
die(json_encode([
	'url' => $baseUrl.$code
]));