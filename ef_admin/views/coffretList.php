<?php
  $list = getCoffretList ();
  // var_dump ($list);
?>
<div class="container">
  <a href="?action=coffretRegister" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Ajouter un coffret</a>
  <h2>Liste des coffrets (<?= count($list) ?>)</h2>
  <?php foreach ($list as $coffret): ?>
      <a href="?action=coffretRegister&id=<?= urlencode ($coffret["id"]) ?>" class="list-group-item"><span class="glyphicon glyphicon-home"></span>  <?= $coffret["titre"] ?> (<?= $coffret["prix"] ?>)</a>
  <?php endforeach; ?>
</div>
</div>
