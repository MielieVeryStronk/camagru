<?php
session_start();
require("utils/redirect.php");
include_once("header.php");
include_once("stylesheets.php");
?>
<title>Edit Photo</title>
<body class="w3-theme-l5">
<div class="w3-container w3-content" style="max-width:1400px;margin-top:150px">
    <div class="w3-col m7">
        <div class="w3-container w3-card w3-white w3-round w3-margin w3-padding">
		<img class="preview" style="margin:5px" id="preview" src="<?php echo $_POST['imageValue']?>" height="240" alt="Image preview...">
        <form id="stickerForm" class="w3-form" action="utils/edit.php" method="POST">
        <div class="w3-container w3-card w3-white w3-round w3-margin w3-padding">
            <img src="resources/stickers/doge.png" class="sticker-item" onclick="addSticker('resources/stickers/doge.png')">
            <img src="resources/stickers/grumpy.png" class="sticker-item" onclick="addSticker('resources/stickers/grumpy.png')">
            <img src="resources/stickers/mj.png" class="sticker-item" onclick="addSticker('resources/stickers/mj.png')">
            <img src="resources/stickers/pepe.png" class="sticker-item" onclick="addSticker('resources/stickers/pepe.png')">
            <img src="resources/stickers/rollsafe.png" class="sticker-item" onclick="addSticker('resources/stickers/rollsafe.png')">
            <img src="resources/stickers/salt.png" class="sticker-item" onclick="addSticker('resources/stickers/salt.png')">
        </div>
            <input type="hidden" id="stickerPath" name="stickerPath" value=""/>
            <input type="hidden" id="baseImage" name="baseImage" value="<?php echo $_POST['imageValue']?>"/>
        </form>
        </div>
    </div>
</div>

<script>
function addSticker(sticker) {
    document.getElementById('stickerPath').value = sticker;
    document.getElementById('stickerForm').submit();
}
</script>

</body>