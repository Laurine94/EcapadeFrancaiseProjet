<?php
  $list = getActiviteList ();
  // var_dump ($list);
?>
<div class="container">
  <a href="?action=activiteRegister" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Ajouter une activité</a>
  <h2>Liste des activités (<?= count($list) ?>)</h2>
  <?php foreach ($list as $ac): ?>
      <a href="?action=activiteRegister&nom_activite=<?= urlencode ($ac["nom_activite"]) ?>" class="list-group-item"><span class="glyphicon glyphicon-home"></span>  <?= $ac["nom_activite"] ?> (<?= $ac["nom"] ?> <?= $ac["prenom"] ?> <?= $ac["ville"] ?>)</a>
  <?php endforeach; ?>
</div>
</div>
