<div class="container">
  <h2><a href="?action=villeRegister&ville=<?= urlencode ($_GET["ville"]) ?>"><?= htmlspecialchars ($_GET["ville"]) ?></a></h2>
  <br/>
  <br/>
  <div class="container">
    <form action="?action=villeRegisterPictures&ville=<?= urlencode ($_GET["ville"]) ?>" class="dropzone" enctype="multipart/form-data" id="dropzone">
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
return "?action=villePhotoPreview&ville=" . urlencode ($_GET["ville"]) . "&filename=" . urlencode ($filename);
}

include "dropzone.php"
?>

