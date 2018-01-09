<?php
  $list = getVilleList ();
  // var_dump ($list);
?>
<div class="container">
  <a href="?action=villeRegister" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Ajouter une Ville</a>
  <h2>Liste des villes (<?= count($list) ?>)</h2>
  <?php foreach ($list as $ville): ?>
      <a href="?action=villeRegister&ville=<?= urlencode ($ville["ville"]) ?>" class="list-group-item"><span class="glyphicon glyphicon-home"></span>  <?= $ville["ville"] ?> </a>
  <?php endforeach; ?>
</div>
</div>
