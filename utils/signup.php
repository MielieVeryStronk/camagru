<?php

if (isset($_POST['submit']))
{
	include_once 'database.php';

	$username = $_POST['username'];
	$hashedPwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
	$email = $_POST['email'];
	
	if (empty($username) || empty($hashedPwd) || empty($email))
	{
		header("Location: ../signup.php?signup=empty");
		exit();
	}
	else
	{
		if (!preg_match("/^[a-zA-Z]*$/", $username))
		{
			header("Location: ../signup.php?signup=invalid");
			exit();
		}
		else
		{
			if (strlen($_POST['pwd']) < 8)
			{
				header("Location: ../signup.php?signup=pwdinvalid");
				exit();
			}
			if (!preg_match("#[0-9]+#", $_POST['pwd']))
			{
				header("Location: ../signup.php?signup=pwdinvalid");
				exit();
			}
			if (!preg_match("#[a-zA-Z]+#", $_POST['pwd']))
			{
				header("Location: ../signup.php?signup=pwdinvalid");
				exit();
			}     
			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				header("Location: ../signup.php?signup=email");
				exit();
			}
			else
			{
				$query = "SELECT * FROM `users` WHERE user_name=:username OR user_email=:email";
				$stmt = $pdo->prepare($query);
				$stmt->bindParam(':username', $username);
				$stmt->bindParam(':email', $email);
				$stmt->execute();
				$result = $stmt->fetch();
				if ($result)
				{
					header("Location: ../signup.php?signup=usertaken");
					exit();
				}
				else
				{
					$query = "INSERT into `users` set user_name=?, user_email=?, user_pwd=?";
					$stmt = $pdo->prepare($query);
					$stmt->execute([$username, $email, $hashedPwd]);
					header("Location: ../signup.php?signup=success");
					exit();
				}
			}
		}
	}
}
else
{
	header("Location: ../signup.php");
	exit();
}