<?php

// Database connection...

require 'config.php';

// Looking for a redirection....

if(isset($_GET['q'])){

	// Retrive rediction target from query code...
	$query = $database->prepare('select target from urls where code = :code');
	$query->execute(['code' => $_GET['q']]);
	$url = $query->fetchAll(PDO::FETCH_COLUMN, 0);

	// Redirect and exit the application...
	header('Location: '.$url[0]);
	die('Redirect to '.$url[0].'...');
}

// Else, include requested page...

include 'page/'.($_GET['page'] ?? 'front.php');
