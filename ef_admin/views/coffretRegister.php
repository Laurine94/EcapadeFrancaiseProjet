<?php

$update =  isset($_GET["id"]) && $_GET["id"] != "";

if (isPOST ()) {
    $coffret = $_POST;
} else {
    if (isset ($_GET["id"]) && $_GET["id"] != "") {
        $coffret = getCoffret ($_GET["id"]);
        if (!$coffret) {
            dbError ();
        }
    }
}

?>

<div class="container">
<?php if ($update): ?>
    <div class="col-sm-12 text-right">
    <form action="?action=coffretDelete&id=<?= urlencode ($_GET['id']) ?>" method="POST" onsubmit="return confirm('Voulez vous vraiment le supprimer ?')">
    <button type="submit" class="btn btn-warning pull-right"><span class="glyphicon glyphicon-trash"></span> Supprimer ce coffret</button>
    </form>
    </div>
<?php endif; ?>
  
        <h3>Coffret</h3>
    
<form action="?action=coffretRegister&id=<?= urlencode ($_GET['id']) ?>" id="coffret" method="POST">
<div class="form-group col-sm-6" style="display: none">
  <label for="id">Id</label>
  <input name="id" class="form-control" id="id" placeholder="Id" value="<?= $coffret['id'] ?>" />
  </div>
<div class="form-group col-sm-6">
  <label for="nom">Nom</label>
  <input name="nom" class="form-control" id="nom" placeholder="Nom" value="<?= $coffret['nom'] ?>" <?= $update ? "readonly" : "" ?> />
  </div>
<div class="form-group col-sm-6">
  <label for="prix">Prix</label>
  <input name="prix" class="form-control" id="prix" placeholder="Prix" value="<?= $coffret['prix'] ?>" />
  </div>
<div class="form-group col-sm-12">
  <label for="titre">Titre</label>
  <input name="titre" class="form-control" id="titre" placeholder="Titre" value="<?= $coffret['titre'] ?>" />
  </div>
<div class="form-group col-sm-12">
  <label for="description">Description</label>
  <textarea name="description" class="form-control" id="description" placeholder="Description" rows="10"><?= $coffret['description'] ?></textarea>
  </div>    
<div class="form-group col-sm-12">
  <label for="conditions">Conditions</label>
  <textarea name="conditions" class="form-control" id="conditions" placeholder="Conditions" rows="10"><?= $coffret['conditions'] ?></textarea>
  </div>    
<label class="checkbox-inline">
  <input type="checkbox" name="disponible" value="1" <?= isset ($coffret['disponible']) && $coffret['disponible'] > 0 ? "checked" : "" ?>/>Disponible</label>
<br style="clear: both; margin-bottom: 20px" />
  <?php if ($update): ?>
       <a href="?action=coffretRegisterPictures&id=<?= urlencode ($coffret['id']) ?>" class="btn btn-success pull-left"><span class="glyphicon glyphicon-picture"></span> Gestion des photos (<?= count($images) ?>)</a>
  <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-refresh"></span> Mettre à jour ce coffret</button>
  <?php else: ?>
  <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span> Ajouter ce coffret</button>
  <?php endif ?>  
                                                                                                                                        
</form>
</div>
