<?php 
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbpassword = "";
	$dbName = "articles";

	$conn = mysqli_connect($dbServername, $dbUsername, $dbpassword, $dbName);

	if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);//izbacuje error ako postoji
  }