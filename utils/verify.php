<?php
    require 'database.php';
    $hash = $_GET['hash'];
    $email = $_GET['email'];
    $query = "SELECT * FROM `users` WHERE user_email=:email AND user_verify_hash=:hash";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':hash', $hash);
    $stmt->execute();
    $result = $stmt->fetch();
    if ($result)
    {   
        $query = "UPDATE `users` SET user_valid=? WHERE user_email=:email";
        $stmt = $pdo->prepare($query);
        $stmt->execute([1]);
        header("Location: ../index.php?verifysuccess");
    }
    else
    {
        header("Location: ../index.php?verifyfailure");
    }
?>