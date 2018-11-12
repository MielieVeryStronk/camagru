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
		</form>
		<a href="forgotPass.php" class="w3-bar-item w3-button w3-margin w3-hide-small w3-right w3-padding-small w3-hover-white" title="Sign Up">Forgot Password?</a>';
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
<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large w3-top">
  <a href="utils/logout.php" class="w3-bar-item w3-button w3-padding-large">Logout</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Login</a>
  <a href="signup.php" class="w3-bar-item w3-button w3-padding-large">Sign Up</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Settings</a>
</div>
<script>
// Accordion
function myFunction(id) {
	var x = document.getElementById(id);
	if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
		x.previousElementSibling.className += " w3-theme-d1";
	} else { 
		x.className = x.className.replace("w3-show", "");
		x.previousElementSibling.className = 
		x.previousElementSibling.className.replace(" w3-theme-d1", "");
	}
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
	var x = document.getElementById("navDemo");
	if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
	} else { 
		x.className = x.className.replace(" w3-show", "");
	}
}

function goToFeed() {
	window.location = "feed.php"
}
</script>