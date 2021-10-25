<?php
	include_once 'dblib.php';
	$name = $_COOKIE["ID"];
	$tbl = "tbl";
	$tbl .= $name;
	$table = "libraries";
	$title = $_POST["key1"]; // Google ID
	$authors = $_POST["key2"]; // Google ID
	$img = $_POST["key3"]; // Google ID
	$genre = $_POST["key4"]; // Google ID

	//check if Google ID already exits
	$stmt = $db->prepare("DELETE FROM ".$tbl." WHERE titles=:titles");
	$stmt->execute(array(':titles' => $title));

	echo json_encode($_POST);
?>