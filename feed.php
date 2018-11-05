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
      
      <div class="w3-row-padding fixed-elem" style="top:480px">
		<div class="w3-col m12">
		  <div class="w3-card w3-round w3-white">
			<div class="w3-container w3-padding">
			  <button id="myBtn" type="button" class="w3-button w3-theme"><i class="fa fa-camera"></i>  New Post</button>
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
		rsort($resultImg);

		foreach ($resultImg as $image)
		{
			$imgData = base64_encode($image['img_src']);
			$queryCmt = "SELECT * FROM comments WHERE cmt_img=?";
			$stmtCmt = $pdo->prepare($queryCmt);
			$stmtCmt->execute([$image['img_id']]);
			$resultCmt = $stmtCmt->fetchAll();
			?>
				<div class="w3-container w3-card w3-white w3-round w3-margin"><br>
					<img id="avatar" src="data:image/jpg;base64,<?php echo $imgData ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
				<span class="w3-right w3-opacity"><?php echo date("j M", strtotime($image['img_time'])) ?></span>
				<h4><?php echo $image['img_user'] ?></h4><br>
				<hr class="w3-clear">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				<div class="w3-row-padding" style="margin:0 -16px">
				<div class="w3-half">
					<img src="data:image/jpg;base64,<?php echo $imgData ?>" style="width:100%" alt="<?php echo $image['img_name'] ?>" class="w3-margin-bottom">
				</div>
				<div class="cmt-scroll">
					<?php
					foreach ($resultCmt as $comment)
					{
						echo "<div class='cmt-elem'>".date("j M", strtotime($comment['cmt_time']))." | <span class='cmt-user'>".$comment['cmt_user']."</span>  : ".$comment['cmt_comment']."</div>";
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
	<form action="utils/upload.php" method="POST" enctype="multipart/form-data">
		<img class="preview" id="preview" src="resources/images/preview.jpeg" height="200" alt="Image preview...">
		<input type="hidden" id="imageValue" name="imageValue" value=""/>
		<video class="video reverse-img" id="video" width="320" height="240"></video>
		<canvas class="display-none reverse-img" id="canvas" width="320" height="240"></canvas>
		<input type="file" name="file" id="file" class="w3-hide" onchange="previewFile()"/>
		<label id="fileLabel" class="w3-button w3-theme-d2 w3-margin-bottom" for="file"><i class="fa fa-upload"></i>  Choose a file</label>
		<button type="button" id="webcamBtn" class="w3-button w3-theme-d2 w3-margin-bottom" onclick="photoBooth()"><i class="fa fa-camera"></i>  Webcam</button> 
		<button type="submit" name="submit" value="submit" id="confirmBtn" class="w3-button w3-theme-d2 w3-margin-bottom confirm-btn" disabled><i class="fa fa-check"></i>  Confirm</button> 
		<button type="button" id="cancelBtn" class="w3-button w3-theme-d2 w3-margin-bottom display-none" onclick="cancelBooth()"><i class="fa fa-times"></i>  Back</button> 
		<button type="button" id="snap" class="w3-button w3-theme-d2 w3-margin-bottom display-none" onclick="snapPhoto()"><i class="fa fa-camera"></i>  Take Picture</button> 
		<!-- <button type="button" id="webcamBtn" class="w3-button w3-theme-d2 w3-margin-bottom" onclick="photoBooth()"><i class="fa fa-camera"></i>  Webcam</button>  -->
	</form>
  </div>

</div>

<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>enikel</h5>
</footer>

<footer class="w3-container w3-theme-d5">
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
	document.getElementById("video").style.display = "none";
	document.getElementById("preview").style.display = "block";
	document.getElementById("cancelBtn").style.display = "none";
	document.getElementById("canvas").style.display = "none";
    modal.style.display = "none";
		cancelBooth();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
		document.getElementById("video").style.display = "none";
		document.getElementById("preview").style.display = "block";
		document.getElementById("canvas").style.display = "none";
    modal.style.display = "none";
		cancelBooth();
    }
}

function previewFile(){
	var preview = document.getElementById('preview');
	var file = document.querySelector('input[type=file]').files[0];
	var reader  = new FileReader();
	var confirm = document.getElementById('confirmBtn');

	reader.onloadend = function () {
	preview.src = reader.result;
	document.getElementById('imageValue').value = reader.result;
	}

	if (file) {
		confirm.disabled = false;
		reader.readAsDataURL(file);
	} else {
		preview.src = "resources/images/preview.jpeg";
	}
}

function previewSnap(){
	var preview = document.getElementById('preview');
	var confirm = document.getElementById('confirmBtn');
	confirm.disabled = false;
	var canvas = document.getElementById('canvas');
	preview.src = canvas.toDataURL("image/jpg");
	document.getElementById('imageValue').value = canvas.toDataURL("image/jpg");
}

function photoBooth() {
	document.getElementById("preview").style.display = "none";
	document.getElementById("webcamBtn").style.display = "none";
	document.getElementById("confirmBtn").style.display = "none";
	document.getElementById("file").style.display = "none";
	document.getElementById("fileLabel").style.display = "none";
	document.getElementById("video").style.display = "inline";
	document.getElementById("canvas").style.display = "inline";
	document.getElementById("cancelBtn").style.display = "block";
	document.getElementById("snap").style.display = "block";
	var video = document.getElementById("video"),
		vendorURL = window.URL || window.webkitURL;

	navigator.getMedia = navigator.getUserMedia || navigator.webkitGetUserMedia;
	navigator.getMedia({
		video: true,
		audio: false
	}, function(stream) {
		video.srcObject = stream;
		video.play();
	}, function(error) {
		//error message
	});
}

function cancelBooth() {
	var video = document.getElementById("video");
	var vidStream = video.srcObject;
	document.getElementById("video").style.display = "none";
	document.getElementById("preview").style.display = "block";
	document.getElementById("cancelBtn").style.display = "inline-block";
	document.getElementById("confirmBtn").style.display = "block";
	document.getElementById("canvas").style.display = "none";
	document.getElementById("snap").style.display = "none";
	document.getElementById("webcamBtn").style.display = "inline-block";
	document.getElementById("file").style.display = "inline-block";
	document.getElementById("fileLabel").style.display = "inline-block";
	if (vidStream)
		vidStream.getTracks()[0].stop();
}

function snapPhoto() {
	var canvas = document.getElementById('canvas');
	var context = canvas.getContext('2d');
	var video = document.getElementById('video');

	// Trigger photo take
	context.drawImage(video, 0, 0, 320, 240);
	previewSnap();
}

</script>

</body>
