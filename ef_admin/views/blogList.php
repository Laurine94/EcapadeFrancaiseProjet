<?php
  $list = getBlogList ();
  // var_dump ($list);
?>
<div class="container">
  <a href="?action=blogRegister" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Ajouter un blog</a>
  <h2>Liste des blogs (<?= count($list) ?>)</h2>
  <?php foreach ($list as $blog): ?>
      <a href="?action=blogRegister&slug=<?= urlencode ($blog["slug"]) ?>" class="list-group-item"><span class="glyphicon glyphicon-home"></span>  <?= $blog["titre"] ?> (<?= $blog["auteur"] ?>)</a>
  <?php endforeach; ?>
</div>
</div>
