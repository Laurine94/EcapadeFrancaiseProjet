<?php
    
$update = isset($_GET["nom_mh"]) && $_GET["nom_mh"] != "";

if (isPOST()) {
    $mh = $_POST;
} else {
    if (isset ($_GET["nom_mh"]) && $_GET["nom_mh"] != "") {
        $mh = getMh ($_GET["nom_mh"]);
        if (!$mh) {
            dbError ();
        }
    }
}

$rooms = getMhRoomList ($_GET["nom_mh"]);

?>

<style>
  .chambre {
  margin: 40px;
  }
</style>

<div class="container">
    <h3>Maison d'hôte</h3>
<?php if ($update): ?>
    <div class="col-sm-12 text-right">
    <form action="?action=mhDelete&nom_mh=<?= urlencode ($_GET['nom_mh']) ?>" method="POST" onsubmit="return confirm('Voulez vous vraiment la supprimer ?')" id="mhDelete">
    <button type="submit" class="btn btn-warning pull-right"><span class="glyphicon glyphicon-trash"></span> Supprimer cette maison</button>
  </form>
  <a href="<?= $conf["base_rel"] ?>/ihm_<?= $lang ?>/select_room.php?nom_mh=<?= urlencode ($_GET["nom_mh"]) ?>" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> Voir</a>
    </div>
<?php endif; ?>
    <br>
<h2><a href="?action=mhRegister&nom_mh=<?= urlencode ($_GET['nom_mh']) ?>"><?= htmlspecialchars ($_GET['nom_mh']) ?></a></h2>
    <br>

<form action="?action=mhRegister&nom_mh=<?= urlencode ($_GET['nom_mh']) ?>" id="mhRegister" method="POST" enctype="multipart/form-data">
  
  <div class="form-group col-sm-6">
    <label for="nom">Nom</label>
    <input name="nom" class="form-control" id="nom" placeholder="Nom" value="<?= $mh['nom'] ?>" />
  </div>
    
  <div class="form-group col-sm-6">
    <label for="prenom">Prénom</label>
    <input name="prenom" class="form-control" id="prenom" placeholder="Prénom"  value="<?= $mh['prenom'] ?>" />
  </div>

  
  <div class="form-group col-sm-6">
    <label for="nom_mh">Nom de la maison d&apos;hôte</label>
    <input name="nom_mh" class="form-control" id="nom_mh" placeholder="Nom de la maison"  value="<?= $mh['nom_mh'] ?>" <?= $update ? "readonly" : "" ?> />
  </div>
  
  <div class="form-group col-sm-6">
    <label for="ville">Ville</label>
    <input name="ville" class="form-control" id="ville" placeholder="Ville"  value="<?= $mh['ville'] ?>" />
  </div>

  <div class="form-group col-sm-12">
    <label for="adresse_mh">Adresse</label>
    <textarea name="adresse_mh" class="form-control" id="adresse_mh" rows="4"><?= $mh['adresse_mh'] ?></textarea>
  </div>

  <div class="form-group col-sm-12">
    <label for="description_mh">Description</label>
    <textarea name="description_mh" class="form-control" id="description_mh" rows="10"><?= $mh['description_mh'] ?></textarea>
  </div>

  <div class="form-group col-sm-12">
    <label for="note_mh">Note</label>
    <textarea name="note_mh" class="form-control" id="note_mh" rows="10"><?= $mh['note_mh'] ?></textarea>
  </div>                                                                                                                                                      
<?php if ($update): ?>
  <a href="?action=mhRegisterPictures&nom_mh=<?= urlencode ($mh['nom_mh']) ?>" class="btn btn-success"><span class="glyphicon glyphicon-picture"></span> Gestion de la photo</a>
  <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-refresh"></span> Mettre à jour cette maison d&apos;hôte</button>
<?php else: ?>
  <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span> Ajouter cette maison d&apos;hôte</button>
<?php endif ?>

</form>

<?php if ($update): ?>
<h3 style="clear: both; margin-top: 60px">Liste des chambres (<?= count ($rooms) ?>)</h3>

<div class="list-group">
<?php foreach ($rooms as $room): ?>
<a class="list-group-item" href="?action=mhRegisterRoom&nom_mh=<?= urlencode ($room['nom_mh']) ?>&nom_chambre=<?= urlencode ($room['nom_chambre']) ?>"><span class="glyphicon glyphicon-bed"></span> <?= $room['nom_chambre'] ?></a>
<?php endforeach; ?>
</div>

<a href="?action=mhRegisterRoom&nom_mh=<?= urlencode ($mh['nom_mh']) ?>" class="btn btn-success chambre"><span class="glyphicon glyphicon-plus"></span> Ajouter une chambre</a>
<?php endif; ?>
</div>
                                                                                           
