<title>Verify</title>
<?php
echo '<body class="w3-theme-l5">';
include_once 'stylesheets.php';
include_once 'header.php';
require 'utils/database.php';
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
    $query = "UPDATE users SET user_valid=1 WHERE user_email=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);
    header("Location: index.php?verifysuccess");
}
else
{
    header("Location: index.php?verifyfailure");
}
?>
</body>