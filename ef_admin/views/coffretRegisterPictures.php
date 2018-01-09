<div class="container">
  <h2><a href="?action=coffretRegister&id=<?= urlencode ($_GET["id"]) ?>"><?= htmlspecialchars ($_GET["id"]) ?></a></h2>

  <br/>
  <br/>
  
  <div class="container">
    <form action="?action=coffretRegisterPictures&id=<?= urlencode ($_GET["id"]) ?>" class="dropzone" enctype="multipart/form-data" id="dropzone">
    <div class="dz-message" data-dz-message>
      <img src="img/appareil-photo.png" />
      <h3 style="color: green">Ajoutez vos photos</h3>
    </div>
  </form>    
</div>

</div>

<?php
  $dzMaxFiles = 16;

function dzGetThumbnail ($filename) {
return "?action=coffretPhotoPreview&id=" . urlencode ($_GET["id"]) . "&filename=" . urlencode ($filename);
}

include "dropzone.php"
?>
