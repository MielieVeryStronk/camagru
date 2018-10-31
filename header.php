<?php
session_start();

echo '<div class="w3-top w3-margin-top-large">
	<div class="w3-bar w3-theme-d3 w3-left-align w3-large">
		<a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
		<a href="index.php"><img class="logo w3-bar-item w3-margin" src="resources/images/logo.png"></a>';
		
if (!isset($_SESSION['u_name'])) {
		echo '<a href="signup.php" class="w3-bar-item w3-button w3-margin w3-hide-small w3-right w3-padding-small w3-hover-white" title="Sign Up">Sign Up</a>
		<form action="utils/login.php" method="POST">
			<input type="submit" class="w3-bar-item w3-button w3-margin w3-hide-small w3-right w3-padding-small w3-hover-white" title="login" value="Login" name="submit">
			<input type="password" class="w3-bar-item w3-margin w3-right w3-border w3-padding-small" title="password" value="" name="pwd" placeholder="Password" tabindex="2">
			<input type="text" class="w3-bar-item w3-margin w3-right w3-border w3-padding-small" title="username" value="" name="username" placeholder="Username" tabindex="1">
		</form>';
}
else
{
		echo '<form action="utils/logout.php" method="POST">
				<button class="w3-bar-item w3-button w3-margin w3-hide-small w3-right w3-padding-small w3-hover-white" title="logout" value="Logout" name="submit">Logout</button>
			</form>';
		echo '<a href="account.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-small w3-hover-white" title="Sign Up">Logged in as : ';
		echo $_SESSION['u_name'];
		echo '</a><div class="w3-dropdown-hover w3-hide-small w3-right">
        <button class="w3-button w3-padding-small fa fa-user cam-usr-btn" title="Account Settings"></button>
        <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
            <a href="#" class="w3-bar-item w3-button">Change Password</a>
            <a href="#" class="w3-bar-item w3-button">Change Username</a>
            <a href="#" class="w3-bar-item w3-button">Change e-mail</a>
            <a href="#" class="w3-bar-item w3-button">Notification Settings</a>
        </div>
    </div>';
}
echo	'</div>
		</div>';
?>