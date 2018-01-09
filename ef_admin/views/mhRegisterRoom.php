
<?php
$update = isset($_GET["nom_chambre"]) && $_GET["nom_chambre"] != "";

$images = [];

if (isset ($_GET["nom_chambre"]) && $_GET["nom_chambre"] != "") {
    $ch = getMhRoom ($_GET["nom_chambre"]);
    if ($ch) {
        $dest = mhRoomImgPath ($lang, $ch["nom_mh"], $ch["nom_chambre"]);
        $images =  mhRoomListPictures ($dest);

        if (preg_match ("/(\d+):(\d+):(\d+)/", $ch["heure_dep"], $matches)) {
            $ch["heure_dep_h"] = $matches[1];
            $ch["heure_dep_m"] = $matches[2];
        }

        if (preg_match ("/(\d+):(\d+):(\d+)/", $ch["heure_arr"], $matches)) {
            $ch["heure_arr_h"] = $matches[1];
            $ch["heure_arr_m"] = $matches[2];
        }

    } else {
        httpError (404);
    }
} else {
    $ch["nom_mh"] = $_GET["nom_mh"];
}        

if (isPOST()) {
    $ch = $_POST;
}

$entite = "chambre";
?>

<div class="container">
<?php if ($update): ?>  
    <form action="?action=mhDeleteRoom&nom_chambre=<?= urlencode ($_GET['nom_chambre']) ?>" method="POST" onsubmit="return confirm('Voulez vous vraiment la supprimer ?')" id="mhDelete">
    <button type="submit" class="btn btn-warning pull-right"><span class="glyphicon glyphicon-trash"></span> Supprimer cette chambre</button>
    </form>
<?php endif; ?>
    <br>
<h2><a href="?action=mhRegister&nom_mh=<?= urlencode ($_GET['nom_mh']) ?>"><?= htmlspecialchars ($_GET['nom_mh']) ?></a></h2>
    <br>
    
<form action="?action=mhRegisterRoom&nom_mh=<?= urlencode ($_GET['nom_mh']) ?>&nom_chambre=<?= urlencode ($_GET['nom_chambre']) ?>" id="mhRegister" method="POST">
  
  <div class="form-group col-sm-6">
    <label for="nom_chambre">Nom de la chambre</label>
    <input name="nom_chambre" class="form-control" id="nom_chambre" placeholder="Nom de la chambre"  value="<?= $ch['nom_chambre'] ?>" <?= $update ? "readonly" : "" ?> />
  </div>
  <div class="form-group col-sm-6">
    <label for="nb_places">Nombre de places</label>
    <input name="nb_places" class="form-control" id="nb_places" placeholder="Nombre de places"  value="<?= $ch['nb_places'] ?>"/>
  </div>

  
  <div class="form-group col-sm-6">
    <label for="taille">Taille</label>
    <input name="taille" class="form-control" id="taille" placeholder="Taille"  value="<?= $ch['taille'] ?>"/>
  </div>
                                                                                                                                                                    
  <div class="form-group col-sm-6">
    <label for="lits">Lits</label>
    <input name="lits" class="form-control" id="lits" placeholder="Lits"  value="<?= $ch['lits'] ?>"/>
  </div>

  <div class="form-group col-sm-6">
    <label for="nom_mh">Nom de la maison d'hôte</label>
    <input name="nom_mh" class="form-control" id="nom_mh" placeholder="Nom de la maison d'hôte"  value="<?= $ch['nom_mh'] ?>"  readonly />
  </div>
  
  <div class="form-group col-sm-6">
    <label for="prix_chambre">Prix de la chambre</label>
    <input name="prix_chambre" class="form-control" id="prix_chambre" value="<?= $ch['prix_chambre'] ?>" />
    <br>
    <?php include "prixselect.php" ?>      
  </div>

  <div class="form-group col-sm-6">
    <label for="heure_dep">Heure du départ</label>
    <div class="form-inline">
      <input name="heure_dep_h" class="form-control" id="heure_dep_h" value="<?= $ch['heure_dep_h'] ?>" size="2" /> H
      <input name="heure_dep_m" class="form-control" id="heure_dep_m" value="<?= $ch['heure_dep_m'] ?>" size="2" /> M
    </div>
  </div>

  <div class="form-group col-sm-6">
    <label for="heure_arr">Heure d'arrivée</label>
    <div class="form-inline">
      <input name="heure_arr_h" class="form-control" id="heure_arr_h" value="<?= $ch['heure_arr_h'] ?>" size="2" /> H
      <input name="heure_arr_m" class="form-control" id="heure_arr_m" value="<?= $ch['heure_arr_m'] ?>" size="2" /> M
    </div>
  </div>

  <div class="form-group col-sm-12">
    <label for="description_chambre">Description</label>
    <textarea name="description_chambre" class="form-control" id="description_chambre" rows="10"><?= $ch['description_chambre'] ?></textarea>
  </div>

<?php foreach ($checkboxes as $checkbox): ?>
<label class="checkbox-inline"><input type="checkbox" name="<?= $checkbox ?>" value="1" <?= isset ($ch[$checkbox]) && $ch[$checkbox] > 0 ? "checked" : "" ?>><?= $checkbox ?></label>
<?php endforeach; ?>

<br><br><br>

<?php
/*
<h3 style="clear: both; margin-top: 60px">Liste des photos</h3>

<ul class="list-group">
<?php foreach ($images as $image): ?>
<li class="list-group-item"><a href="?action=mhDelPhoto&nom_mh=<?= $_GET['nom_mh'] ?>&nom_chambre=<?= $_GET['nom_chambre'] ?>&file=<?= urlencode ($image) ?>"><?= $image ?></a></li>
<?php endforeach; ?>
</ul>
*/
?>

<?php if ($update): ?>
  <a href="?action=mhRegisterRoomPictures&nom_mh=<?= urlencode ($ch['nom_mh']) ?>&nom_chambre=<?= urlencode ($ch['nom_chambre']) ?>" class="btn btn-success"><span class="glyphicon glyphicon-picture"></span> Gestion des photos (<?= count($images) ?>)</a>
  <a href="?action=mhRegisterRoomIndispo&nom_mh=<?= urlencode ($ch['nom_mh']) ?>&nom_chambre=<?= urlencode ($ch['nom_chambre']) ?>" class="btn btn-success"><span class="glyphicon glyphicon-hourglass"></span> Gestion des disponibilit&eacute;s</a>
  <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-refresh"></span> Mettre à jour cette chambre</button>
<?php else: ?>
  <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span> Ajouter cette chambre</button>
<?php endif ?>
</form>

</div>

