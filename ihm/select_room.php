<!DOCTYPE html>
<?php include 'connexion.php';

// Si tout va bien, on peut continuer
//On récupère la valeur de la maison d'hote sélectionnée
$nom_mh = $_GET['nom_mh'];

// On récupère tout le contenu de la table chambre en prenant en compte la ville choisie
$reponse = $bdd->query('SELECT * FROM chambre inner join maison_hote on chambre.nom_mh=maison_hote.nom_mh where chambre.nom_mh = "' . $nom_mh . '" order by prix_chambre');
?>

<html>
    <head>
        <meta charset="UTF-8"> 
        <link href="css/select_guesthouse.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/w3.css">
        <link rel="stylesheet" type="text/css" href="css/select_room.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/datepicker.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="css/calendar2.js"></script>
        <script>
            $( function() {
                $( "#date_debut" ).datepicker();
            } );
        </script>
        <script>
            $( function() {
                $( "#date_fin" ).datepicker();
            } );
        </script>

        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        
        
        
        
        
        <?php
    function suppr_accents($str, $encoding='utf-8')
    {
        // transformer les caractères accentués en entités HTML
        $str = htmlentities($str, ENT_NOQUOTES, $encoding);

        // remplacer les entités HTML pour avoir juste le premier caractères non accentués
        // Exemple : "&ecute;" => "e", "&Ecute;" => "E", "Ã " => "a" ...
        $str = preg_replace('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $str);

        // Remplacer les ligatures tel que : Œ, Æ ...
        // Exemple "Å“" => "oe"
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str);
        // Supprimer les quotes
        $str = preg_replace('#"#', '', $str);
        // Supprimer tout le reste
        $str = preg_replace('#&[^;]+;#', '', $str);

        return $str;
    }
?>
        
        
        
        
        
        
        
        <?php include 'div_panier.php'; ?>
        
        <div id="entete">
                <?php include 'navbar.php'; ?>
        </div>
        <br>
        <div id="center">
            <ul class="menu_guesthouse">
                <li><a href="guesthouse.php" style="text-decoration:none;color:grey;">1. Choose your City</a></li>
                
                <?php
                    $back = $bdd->query('SELECT ville FROM maison_hote where nom_mh="' . $nom_mh . '"');
                    while ($nom_ville = $back->fetch()){
                        echo '<li><a href="select_guesthouse.php?ville=' . $nom_ville['ville'] . '" style="text-decoration:none;color:grey;">2. Choose your Guesthouse</a></li>';
                    }
                ?>
                
                <li class="guesthouse_active">3. Book your Room</li>
                <li>4. Confirm</li>
            </ul>
        </div>
        <br /><br />
		<div class="presentation_ville">
        	<div class="ville_description">
