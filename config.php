<?php

$databaseFile = __DIR__.'/var/database.sqlite';

if(!file_exists($databaseFile)){
	copy(__DIR__.'/exemple.sqlite', $databaseFile);
}

$database = new PDO('sqlite:'.$databaseFile);
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
