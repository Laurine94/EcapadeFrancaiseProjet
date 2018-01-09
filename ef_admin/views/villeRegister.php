<?php

$update =  isset($_GET["ville"]) && $_GET["ville"] != "";
if (isPOST ()) {
    $ville = $_POST;
} else {
    if (isset ($_GET["ville"]) && $_GET["ville"] != "") {
        $ville = getVille ($_GET["ville"]);
        if (!$ville) {
            dbError ();
        }
    }
}

$genres = getGenreList ();

if (isset ($ville["id"])) {
    $has_guest_pic = file_exists (getVillePictureGuest ($ville["id"]));
    $has_guide_pic = file_exists (getVillePictureGuide ($ville["id"]));
    $has_acti_pic  = file_exists (getVillePictureActi ($ville["id"]));
} else {
    $has_guest_pic = false;
    $has_guide_pic = false;
    $has_acti_pic  = false;
}
?>

<div class="container">
<h3>Ville</h3>
<?php if ($update): ?>
    <div class="col-sm-12 text-right">
    <form action="?action=villeDelete&ville=<?= urlencode ($_GET['ville']) ?>" method="POST" onsubmit="return confirm('Voulez vous vraiment la supprimer ?')" enctype="multipart/form-data">
    <button type="submit" class="btn btn-warning pull-right"><span class="glyphicon glyphicon-trash"></span> Supprimer cette ville</button>
    </form>
    <a href="<?= $conf["base_rel"] ?>/ihm_<?= $lang ?>/select_guesthouse.php?genre=CITIES&ville=<?= urlencode ($_GET["ville"]) ?>" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Voir</a>
    </div>
<?php endif; ?>
    
<form action="?action=villeRegister&ville=<?= urlencode ($_GET['ville']) ?>" id="ville" method="POST" enctype="multipart/form-data">
<div class="form-group col-sm-6">
  <label for="ville">Ville</label>
    <input name="ville" class="form-control" id="ville" placeholder="Ville" value="<?= $ville['ville'] ?>" <?= $update ? "readonly" : "" ?> />
  </div>

  <div class="form-inline form-group col-sm-6">
    <label for="genre_select">Genre</label>
    <span id="genre_new" style="display: none">
      <input name="genre" class="form-control" id="genre" placeholder="Type" value0="<?= $ville['genre'] ?>"/><br>
      <label for="maison_file">Image maison</label> <input type="file" name="maison_genre_file" style="display: inline" accept="image/*" /><br>
      <label for="activite_file">Image activité</label> <input type="file" name="activite_genre_file" style="display: inline" accept="image/*" /><br>      
    </span>
    <select name="genre_select" id="genre_select">
    <?php foreach ($genres as $genre): ?>
    <option value="<?= $genre ?>" <?= $ville['genre'] == $genre ? "selected" : "" ?>><?= $genre ?></option>
    <?php endforeach; ?>
    <option disabled>-</option>
    <option value="_new_">Nouveau genre</option>
    </select>
  </div>
<div class="form-group col-sm-12">
  <label for="description_ville">Description ville</label>
  <textarea name="description_ville" class="form-control" id="description_ville" rows="8" placeholder="Description ville"><?= $ville['description_ville'] ?></textarea>
  </div>
<div class="form-group col-sm-6" style="display: none">
  <label for="id">Id</label>
  <input name="id" class="form-control" id="id" placeholder="Id" value="<?= $ville['id'] ?>" />
  </div>
<div class="form-group col-sm-6">
  <label for="guest_checkbox"><input type="checkbox" name="guest_checkbox" id="guest_checkbox" value="1" <?= $has_guest_pic ? "checked" : "" ?>> Image guest house</label>
  <input type="file" name="guest" id="guest" />
  </div>
<div class="form-group col-sm-6">
  <label for="guide_checkbox"><input type="checkbox" name="guide_checkbox" id="guide_checkbox" value="1" <?= $has_guide_pic ? "checked" : "" ?>> Image guide</label>
  <input type="file" name="guide" id="guide" />
  </div>
<div class="form-group col-sm-6">
  <label for="acti_checkbox"><input type="checkbox" name="acti_checkbox" id="acti_checkbox" value="1" <?= $has_acti_pic ? "checked" : "" ?>> Image activit&eacute;</label>
  <input type="file" name="acti" id="acti" />
  </div>
<br style="clear: both" />
                                                                                                                                          
  <?php if ($update): ?>
  <a href="?action=villeRegisterPictures&ville=<?= urlencode ($ville['ville']) ?>" class="btn btn-success pull-left"><span class="glyphicon glyphicon-picture"></span> Gestion des photos (<?= count($images) ?>)</a>
    
  <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-refresh"></span> Mettre à jour cette ville</button>
  <?php else: ?>
  <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span> Ajouter cette ville</button>
  <?php endif ?>  
    
</form>
</div>

<script>
  $("#genre_select").change(function () {
  if (this.value == "_new_") { $("#genre").val (""); $("#genre_new").show () }
  else { $("#genre_new").hide () }
  });
</script>


    