<?php
	$desc = $bdd->query('
		SELECT *, (SELECT COUNT(*) FROM chambre where chambre.nom_mh=maison_hote.nom_mh) AS rooms_nbr 
		FROM maison_hote where nom_mh = "' . $nom_mh . '"
	');
    while ($donnees = $desc->fetch()){
        echo '<h1>' . $nom_mh . '</h1>';
        echo '<p>' . $donnees['description_mh'] . '</p>';
        echo '<p><b>Nombre de chambres: ' . $donnees['rooms_nbr'] . '</b></p>';
    }
    $desc->closeCursor(); // Termine le traitement de la requête
?>
			</div>
        </div>
        <br />

<?php
// On cree une variable pour numeroter les slides
$a = 0;

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>

<div id="grande_div">
<div class="titre">

<?php
    echo '<h1>' . $donnees['nom_chambre'] . '</h1>';    
?>
    
    
</div>
<div class="div_75 toSize">
    <div class="w3-content" style="width:95%; margin-right:10px;">        
        <?php
            $texte = "img/guesthouses/" . $nom_mh . "/" . $donnees['nom_chambre'];
            $rp= suppr_accents($texte); // nom du répertoire à lister
            $rep=opendir($rp);
            while ($nom_img=readdir($rep)) 	{ // parcours du répertoire
            if (($nom_img==".") || ($nom_img=="..")){echo "";}
                else 
                {	
                    echo '<img class="mySlides' . $a . '" src="' . $rp . '/' . $nom_img . '" style="width:100%">';
                }
            }
            closedir($rep);
        ?>
        
        
        
        <div class="w3-row-padding w3-section">
            <?php
                $texte = "img/guesthouses/" . $nom_mh . "/" . $donnees['nom_chambre'];
                $rp= suppr_accents($texte); // nom du répertoire à lister
                $rep=opendir($rp);
                $nbr = 1;
                while ($nom_img=readdir($rep)) 	{ // parcours du répertoire
                if (($nom_img==".") || ($nom_img=="..")){echo "";}
                    else 
                    {	
                        echo '<div class="w3-col s1">';
                        echo '<img class="demo w3-opacity w3-hover-opacity-off" src="' . $rp . '/' . $nom_img . '" style="width:100%"';
                        echo 'onclick="currentDiv(' . $nbr . ', ';
                        echo "'mySlides" . $a . "')";
                        echo '">';
                        echo '</div>';
                        $nbr = $nbr + 1;
                    }
                }
                closedir($rep);
            ?>
        
        </div>       
        
    </div>
</div>
    
<div class="div_25 toSize">
    <div class="sous_div">
        <p style="font-weight:bold; font-size:18px; text-align: center;">Select your visit dates:</p>
        <form action="fonctionAdd.php" method="get">
            <input type="hidden" name="cookie_name" value="gh">
            <input type="hidden" name="type" value="gh">
            <input type="hidden" name="cookie_val" value="<?php echo $donnees['nom_chambre']; ?>">
            <label class="label" for="date_debut">
                Arrival date:<br />
                <input type="text" class="calendrier" id="date_debut<?php echo $a; ?>" name="date_debut">
            </label>
            <br /><br />
            <label class="label" for="date_fin">
                Departure date:<br />
                <input type="text" class="calendrier" id="date_fin<?php echo $a; ?>" name="date_fin"/>
            </label>
        
            <script src="js/jquery-1.9.1.min.js"></script>
            <script src="js/bootstrap-datepicker.js"></script>
            <script type="text/javascript">
                // When the document is ready
                $(document).ready(function () {

                    $('#date_debut<?php echo $a; ?>').datepicker({
                        format: "dd/mm/yyyy",
                        startDate: "today",
                        autoclose: true

                    });
                    
                    $('#date_fin<?php echo $a; ?>').datepicker({
                        format: "dd/mm/yyyy",
                        startDate: "today",
                        autoclose: true

                    });  
                });
            </script>
            <br /><br />
            Capacity : <?php echo $donnees['nb_places']; ?> person(s).
            <br /><br />
            
<?php
    echo '<p style="font-size:20px;" id="prix_' . $donnees['nom_chambre'] . '">Prix: <strong>' . $donnees['prix_chambre'] . '€</strong></p>';
?>

            
            <a><input type="submit" value="Book" class="submit_btn"/></a>
        </form>
        <br /><br />
    </div>
</div>
    
<div class="div_100">
    
<?php
    echo '<p>' . $donnees['description_chambre'] . '</p>';
?>

    <p><span style="text-decoration:underline;">Services</span>&nbsp;:
    
<?php
    if ($donnees['wifi']==true)
        echo '<img class="icone" src="img/icons/wifi_grey.png" alt="wifi" title="Wifi">';
    if ($donnees['coffre_fort']==true)
        echo '<img class="icone" src="img/icons/safe_grey.png" alt="safe" title="Safe">';
    if ($donnees['douche']==true)
        echo '<img class="icone" src="img/icons/shower_grey.png" alt="shower" title="Shower">';
    if ($donnees['baignoire']==true)
        echo '<img class="icone" src="img/icons/bathtub_grey.png" alt="bathtub" title="Bathtub">';
    if ($donnees['tel']==true)
        echo '<img class="icone" src="img/icons/phone_grey.png" alt="phone" title="Phone">';
    if ($donnees['tv']==true)
        echo '<img class="icone" src="img/icons/tv_grey.png" alt="tv" title="TV">';
    if ($donnees['serviettes']==true)
        echo '<img class="icone" src="img/icons/towels_grey.png" alt="towels" title="Towels">';
    if ($donnees['bureau']==true)
        echo '<img class="icone" src="img/icons/desk_grey.png" alt="desk" title="Desk">';
    if ($donnees['cuisine']==true)
        echo '<img class="icone" src="img/icons/kitchen_grey.png" alt="kitchen" title="Kitchen">';
    if ($donnees['mini_bar']==true)
        echo '<img class="icone" src="img/icons/mini_bar_grey.png" alt="mini_bar" title="Mini-Bar">';
    if ($donnees['ventilateurs']==true)
        echo '<img class="icone" src="img/icons/fan_grey.png" alt="fan" title="Fan / Air Conditioning">';
    if ($donnees['seche_cheveux']==true)
        echo '<img class="icone" src="img/icons/hair_dryer_grey.png" alt="hair_dryer" title="Hair Dryer">';
?>
    
</p>    
<p>The arrival time is at <?php echo $donnees['heure_arr']; ?> and the departure time at <?php echo $donnees['heure_dep']; ?>.<br /></p>
    
    </div>
</div>

<?php
$a = $a + 1;
echo '<br />';
}
$reponse->closeCursor(); // Termine le traitement de la requête
?>
        
<?php
  $adr = $bdd->query('SELECT * FROM maison_hote where nom_mh = "' . $nom_mh . '"');
    while ($donnees = $adr->fetch()){
        echo '<div class="carte">';
        echo $donnees['adresse_mh'];
        echo '</div>';
    }
    $adr->closeCursor(); // Termine le traitement de la requête
?>
        
<?php include 'pop.php'?>

<?php include 'footer.php'; ?>
</body>





<script>
var slideIndex = 1;
showDivs(slideIndex, "mySlides0");
showDivs(slideIndex, "mySlides1");
showDivs(slideIndex, "mySlides2");
showDivs(slideIndex, "mySlides3");
showDivs(slideIndex, "mySlides4");
showDivs(slideIndex, "mySlides5");
showDivs(slideIndex, "mySlides6");
showDivs(slideIndex, "mySlides7");
showDivs(slideIndex, "mySlides8");
showDivs(slideIndex, "mySlides9");
showDivs(slideIndex, "mySlides10");
showDivs(slideIndex, "mySlides11");
showDivs(slideIndex, "mySlides12");
showDivs(slideIndex, "mySlides13");
showDivs(slideIndex, "mySlides14");
showDivs(slideIndex, "mySlides15");

function plusDivs(n, mySlides) {
  showDivs(slideIndex += n, mySlides);
}

function currentDiv(n, mySlides) {
  showDivs(slideIndex = n, mySlides);
}

function showDivs(n, mySlides) {
  var i;
  var y = mySlides;
  var x = document.getElementsByClassName(y);
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}
</script>

<script type="text/javascript">
    //redimensionner('div.toSize');
    
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