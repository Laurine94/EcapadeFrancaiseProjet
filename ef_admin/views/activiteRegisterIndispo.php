<?php

$entite = "activite";

?>

<div class="container">
  <h2><a href="?action=activiteRegister&nom_activite=<?= urlencode ($_GET["nom_activite"]) ?>"><?= htmlspecialchars ($_GET["nom_activite"]) ?></a></h2>    
    <form action="?action=activiteRegisterIndispo&nom_activite=<?= urlencode ($_GET["nom_activite"]) ?>" method="POST">
    <input type="hidden" name="nom_activite" value="<?= urlencode ($_GET["nom_activite"]) ?>" />
<?php include "indispo.php" ?>
    <br/><br/><br/>
    <button type="submit" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-refresh"></span> Mettre à jour les disponiblit&eacute;s</button>
</form>
</div>
