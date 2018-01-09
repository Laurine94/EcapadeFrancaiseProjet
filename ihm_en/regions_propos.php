<link rel="stylesheet" type="text/css" href="css/popup.css" />
<link rel="stylesheet" type="text/css" href="css/regions.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/modernizr.custom.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="js/popup.js"></script>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic|Montserrat:400,700' rel='stylesheet' type='text/css'>
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

<?php   
    $reponse = $bdd->query('SELECT DISTINCT description_ville, ville, id FROM ville');
    while ($donnees = $reponse->fetch()) echo '
		<div class="modal1 blur-effect" id="' . $donnees['id'] . '">
			<div class="popup-content">
				<h3>' . $donnees['ville'] . '</h3>
				<div>
					<p class="para">' . $donnees['description_ville'] . '</p>
					<div class="close"></div>
				</div>
			</div>
		</div>
	';
?>
        
<!-- FIN DE LA POPUP -->


<div class="tableau">
<?php   
    $reponse = $bdd->query('SELECT DISTINCT description_ville, ville, id FROM ville');
    while ($donnees = $reponse->fetch()) if (file_exists('img/villes_activites/'.$donnees['id'].'_activites-min-1.jpg')) echo '
		<div class="bloc1">
			<img src="img/villes_activites/'.$donnees['id'].'_activites-min-1.jpg" class="popup-button" data-modal="'.$donnees['id'].'"/>
		</div>
		<div class="overlay">
			<p>'.$donnees['id'].'</p>
		</div>
	';
    $reponse->closeCursor();
?>
</div>

<div class="overlay"></div><!-- La div overlay -->
    
		
<!-- Le script qui crée la popup -->
<script src="js/popup.js"></script>

<!-- Pour l'effet blur -->
<script>
    // this is important for IEs
    var polyfilter_scriptpath = '/js/';
</script>
<script src="js/cssParser.js"></script>
<script src="js/css-filters-polyfill.js"></script>

<script type="text/javascript">
    redimensionner('div.bloc_adapt0');
    redimensionner('div.bloc_adapt1');
</script>
