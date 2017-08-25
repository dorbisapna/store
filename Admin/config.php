<?php
	$servername = "localhost";
	$username = "sapnad";
	$password = "password";
	$dbname = "sapnad_dorbi";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
}