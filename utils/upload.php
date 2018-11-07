<?php
session_start();
require("redirect.php");

$user = $_SESSION['u_name'];
$target_file = addslashes(file_get_contents($_POST['imageValue']));
$filename = "name"; //rand("abcdefg123456", "abcdefg123456");
$uploadOk = 1;
require 'database.php';
if(isset($_POST["submit"])) {
    $query = "INSERT INTO img (img_name, img_src, img_user) VALUES ('$filename', '$target_file', '$user');";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $uploadOk = 1;
    header("Location: ../feed.php");
}
?>