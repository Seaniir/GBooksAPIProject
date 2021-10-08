<?php
// configuration
$dbhost 	= "localhost";
$dbname		= "libraries";
$dbuser		= "root";
$dbpass		= "";

// database connection
$db = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

function clean_post($data)
{
	$data = trim(strip_tags($data));
	return $data;
}
?>