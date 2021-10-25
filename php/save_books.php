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
	$infoLink = $_POST["key5"];

	//check if Google ID already exits
	$stmt = $db->prepare("SELECT * FROM ".$tbl." WHERE titles=:titles");
	$stmt->execute(array(':titles' => $title));

		$insert_user_query = $db->prepare("INSERT INTO ".$tbl."(titles, authors, img, genre, infoLink) VALUES(:titles, :authors, :img, :genre, :infoLink)");
		$insert_user_query->execute(array(':titles' => $title, ':authors' => $authors, ':img' => $img, ':genre' => $genre, ':infoLink' => $infoLink));

		echo json_encode($_POST);
?>