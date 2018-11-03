<?php
session_start();

$user = $_SESSION['u_name'];
$target_file = addslashes(file_get_contents($_FILES["file"]["tmp_name"]));
$filename = $_FILES["file"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
require 'database.php';
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        $query = "INSERT INTO img (img_name, img_src, img_user) VALUES ('$filename', '$target_file', '$user');";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        print_r($_FILES);
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    header("Location: ../feed.php");
}
?>