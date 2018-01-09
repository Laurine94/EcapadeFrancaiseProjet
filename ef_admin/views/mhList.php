<?php
$list = getMhList ();
// var_dump ($list);
?>
<div class="container">
     <a href="?action=mhRegister" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Ajouter une maison d&apos;hôte</a>
     <h2>Liste des maisons d'hôte (<?= count($list) ?>)</h2>
<?php foreach ($list as $mh): ?>
<a href="?action=mhRegister&nom_mh=<?= urlencode ($mh["nom_mh"]) ?>" class="list-group-item"><span class="glyphicon glyphicon-home"></span>  <?= $mh["nom_mh"] ?>  (<?= $mh["nom"] ?> <?= $mh["prenom"] ?>)</a>
<?php endforeach; ?>
</div>
</div>