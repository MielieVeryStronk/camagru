<?php
session_start();
require("redirect.php");
require 'database.php';

if (strlen($_POST['comment']) > 0) {
    $query = "INSERT INTO comments (cmt_comment, cmt_user, cmt_img) VALUES (:comment, :user, :img)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['comment'=>$_POST['comment'], 'user'=>$_SESSION['u_name'], 'img'=>$_POST['id']]);
    $query = "SELECT * FROM img WHERE img_id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_POST['id']]);
    $result = $stmt->fetch();
    $userNotify = $result['img_user'];
    $query = "SELECT * FROM users WHERE user_name=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$userNotify]);
    $result = $stmt->fetch();
    if ($result['user_notify'] == true)
    {
        $subject = 'Someone commented on your photo!';
        $message = $_SESSION['u_name']." has commented on your picture: \r\n".$_POST['comment'];
        $headers = 'From:noreply@camagru.enikel' . "\r\n";
        mail($result['user_email'], $subject, $message, $headers);
    }
    header("Location: ../feed.php");
}
else {
    header("Location: ../feed.php?commenterrlength");
}
?>
