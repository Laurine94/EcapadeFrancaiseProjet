<?php
  if (!$entite) httpError (500);

$prixselect = array ();

if (isset ($_GET["nom_" . $entite])) {
    $prixselect = getPrixSelect ($entite, $_GET["nom_" . $entite]);
}
?>
<style>
  /*
  #ps {
  }
#psAdd, .psRemove {
    width: 32px;
    }
    */
#psTemplate {
    display: none;
}
</style>

<div class="row col-md-12">
  <a id="psAdd" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span></a>
  <label>Prix variables</label>
</div>

<div id="psTemplate" class="col-md-12">
  <div class="col-md-5">
    <input name="ps-titre[]" placeholder="Titre prix" />
  </div>
  <div class="col-md-3">
    <input name="ps-prix[]" placeholder="Prix" />
  </div>
  <div class="col-md-4 text-right">
    <a class="psRemove btn btn-warning"><span class="glyphicon glyphicon-remove"></span></a>
  </div>
</div>

<div>
  <div id="ps" class="col-md-12">

  </div>
</div>

    <script>

function psAdd(titre, prix) {
    
    $("#psTemplate input").eq(0).val (titre);
    $("#psTemplate input").eq(1).val (prix);

    var ps = $("#psTemplate").clone ();
    ps.attr ("id", "");

    $("#ps").append (ps);
    
    $(".psRemove").off ("click");
    $(".psRemove").click (function () {
	$(this).parent().parent().remove ();
    });
}

$("#psAdd").click (function () {
    psAdd ("", "");
});

$(function() {
	<?php foreach ($prixselect as $ps): ?>
	psAdd ("<?= $ps["titre"] ?>", <?= $ps["prix"] ?>);
	<?php endforeach; ?>
	  
});

</script>
