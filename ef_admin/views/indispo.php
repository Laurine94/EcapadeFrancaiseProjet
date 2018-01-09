<?php
  if (!$entite) httpError (500);

$indispos = array ();

if (isset ($_GET["nom_" . $entite])) {
    $indispos = getIndispo ($entite, $_GET["nom_" . $entite]);
}
?>

<script src="../../ihm_en/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="../../ihm_en/css/datepicker.css" />
  
<style>
#indispoTemplate {
    display: none;
}
</style>

<div class="row col-md-12">
  <a id="indispoAdd" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span></a>
  <label>Indisponibilit&eacute;s</label>
</div>

<div id="indispoTemplate" class="col-md-12">
  <div class="col-md-5">D&eacute;but
    <input name="indispo-debut[]" placeholder="Date de d&eacute;but" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true"/>
  </div>
  <div class="col-md-3">Fin
    <input name="indispo-fin[]" placeholder="Date de fin" data-provide="datepicker"  data-date-format="dd/mm/yyyy" data-date-autoclose="true"/>
  </div>
  <div class="col-md-4 text-right">
    <a class="indispoRemove btn btn-warning"><span class="glyphicon glyphicon-remove"></span></a>
  </div>
</div>

<div>
  <div id="indispo" class="col-md-12">

  </div>
</div>

    <script>

      function indispoAdd(debut, fin) {
    
    $("#indispoTemplate input").eq(0).val (debut);
    $("#indispoTemplate input").eq(1).val (fin);

    var indispo = $("#indispoTemplate").clone ();
    indispo.attr ("id", "");

    $("#indispo").append (indispo);
    
    $(".indispoRemove").off ("click");
    $(".indispoRemove").click (function () {
	$(this).parent().parent().remove ();
    });
}

$("#indispoAdd").click (function () {
    indispoAdd ("", "");
});

$(function() {
	<?php foreach ($indispos as $indispo): ?>
	indispoAdd ("<?= indispoJSDate ($indispo["date_debut"]) ?>", "<?= indispoJSDate ($indispo["date_fin"]) ?>");
	<?php endforeach; ?>
	  
});

</script>
