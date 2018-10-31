<?php
$dbServicename = "localhost";
$dbUsername = "root";
$dbPassword = "aassdd";
$dbName = "camagru";

//connect to mysql and create camagru database

$conn = mysqli_connect($dbServicename, $dbUsername, $dbPassword);
$sql = "CREATE DATABASE camagru";
if (mysqli_query($conn, $sql))
	echo "Database CAMAGRU create success<br/>";
else
{
	echo "Database CAMAGRU create failure<br/>";
	mysqli_close($conn);
	return ;
}

//create users table

$conn = mysqli_connect($dbServicename, $dbUsername, $dbPassword, $dbName);
$sql = "CREATE TABLE users (
	user_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
	user_name varchar(256) not null,
	user_email varchar(256) not null,
	user_pwd varchar(256) not null,
	user_valid bit DEFAULT 0,
	user_verify_hash varchar(32) not null
);";
if (mysqli_query($conn, $sql))
echo "Table USERS create success<br/>";
else
{
	echo "Table USERS create failure<br/>" . $conn->error;
	mysqli_close($conn);
	return ;
}
$sql = "CREATE TABLE img (
	img_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
	img_name varchar(256) not null,
	img_src longblob not null,
	img_user varchar(256) not null
);";
if (mysqli_query($conn, $sql))
echo "Table IMG create success<br/>";
else
{
	echo "Table IMG create failure<br/>" . $conn->error;
	mysqli_close($conn);
	return ;
}
$sql = "CREATE TABLE comments (
	cmt_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
	cmt_comment varchar(256) not null,
	cmt_user varchar(256) not null,
	cmt_img varchar(256),
	cmt_time datetime
);";
if (mysqli_query($conn, $sql))
echo "Table COMMENTS create success<br/>";
else
{
	echo "Table COMMENTS create failure<br/>" . $conn->error;
	mysqli_close($conn);
	return ;
}
mysqli_close($conn);

//create admin profile;

$conn = mysqli_connect($dbServicename, $dbUsername, $dbPassword, $dbName);
$hashedPwd = password_hash("admin123", PASSWORD_DEFAULT);
$sql = "INSERT INTO users (user_name, user_email, user_pwd, user_valid, user_verify_hash) VALUES ('admin','admin' ,'$hashedPwd', 1, '1234');";
if (mysqli_query($conn, $sql))
	echo "ADMIN created<br/>";
mysqli_close($conn);

//add testing images

$conn = mysqli_connect($dbServicename, $dbUsername, $dbPassword, $dbName);
$blob = file_get_contents("../resources/testing/testimg1.jpg");
$sql = "INSERT INTO img (img_name, img_src, img_user) VALUES ('testimg1.jpg', $blob, 'admin');";
if (mysqli_query($conn, $sql))
	echo "test image 1 added<br/>";
$blob = file_get_contents('../resources/testing/testimg2.jpg');
$sql = "INSERT INTO img (img_name, img_src, img_user) VALUES ('testimg2.jpg', $blob, 'admin');";
if (mysqli_query($conn, $sql))
	echo "test image 2 added<br/>";
$blob = file_get_contents('../resources/testing/testimg3.jpeg');
$sql = "INSERT INTO img (img_name, img_src, img_user) VALUES ('testimg3.jpeg', $blob, 'admin');";
if (mysqli_query($conn, $sql))
	echo "test image 3 added<br/>";
mysqli_close($conn);
?>