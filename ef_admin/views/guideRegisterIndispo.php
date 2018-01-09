<?php

$guide = getGuide ($_GET["nom_guide"]);
if (!$guide) httpError (404);

$entite = "guide";

?>

<div class="container">
  <h2><a href="?action=guideRegister&id=<?= urlencode ($guide["id"]) ?>"><?= htmlspecialchars ($guide["nom"]) ?></a></h2>    
    <form action="?action=guideRegisterIndispo&nom_guide=<?= urlencode ($guide["id"]) ?>" method="POST">
    <input type="hidden" name="nom_guide" value="<?= urlencode ($guide["id"]) ?>" />
<?php include "indispo.php" ?>
    <br/><br/><br/>
    <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-refresh"></span> Mettre à jour les disponiblit&eacute;s</button>
</form>
</div>
