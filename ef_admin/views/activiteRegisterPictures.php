<div class="container">
  <h2><a href="?action=activiteRegister&nom_activite=<?= urlencode ($_GET["nom_activite"]) ?>"><?= htmlspecialchars ($_GET["nom_activite"]) ?></a></h2>
  <br/>
  <br/>
  <div class="container">
    <form action="?action=activiteRegisterPictures&nom_activite=<?= urlencode ($_GET["nom_activite"]) ?>" class="dropzone" enctype="multipart/form-data" id="dropzone">
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
return "?action=activitePhotoPreview&nom_activite=" . urlencode ($_GET["nom_activite"]) . "&filename=" . urlencode ($filename);
}

include "dropzone.php"
?>

