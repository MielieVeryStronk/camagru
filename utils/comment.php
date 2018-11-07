<?php
session_start();
require("redirect.php");
require 'database.php';

if (strlen($_POST['comment']) > 0) {
    $query = "INSERT INTO comments (cmt_comment, cmt_user, cmt_img) VALUES (:comment, :user, :img)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['comment'=>$_POST['comment'], 'user'=>$_SESSION['u_name'], 'img'=>$_POST['id']]);
    header("Location: ../feed.php");
}
else {
    header("Location: ../feed.php?commenterrlength");
}
?>
