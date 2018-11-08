<?php
session_start();
require("utils/redirect.php");

$sticker = imagecreatefrompng($_POST['stickerPath']);
$base = $_POST['baseImage'];

$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($sticker);
$sy = imagesy($sticker);

imagecopy($base, $sticker, imagesx($base) - $sx - $marge_right, imagesy($base) - $sy - $marge_bottom, 0, 0, imagesx($sticker), imagesy($sticker));

header('Location: ../edit.php?imageValue='.$base);
?>