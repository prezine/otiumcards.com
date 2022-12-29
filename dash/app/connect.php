<?php
	include_once 'app.php';
	$conn = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_CODE, DATABASE_NAME, DATABASE_PORT);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	// echo $res;