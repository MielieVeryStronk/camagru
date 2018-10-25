<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "aassdd";
$dbName = "camagru";
$dbCharset = "utf8mb4";
$options = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	);

try {
	$dsn = "mysql:host=".$dbServername.";dbname=".$dbName.";charset=".$dbCharset;
	$pdo = new PDO($dsn, $dbUsername, $dbPassword, $options);
} catch (\PDOException $e) {
	echo "Error!".$e->getMessage();
}


// $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
// if (mysqli_connect_errno())
// 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
