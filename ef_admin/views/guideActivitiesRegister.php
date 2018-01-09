<?php

if (isset ($_GET["id"]) && $_GET["id"] != "") {
    $guide = getGuide ($_GET["id"]);
    if (!$guide) {
        dbError ();
    }
} else {
    httpError (500);
}

$activities = getActiviteListByType ("Visites", "ville");

if ($guide) {
    $activitiesHash = getGuideActivitiesHash ($_GET["id"]);
}

$ville = "";
?>

<div class="container">
  
  <h2>Liste des activit&eacute;s de <a href="?action=guideRegister&id=<?= urlencode ($guide["id"]) ?>"><?= $guide["nom"] ?></a></h2>
  <form action="?action=guideActivitiesRegister&id=<?= urlencode ($_GET['id']) ?>" id="guide" method="POST">
  <?php foreach ($activities as $activity): ?>
  <?php if ($ville != $activity["ville"]): ?>
  <?= $ville == "" ? "" : "</div>" ?>

  <h3 id="<?= to_valid_filename ($activity["ville"]) ?>" class="ville-title btn btn-success col-md-12"><?= $activity["ville"] ?></h3>
  <div id="ville-<?= to_valid_filename ($activity["ville"]) ?>" class="ville-content col-md-12 list-group" style="display: none">
  <?php $ville = $activity["ville"]; endif; ?>
  <div class="col-md-12 form-group">
    <input type="checkbox" class="pull-left" name="activity_<?= htmlspecialchars (str_replace (" ", "_", $activity['id_activite'])) ?>" <?= $activitiesHash[$activity['id_activite']] ? "checked" : "" ?> /><span class="list-group-item col-md-10"><span class="glyphicon glyphicon-home"></span>  <?= $activity["nom_activite"] ?> <a href="?action=activiteRegister&nom_activite=<?= urlencode ($activity["nom_activite"]) ?>" class="pull-right">Voir</a></span>
  </div>
  <?php endforeach; ?>
</div>

  <button type="submit" class="btn btn-primary pull-right" style="margin-top: 20px"><span class="glyphicon glyphicon-refresh"></span> Mettre à jour</button>
</form>
</div>

<script>
    $(function() {
	$(".ville-title").click (function() {
	    $("#ville-" + $(this).attr ("id")).toggle ();
	});
	$("#ville-<?= to_valid_filename ($_GET["ville"]) ?>").show ();

	$(".list-group-item").click (function () {
	    var cb = $(this).parent().children().eq(0);
        if (cb.attr ("checked")) {
            cb.removeAttr ("checked");
        } else {
            cb.attr ("checked", "checked");
        }
	});
    });
  
</script>
