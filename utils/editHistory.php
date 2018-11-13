<?php
session_start();
require("redirect.php");
require('database.php');
$query = "DELETE FROM edit;";
$stmt = $pdo->prepare($query);
$stmt->execute();
header("Location: ../edit.php");
?>