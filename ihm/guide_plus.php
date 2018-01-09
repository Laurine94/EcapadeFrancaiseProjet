<?php
	if (!empty($_GET['city'])) $sel_city=$_GET['city']; else $sel_city='';
	include 'connexion.php';
	$req = $bdd->prepare("SELECT * FROM ville WHERE id=:ville");// j'ai sécurisé la requete SQL avec 'prepare' pour éviter le SQL injection 
	$req->execute(array('ville'=>$sel_city));
	$donneess = $req->fetch();
	if (empty($donneess['id'])) $sel_city='';// verification q la ville choisie existe
?>
<!DOCTYPE html>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="css/guide_plus.css">
        <link href="css/select_activities.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript">
            function redimensionner(selecteur){
                var hauteur=0;
                $(selecteur).each(function(){
                    if($(this).height()>hauteur) hauteur = $(this).height();
                });

                $(selecteur).each(function(){ 
                    $(this).height(hauteur);
                });
            }
        </script>
    </head>
    <body>

	<?php include 'div_panier.php'; ?>

        <div id="entete">
            <?php include 'navbar.php'; ?>
        </div>

<?php
	if (empty($sel_city)) {
?>
        <div class="phrase">
            <h2>Selectionner une ville </h2>
        </div>
    <!-- Page Content -->
    <div class="container">
        <div class="tableau_select_region">
    <?php
		$req = $bdd->prepare("SELECT * FROM ville");
		$req->execute();
		while ($donnees = $req->fetch()) {
			if (file_exists('img/villes_activites/'.$donnees['id'].'_activites-min-3.jpg')) echo '
            <div class="bloc1">
					<a href="?city='.$donnees['id'].'"><img src="img/villes_activites/'.$donnees['id'].'_activites-min-3.jpg" alt="'.$donnees['ville'].'"/>
						<div class="overlay">
							<p style="font-family: \'Cutive\', serif;">'.$donnees['ville'].'</p>
						</div>
					</a>
				</div>
			';
		}
    ?>
        </div>
    </div>
    <!-- /.container -->
<?php
	} else {
?>
        <div class="phrase">
            <h2>Selectionner une langue </h2>
        </div>

		<!-- languages box -->
		<ul class="remix-bar filter-button-group" id="languages-box">
    <?php
		$req = $bdd->prepare("SELECT * FROM activity_langues");
		$req->execute();
		while ($donnees = $req->fetch()) {
			echo '
	<li><a href="javascript:;" data-filter=".caty_'.$donnees['id'].'"><img src="img/languages/'.$donnees['id'].'.png" alt="'.$donnees['langue'].'"/></a></li>
			';
		}
    ?>
        </ul>

        <div class="phrase">
            <h2>Liste</h2>
        </div>

		<!-- guides list -->
        <div class="text-center" id="toaddpix">
<?php
	$req = $bdd->prepare("
		SELECT A.*, C.ville AS ville_nom FROM activity_guide A 
		INNER JOIN activity_guide_ville B ON B.guide=A.id AND B.ville=:ville 
		LEFT JOIN ville C ON C.id=B.ville 
	");
	$req->execute(array('ville'=>$sel_city));
	$donneess = $req->fetchAll();
	foreach ($donneess as $donnees) {

		//=> langues
		$classes='';
		$flags=array();
		$req = $bdd->prepare("SELECT A.*, B.langue AS lng FROM activity_guide_langue A LEFT JOIN activity_langues B ON B.id=A.langue WHERE A.guide=:guide");
		$req->execute(array('guide'=>$donnees['id']));
		while ($languages = $req->fetch()) {
			$classes.=' caty_'.$languages['langue'];
			$flags[]='<li><img src="img/languages/'.$languages['langue'].'.png" alt="'.$languages['lng'].'"/></li>';
		}

		echo '
            <div class="guide-item'.$classes.'">
				<a href="select_activities_guide.php?guide='.$donnees['id'].'">
                	<img src="img/guides_filters/'.$donnees['id'].'.png" alt="'.utf8_decode($donnees['nom']).'"/>
                    <div class="guide-text">
                    	<h3>'.utf8_decode($donnees['nom']).'</h3>
                        <ul>'.implode('', $flags).'</ul>
                        <p>'.utf8_decode($donnees['description']).'</p>
                        <span>'.utf8_decode($donnees['ville_nom']).'</span>
                    </div>
                </a>
            </div>
		';
	}
?>
        </div>
<?php
	}
?>

    <?php include 'footer.php'; ?>
    <script src="plugins/mixup/isotope.pkgd.min.js"></script>
    <script language="javascript">
	if(jQuery().isotope) {
			var $grid = $('#toaddpix').isotope({});
			$('#languages-box').on( 'click', 'a', function() {
				var filterValue = $(this).attr('data-filter');
				$grid.isotope({ filter: filterValue });
			});
	}
    </script>
    </body>    
</html>