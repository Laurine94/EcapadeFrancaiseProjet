<?php

$update =  isset($_GET["slug"]) && $_GET["slug"] != "";
if (isPOST ()) {
    $blog = $_POST;
} else {
    if (isset ($_GET["slug"]) && $_GET["slug"] != "") {
        $blog = getBlog ($_GET["slug"]);
        if (!$blog) {
            dbError ();
        }
    }
}
?>

<div class="container">
<?php if ($update): ?>
    <div class="col-sm-12 text-right">
    <form action="?action=blogDelete&slug=<?= urlencode ($_GET['slug']) ?>" method="POST" onsubmit="return confirm('Voulez vous vraiment le supprimer ?')">
    <button type="submit" class="btn btn-warning pull-right"><span class="glyphicon glyphicon-trash"></span> Supprimer ce blog</button>
    </form>
    </div>
<?php endif; ?>
  
        <h3>Blog</h3>

<form action="?action=blogRegister&slug=<?= urlencode ($_GET['slug']) ?>" id="blogRegister" method="POST"  enctype="multipart/form-data">
<div class="form-group col-sm-6">
  <label for="auteur">Auteur</label>
  <input name="auteur" class="form-control" id="auteur" placeholder="Auteur" value="<?= $blog['auteur'] ?>" />
  </div>
<div class="form-group col-sm-6">
  <label for="titre">Titre</label>
  <input name="titre" class="form-control" id="titre" placeholder="Titre" value="<?= $blog['titre'] ?>" <?= $update ? "readonly" : "" ?> />
  </div>
<div class="form-group col-sm-12">
  <label for="description">Description</label>
  <textarea name="description" class="form-control" id="description" placeholder="Description" rows="10"><?= $blog['description'] ?></textarea>
  </div>

  <div class="form-group col-sm-6">
    <label for="blog_file">Image Blog</label>
    <input type="file" name="blog_file" id="blog_file" accept="image/*" /><br>
  </div>

    
  <?php if ($update): ?>
  <!-- 
       <a href="?action=blogRegisterPictures&slug=<?= urlencode ($blog['slug']) ?>" class="btn btn-success pull-left"><span class="glyphicon glyphicon-picture"></span> Gestion des slides (<?= count($images) ?>)</a>
       -->
  <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-refresh"></span> Mettre à jour ce blog</button>
  <?php else: ?>
  <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus"></span> Ajouter ce blog</button>
  <?php endif ?>  
    
</form>
</div>
