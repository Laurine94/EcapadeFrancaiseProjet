<?php

$update =  isset($_GET["id"]) && $_GET["id"] != "";

if (isPOST ()) {
    $guide = $_POST;
} else {
    if (isset ($_GET["id"]) && $_GET["id"] != "") {
        $guide = getGuide ($_GET["id"]);
        if (!$guide) {
            dbError ();
        }
    }
}

if ($update) {
    $activities = getGuideActivities ($guide["id"]);
}

$villes = getVilleList ();
$guide_ville = getGuideVilleHash ($guide["id"]);
$languages = getLanguages ();
$guide_languages = getGuideLanguagesHash ($guide["id"]);

?>

<div class="container">
<?php if ($update): ?>
    <div class="col-sm-12 text-right">
    <form action="?action=guideDelete&id=<?= urlencode ($_GET['id']) ?>" method="POST" onsubmit="return confirm('Voulez vous vraiment le supprimer ?')" id="guideDelete">
    <button type="submit" class="btn btn-warning pull-right"><span class="glyphicon glyphicon-trash"></span> Supprimer ce guide</button>
    </form>
    <a href="<?= $conf["base_rel"] ?>/ihm_<?= $lang ?>/select_activities_guide_bis.php?guide=<?= urlencode ($_GET['id']) ?>" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Voir</a>    
    </div>
<?php endif; ?>

    <h3>Guide</h3>
<form action="?action=guideRegister&id=<?= urlencode ($_GET['id']) ?>" id="guideRegister" method="POST"  enctype="multipart/form-data">
<?php if ($update): ?>
    <span style="float: right">
    <img src="<?= $conf["base_rel"] ?>/ihm_<?= $lang ?>/img/guides_filters/<?= $guide["id"] ?>.png" style="max-width: 128px; max-height: 128px;"/>
    <br/>
    <input type="file" name="photo_file" id="photo_file" accept="image/png" />
    </span>
<?php endif; ?>
    
<div class="form-group col-sm-6" style="display: none">
  <label for="id">Id</label>
  <input name="id" class="form-control" id="id" placeholder="Id" value="<?= $guide['id'] ?>" <?= $update ? "readonly" : "" ?>/>
  </div>
<div class="form-group col-sm-6">
  <label for="nom">Nom</label>
  <input name="nom" class="form-control" id="nom" placeholder="Nom" value="<?= $guide['nom'] ?>" <?= $update ? "readonly" : "" ?>/>
  </div>
<div class="form-group col-sm-6">
  <label for="prenom">Prenom</label>
  <input name="prenom" class="form-control" id="prenom" placeholder="Prenom" value="<?= $guide['prenom'] ?>" />
  </div>
<div class="form-group col-sm-12">
  <label for="description">Description</label>
  <textarea name="description" class="form-control" id="description" placeholder="Description" rows="10"><?= $guide['description'] ?></textarea>
  </div>
<div class="form-group col-sm-6">
  <label for="ville">Ville</label>
  <input name="ville" class="form-control" id="ville" placeholder="Ville" value="<?= $guide['ville'] ?>" />
  </div>
<div class="form-group col-sm-6">
  <label for="tarif_heure">Tarif heure</label>
  <input name="tarif_heure" class="form-control" id="tarif_heure" placeholder="Tarif heure" value="<?= $guide['tarif_heure'] ?>" />
  </div>

<br style="clear: both; margin-bottom: 20px" />

<h3>Langues</h3>
<div>
  <?php foreach ($languages as $id => $language): ?>
  <div style="display: inline-block" class="text-center">
    <img src="<?= $conf["base_rel"] ?>/ihm_<?= $lang ?>/img/languages/<?= $id ?>.png" /><br><label class="checkbox-inline"><input type="checkbox" name="lang_<?= $id ?>" <?= $guide_languages[$id] ? "checked" : "" ?>><?= $language ?></label>
  </div>
  <?php endforeach; ?>
</div>

<h3>Villes propos&eacute;es</h3>
<div>
  <?php foreach ($villes as $ville): ?>
  <label class="checkbox-inline"><input type="checkbox" name="ville_<?= htmlspecialchars ($ville["id"]) ?>" value="1" <?= isset ($guide_ville[$ville["id"]]) ? "checked" : "" ?>><?= $ville["ville"] ?></label>
  <?php endforeach; ?>
</div>

<br/><br/>

  <?php if ($update): ?>
    <a href="?action=guideActivitiesRegister&id=<?= urlencode ($guide['id']) ?>&ville=<?= urlencode ($guide['ville']) ?>" class="btn btn-success pull-left"><span class="glyphicon glyphicon-picture"></span> Gestion des activit&eacute;s</a>
  <a href="?action=guideRegisterIndispo&nom_guide=<?= urlencode ($_GET["id"]) ?>" class="btn btn-success"><span class="glyphicon glyphicon-hourglass"></span> Gestion des disponibilit&eacute;s</a>
  <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-refresh"></span> Mettre à jour ce Guide</button>
  <?php else: ?>
  <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span> Ajouter ce Guide</button>
  <?php endif ?>  
    
</form>
</div>
