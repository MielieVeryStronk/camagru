<?php
session_start();
?>
<title>Camagru</title>
<body class="w3-theme-l5">

<!-- Navbar -->
<?php
	include_once 'stylesheets.php';
	include_once 'header.php';
?>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
	<!-- Left Column -->
	<div class="w3-col m3">
	  <!-- Profile -->
	  <div class="w3-card w3-round w3-white">
		<div class="w3-container">
		 <h4 class="w3-center">My Profile</h4>
		 <p class="w3-center"><img src="/w3images/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
		 <hr>
		 <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Designer, UI</p>
		 <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> London, UK</p>
		 <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>
		</div>
	  </div>
	  <br>

	<!-- End Left Column -->
	</div>
	
	<!-- Middle Column -->
	<div class="w3-col m7">
	
	  <div class="w3-row-padding">
		<div class="w3-col m12">
		  <div class="w3-card w3-round w3-white">
			<div class="w3-container w3-padding">
			  <h6 class="w3-opacity">Status:</h6>
			  <p contenteditable="true" class="w3-border w3-padding"></p>
			  <button type="button" class="w3-button w3-theme"><i class="fa fa-pencil"></i>  Post</button> 
			</div>
		  </div>
		</div>
	  </div>
	  
	  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
		<img src="/w3images/avatar2.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
		<span class="w3-right w3-opacity">1 min</span>
		<h4>John Doe</h4><br>
		<hr class="w3-clear">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		  <div class="w3-row-padding" style="margin:0 -16px">
			<div class="w3-half">
			  <img src="/w3images/lights.jpg" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">
			</div>
			<div class="w3-half">
			  <img src="/w3images/nature.jpg" style="width:100%" alt="Nature" class="w3-margin-bottom">
		  </div>
		</div>
		<button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> 
		<button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
	  </div>
	  
	  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
		<img src="/w3images/avatar5.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
		<span class="w3-right w3-opacity">16 min</span>
		<h4>Jane Doe</h4><br>
		<hr class="w3-clear">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		<button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> 
		<button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
	  </div>  

	  <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
		<img src="/w3images/avatar6.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
		<span class="w3-right w3-opacity">32 min</span>
		<h4>Angie Jane</h4><br>
		<hr class="w3-clear">
		<p>Have you seen this?</p>
		<img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		<button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> 
		<button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
	  </div> 
	  
	<!-- End Middle Column -->
	</div>
	
	<!-- Right Column -->

	<!-- End Right Column -->
	</div>
	
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

<footer class="w3-container w3-theme-d5">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
 
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
</script>

</body>
