<?php

$entite = "chambre";

?>

<div class="container">
  <h2><a href="?action=mhRegister&nom_mh=<?= urlencode ($_GET["nom_mh"]) ?>"><?= htmlspecialchars ($_GET["nom_mh"]) ?></a> / <a href="?action=mhRegisterRoom&nom_mh=<?= urlencode ($_GET["nom_mh"]) ?>&nom_chambre=<?= urlencode ($_GET["nom_chambre"]) ?>"><?= htmlspecialchars ($_GET["nom_chambre"]) ?></a></h2>    
    <form action="?action=mhRegisterRoomIndispo&nom_mh=<?= urlencode ($_GET["nom_mh"]) ?>&nom_chambre=<?= urlencode ($_GET["nom_chambre"]) ?>" method="POST">
    <input type="hidden" name="nom_mh" value="<?= urlencode ($_GET["nom_mh"]) ?>" />
    <input type="hidden" name="nom_chambre" value="<?= urlencode ($_GET["nom_chambre"]) ?>" />
<?php include "indispo.php" ?>
    <br/><br/><br/>
    <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-refresh"></span> Mettre à jour les disponiblit&eacute;s</button>
</form>
</div>
