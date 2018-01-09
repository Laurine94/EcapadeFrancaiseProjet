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
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/guide_plus.css">
        <link rel="stylesheet" type="text/css" href="css/select_activities_ville.css">
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

		<br>


        	<div class="phrase">
            	<h2 style="'Arial', sans-sherif; color:#999 ; margin-left:5%">         Select a city </h2>
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
    	<br>
    	<!-- /.container -->
	<?php
		} else {
	?>
	<br>
	<?php
        include 'connexion.php';
    ?>

    <?php
if (!empty($_GET['ville'])) $ville = $_GET['ville']; else header('Location: guide_plus.php');
?>

	<br>
	<br>
	<div style="height: auto; width:100%; background-position: center bottom; opacity:1.75; background-image: url(<?php echo 'img/fondsactivites/'.$sel_city.'_fond.jpg';?>); background-size: cover; padding-bottom: 50px; background-color: rgba(0,0,0,0.6)">
		<br>
		<br>
		<br>
        <div class="phrase">
            <h1 style="color:#C70039">Select a language </h1>
        </div>

		<!-- languages box -->
		
		<br>
		<br>

        <div class="container" id="languages-box">
                <div class="tableau_select_region">
                    <?php
                    $reponse = $bdd->query("SELECT * FROM activity_langues");
                        while ($donnees = $reponse->fetch()) {
                            if (file_exists('img/languages/'.$donnees['id'].'.png')) echo '
                                <div class="bloc13">
                                    <div class="contourblanc">
                                        <a href="javascript:;" data-filter=".caty_'.$donnees['id'].'">
                                            <img src="img/languages/'.$donnees['id'].'.png" alt="'.$donnees['langue'].'"/>
                                            <div class="overlay">
                                                <p>'.$donnees['langue'].'</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            ';
                        }
                    ?>
            </div>
        </div>


        <br>
        <br>

        <div class="phrase">
            <h1 style="color:#C70039">List of guides</h1>
        </div>

        <br>
        <br>
        <br>

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
			            	<div class="flip-container">
			            		<div class="flipper">
									<div class="front">
			            				<div class="contourblancbis">
			            					<div class="cercle">
													
						                				<img src="img/guides_filters/'.$donnees['id'].'.png" alt="'.utf8_decode($donnees['nom']).'"/>
						                			
						                	</div>
						                </div>
						            </div>
						            <div class="back">
						            	<a href="select_activities_guide_bis.php?guide='.$donnees['id'].'">
						            		<div class="cerclebis">
							            		<div class="guide-text">
				                    				<h3 style="color:#183e67">'.utf8_decode($donnees['nom']).'</h3>
				                        			<ul>'.implode('', $flags).'</ul>
				                    			</div>
				                    		</div>
				                    	</a>
			                    	</div>
			                	</div>
			                </div>
			            </div>
					';
				}
			?>
		</div>
			<?php
				}
			?>
	</div>

	<?php include 'pop.php'?>

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