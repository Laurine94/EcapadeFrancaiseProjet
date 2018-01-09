<?php
$update =  isset($_GET["nom_activite"]) && $_GET["nom_activite"] != "";

if (isPOST()) {
    $activites = $_POST;
} else {
    if (isset ($_GET["nom_activite"]) && $_GET["nom_activite"] != "") {
        $activites = getActivite ($_GET["nom_activite"]);
        if (!$activites) {
            dbError ();
        }
        
        $prixselect = getPrixSelect ("activite", $_GET["nom_activite"]);
    }
}

$types = getActiviteTypes();

$entite = "activite";
?>

<div class="container">
<?php if ($update): ?>
    <div class="col-sm-12 text-right">
    <form action="?action=activiteDelete&nom_activite=<?= urlencode ($_GET['nom_activite']) ?>" method="POST" onsubmit="return confirm('Voulez vous vraiment la supprimer ?')" enctype="multipart/form-data" id="acDelete">
    <button type="submit" class="btn btn-warning pull-right"><span class="glyphicon glyphicon-trash"></span> Supprimer cette activité</button>
    </form>
    <a href="<?= $conf["base_rel"] ?>/ihm_<?= $lang ?>/select_activites_final.php?ville=<?= urlencode ($_GET['nom_activite']) ?>&type_activite=<?= urlencode ($_GET['type_activite']) ?>&nom_activite=<?= urlencode ($_GET['nom_activite']) ?>" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Voir</a>
    </div>
<?php endif; ?>

    <h3>Activité</h3>
  <form action="?action=activiteRegister&nom_activite=<?= urlencode ($_GET['nom_activite']) ?>" id="activites" method="POST" enctype="multipart/form-data">
  
  <div class="form-group col-sm-6">
    <label for="nom">Nom de l&apos;entreprise</label>
    <input name="nom" class="form-control" id="nom" placeholder="Nom de l&apos;entreprise" value="<?= $activites['nom'] ?>" />
  </div>
    
  <div class="form-group col-sm-6" style="display: none">
    <label for="prenom">Prénom</label>
    <input name="prenom" class="form-control" id="prenom" placeholder="Prénom"  value="<?= $activites['prenom'] ?>" />
  </div>

  <div class="form-group col-sm-6">
    <label for="nom_activite">Nom de l'activité</label>
    <input name="nom_activite" class="form-control" id="nom_activite" placeholder="Nom activité" value="<?= $activites['nom_activite'] ?>" <?= $update ? "readonly" : "" ?> />
  </div>
  <div class="form-group col-sm-6">
    <label for="ville">Ville</label>
    <input name="ville" class="form-control" id="ville" placeholder="Ville" value="<?= $activites['ville'] ?>" />
  </div>
  <div class="form-group col-sm-12">
    <label for="localisation">Localisation</label>
    <textarea name="localisation" class="form-control" id="localisation" rows="4" placeholder="Localisation"><?= $activites['localisation'] ?></textarea>
  </div>
  <div class="form-group col-sm-6">
    <label for="prix_activite">Prix</label>
    <input name="prix_activite" class="form-control" id="prix_activite" placeholder="Prix" value="<?= $activites['prix_activite'] ?>" />
  </div>
  <div class="form-group col-sm-6">
    <label for="duree">Durée</label>
    <input name="duree" class="form-control" id="duree" placeholder="Durée" value="<?= $activites['duree'] ?>" />
  </div>
  <div class="form-group col-sm-6">
    <?php include "prixselect.php" ?>
  </div>
  <div class="form-inline form-group col-sm-6">
    <label for="type_activite_select">Type</label>
    <span id="type_activite_new" style="display: none">
      <input name="type_activite" class="form-control" id="type_activite" placeholder="Type" value0="<?= $activites['type_activite'] ?>"/><br>
      <label for="type_file">Image type activité</label> <input type="file" name="type_file" id="type_file" style="display: inline" accept="image/*" /><br>
      <label for="fond_file">Image fond activité</label> <input type="file" name="fond_file" style="display: inline" accept="image/*" /><br>
    </span>
    <select name="type_activite_select" id="type_activite_select">
    <?php foreach ($types as $type): ?>
    <option value="<?= $type ?>" <?= $activites['type_activite'] == $type ? "selected" : "" ?>><?= $type ?></option>
    <?php endforeach; ?>
    <option disabled>-</option>
    <option value="_new_">Nouveau type</option>
    </select>
  </div>
  <div class="form-group col-sm-12">
    <label for="description_activite">Description</label>
    <textarea name="description_activite" class="form-control" id="description_activite" rows="10" placeholder="Description activité"><?= $activites['description_activite'] ?></textarea>
  </div>
  <div class="form-group col-sm-6">
    <label for="jours_dispo">Jours disponibles</label>
    <input name="jours_dispo" class="form-control" id="jours_dispo" placeholder="Jours disponibles" value="<?= $activites['jours_dispo'] ?>" />
  </div>
  <div class="form-group col-sm-6" style="display: none">
    <label for="id_activite">Id activité</label>
    <input name="id_activite" class="form-control" id="id_activite" placeholder="Id activité" value="<?= $activites['id_activite'] ?>" />
  </div>
  <div class="form-group col-sm-6">
    <label for="act_file">Image activité</label>
    <input type="file" name="act_file" id="act_file" accept="image/*" /><br>
  </div>
  <br style="clear: both">
  <?php if ($update): ?>
  <a href="?action=activiteRegisterPictures&nom_activite=<?= urlencode ($activites['nom_activite']) ?>" class="btn btn-success pull-left"><span class="glyphicon glyphicon-picture"></span> Gestion des slides (<?= count($images) ?>)</a>
  <a href="?action=activiteRegisterIndispo&nom_activite=<?= urlencode ($activites['nom_activite']) ?>" class="btn btn-success"><span class="glyphicon glyphicon-hourglass"></span> Gestion des disponibilit&eacute;s</a>
  <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-refresh"></span> Mettre à jour cette activité</button>
  <?php else: ?>
  <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span> Ajouter cette activité</button>
  <?php endif ?>  
</form>
</div>

<script>
  $("#type_activite_select").change(function () {
  if (this.value == "_new_") { $("#type_activite").val (""); $("#type_activite_new").show () }
  else { $("#type_activite_new").hide () }
  });
</script>

