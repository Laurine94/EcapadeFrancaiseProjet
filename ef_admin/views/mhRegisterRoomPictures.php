<div class="container">
  <h2><a href="?action=mhRegister&nom_mh=<?= urlencode ($_GET["nom_mh"]) ?>"><?= htmlspecialchars ($_GET["nom_mh"]) ?></a> / <a href="?action=mhRegisterRoom&nom_mh=<?= urlencode ($_GET["nom_mh"]) ?>&nom_chambre=<?= urlencode ($_GET["nom_chambre"]) ?>"><?= htmlspecialchars ($_GET["nom_chambre"]) ?></a></h2>

  <br/>
  <br/>
  
  <div class="container">
    <form action="?action=mhRegisterRoomPictures&nom_mh=<?= urlencode ($_GET["nom_mh"]) ?>&nom_chambre=<?= urlencode ($_GET["nom_chambre"]) ?>" class="dropzone" enctype="multipart/form-data" id="dropzone">
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
return "?action=mhPhotoPreview&nom_chambre=" . urlencode ($_GET["nom_chambre"]) . "&filename=" . urlencode ($filename);
}

include "dropzone.php"
?>
