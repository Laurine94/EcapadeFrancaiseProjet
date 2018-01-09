<div class="container">
  <h2><a href="?action=mhRegister&nom_mh=<?= urlencode ($_GET["nom_mh"]) ?>"><?= htmlspecialchars ($_GET["nom_mh"]) ?></a></h2>
  <br/>
  <br/>
  <center><h3 style="color:red">Une seule photo !</h3></center>
  <br/>
  <div class="container">
    <form action="?action=mhRegisterPictures&nom_mh=<?= urlencode ($_GET["nom_mh"]) ?>" class="dropzone" enctype="multipart/form-data" id="dropzone">
    <div class="dz-message" data-dz-message>
      <img src="img/appareil-photo.png" />
      <h3 style="color: green">Ajoutez vos photos</h3>
    </div>
  </form>    
</div>

</div>


<?php
  $dzMaxFiles = 2;

function dzGetThumbnail ($filename) {
return "?action=mhPhotoPreview&nom_mh=" . urlencode ($_GET["nom_mh"]) . "&filename=" . urlencode ($filename);
}

include "dropzone.php"
?>

