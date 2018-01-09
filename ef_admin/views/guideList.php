<?php
  $list = getGuideList ();
// var_dump ($list);
?>
<div class="container">
  <a href="?action=guideRegister" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Ajouter un Guide</a>
  <h2>Liste des Guides (<?= count($list) ?>)</h2>
  <?php foreach ($list as $guide): ?>
      <a href="?action=guideRegister&id=<?= urlencode ($guide["id"]) ?>" class="list-group-item"><span class="glyphicon glyphicon-home"></span>  <?= $guide["nom"] ?> (<?= $guide["ville"] ?>)</a>
  <?php endforeach; ?>
</div>
</div>
