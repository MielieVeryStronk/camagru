<?php
session_start();
?>
<title>Camagru</title>
<body class="w3-theme-l5">

<!-- Navbar -->
<?php
	include_once 'stylesheets.php';
	include_once 'header.php';
	require 'utils/database.php';
?>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:150px">    
  <!-- The Grid -->
  <div class="w3-row">
	<!-- Left Column -->
	<div class="w3-col m3">
	  <!-- Profile -->
	  <div class="w3-card w3-round w3-white fixed-elem" style="top:160px;width:300px">
		<div class="w3-container">
		 <h4 class="w3-center">My Profile</h4>
		 <p class="w3-center"><img src="resources/images/avatar.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
		 <hr>
		 <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Designer, UI</p>
		 <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> London, UK</p>
		 <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>
		</div>
	  </div>
	  <br>
      
      <div class="w3-row-padding fixed-elem" style="top:480px;left:402px">
		<div class="w3-col m12">
		  <div class="w3-card w3-round w3-white">
			<div class="w3-container w3-padding">
			  <button id="myBtn" type="button" class="w3-button w3-theme" onclick="newPost()"><i class="fa fa-camera"></i>  New Post</button>
			</div>
		  </div>
		</div>
	  </div>

	<!-- End Left Column -->
	</div>
	
	<!-- Middle Column -->
	<div class="w3-col m7">
	
	  <?php
		$queryImg = "SELECT * FROM img";
		$stmtImg = $pdo->prepare($queryImg);
		$stmtImg->execute();
		$resultImg = $stmtImg->fetchAll();

		foreach ($resultImg as $image)
		{
			$imgData = base64_encode($image['img_src']);
			$queryCmt = "SELECT * FROM comments WHERE cmt_img=?";
			$stmtCmt = $pdo->prepare($queryCmt);
			$stmtCmt->execute([$image['img_id']]);
			$resultCmt = $stmtCmt->fetchAll();
			?>
				<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
					<img src="data:image/jpg;base64,<?php echo $imgData ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
				<span class="w3-right w3-opacity">1 min</span>
				<h4><?php echo $image['img_user'] ?></h4><br>
				<hr class="w3-clear">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				<div class="w3-row-padding" style="margin:0 -16px">
				<div class="w3-half">
					<img src="data:image/jpg;base64,<?php echo $imgData ?>" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">
				</div>
				<div class="cmt-scroll">
					<?php
					foreach ($resultCmt as $comment)
					{
						echo "<div class='cmt-elem'>".date("j F", strtotime($comment['cmt_time']))." | <span class='cmt-user'>".$comment['cmt_user']."</span>  : ".$comment['cmt_comment']."</div>";
					}
					?>
				</div>
				</div>
				<button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> 
				<button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
				</div>
			<?php
		}
		?>
	  
	<!-- End Middle Column -->
	</div>
	
	<!-- Right Column -->

	<!-- End Right Column -->
	</div>
	
  <!-- End Grid -->
  </div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<h2>Add a new image</h2>
	<img id="preview" src="resources/images/preview.jpeg" height="200" alt="Image preview...">
	<input type="file" name="file" id="file" class="w3-hide" onchange="previewFile()"/>
	<label class="w3-button w3-theme-d2 w3-margin-bottom" for="file"><i class="fa fa-upload"></i>  Choose a file</label>
	<button type="button" id="webcamBtn" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-camera"></i>  Webcam</button> 
  </div>

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

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function previewFile(){
       var preview = document.getElementById('preview'); //selects the query named img
       var file    = document.querySelector('input[type=file]').files[0]; //sames as here
       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
  }


</script>

</body>
