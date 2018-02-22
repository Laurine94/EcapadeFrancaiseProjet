<!DOCTYPE html>
<?php
include 'connexion.php';
$ville = $_GET['ville'];

$reponse = $bdd->query('
	SELECT *, (SELECT COUNT(*) FROM chambre where chambre.nom_mh=maison_hote.nom_mh) AS rooms_nbr 
	FROM maison_hote where ville = "' . $ville . '"
');
?>

<html>
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111755406-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111755406-1');
</script>
       <meta charset="utf-8"> 
       <link href="css/select_guesthouse.css" rel="stylesheet">
       <link href="css/select_activities.css" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
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

            function redimensionner1(selecteur){
                var hauteur=$('.div_65').height;
                $(selecteur).each(function(){
                    $(this).height(hauteur);
                });
            }

        </script>
    </head>
    <body>
        
        <div id="global">
            <div id="entete">
                <?php include 'navbar.php'; ?>
            </div>
            <br>
            <div id="center">
                <ul class="menu_guesthouse">
                    <li><a href="guesthouse.php" style="text-decoration:none;color:grey;">Choose your city</a></li>
                    <li class="guesthouse_active">Choose your guesthouse</li>
                    <li>Book your room</li>
                    <li>Confirm</li>
                </ul>
            </div>
            <br><br><br>
            <div id="contenu"> 
                <br>



                <div class="tableau_select_region">



                <?php
                    $abc = $bdd->query("SELECT DISTINCT ville, id FROM ville WHERE ville='$ville'");
                        while ($donnees = $abc->fetch()) {
                            if (file_exists('img/guest/'.$donnees['id'].'_pres.jpg')) echo '
                                <div class="bloc15">
                                            <img src="img/guest/'.$donnees['id'].'_pres.jpg" alt="'.$donnees['ville'].'"/>
                                            <div class="overlay">
                                                <p>'.$donnees['ville'].'</p>
                                            </div>
                                        </a>
                                </div>
                            ';
                        }
                    ?>

                    <?php
                        $abc->closeCursor(); // Termine le traitement de la requête
                    ?>

                </div>

                
                
                
                
                <!--<?php
                    $abc = $bdd->query('SELECT DISTINCT description_ville, ville, id FROM ville WHERE VILLE="' . $ville .'"');
                    while ($donnees = $abc->fetch()){
                        echo '<div class="presentation_ville">';
                        /*echo '<div class="ville_image">';
                        echo '<img src="img/paris_panoramique_2.jpg" alt="...">';
                        echo '</div>';*/
                        echo '<div class="ville_description">';
                        echo '<h1>' . $donnees['ville'] . '</h1>';
                        echo '<p>' . $donnees['description_ville'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                
                ?>


                
                <?php
                    $abc->closeCursor(); // Termine le traitement de la requête
                ?>-->
            </div>

            <br>
            <br>
            <br>
                
                <div id="intro"><h2 style="font-family:align-center; text-align: center">OUR GUESTHOUSES</h2></div>
                <br>
                <br>
                <br>
                <br>
                
                <?php
                    $a = 0;
                    while ($donnees = $reponse->fetch()){
                        echo '<div class="grande_div">';
                        echo '<div class="div_35 toSize' . $a . '">';
                        echo '<img class="img_reduc" src="img/presentation_mh/';
                        $xyz = $bdd->query('
							SELECT DISTINCT *
							FROM img_mh inner join maison_hote on img_mh.nom_mh=maison_hote.nom_mh 
							where maison_hote.nom_mh="' . $donnees['nom_mh'] . '"
						');
                        while ($data = $xyz->fetch()){
                            echo $data['nom_img'];
                        }
                        $xyz->closeCursor(); // Termine le traitement de la requête
                        echo '" alt="...">';
                        echo '</div>';
                        
                        echo '<div class="div_65 toSize' . $a . '">';
                        echo'<br><br><br>';
                        echo '<h2>' . $donnees['nom_mh'] . '</h2>';
                        echo '<p>' . $donnees['description_mh'] . '</p>';
                        echo '<p><b>Number of rooms: ' . $donnees['rooms_nbr'] . '</b></p>';
                                                echo '<span>' . $donnees['note_mh'] . '</span>';
                            $nom_mh=$donnees['nom_mh'];
                        $adr = $bdd->query("SELECT adresse_mh FROM maison_hote where nom_mh = '$nom_mh'");
                    $infos = $adr->fetch();
                    $adresse_mh = $infos['adresse_mh'];
                    $adr->closeCursor(); // Termine le traitement de la requête

                        include 'popuplocalisation.php';

                        //echo '<a href="popuplocalisation.php?nom_mh='. $donnees['nom_mh'] . '"><input type="button" value="Voir sur la carte"/></a>';

                        echo '<br />';
                        echo '<div class="droite">';
                        //echo '<form method="post" action="test_chambres.php?nom_mh=' . $donnees['nom_mh'] . '>';
                        echo '<a href="select_room.php?nom_mh=' . $donnees['nom_mh'] . '"><input type="button" value="See the room"/></a>';
                        //echo '</form>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '<p class="espace"><br><br><br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
                        $a = $a + 1;
                    }                
                ?>

                <?php
                    $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
                
            
        </div>


                        <?php include 'div_panier.php'; ?>

                <?php include 'pop.php';?>


        <?php include 'footer.php'; ?>


    </body>
</html>

<script type="text/javascript">
    redimensionner('div.toSize0');
    redimensionner('div.toSize1');
    redimensionner('div.toSize2');
    redimensionner('div.toSize3');
    redimensionner('div.toSize4');
    redimensionner('div.toSize5');
    redimensionner('div.toSize6');
    redimensionner('div.toSize7');
    redimensionner('div.toSize8');
    redimensionner('div.toSize9');
    redimensionner('div.toSize10');
    redimensionner('div.toSize11');
    redimensionner('div.toSize12');
    redimensionner('div.toSize13');
    redimensionner('div.toSize14');
    redimensionner('div.toSize15');
    redimensionner('div.toSize16');
    redimensionner('div.toSize17');
    redimensionner('div.toSize18');
    redimensionner('div.toSize19');
    redimensionner('div.toSize20');
    redimensionner('div.toSize21');
    redimensionner('div.toSize22');
    redimensionner('div.toSize23');
    redimensionner('div.toSize24');
    redimensionner('div.toSize25');
    redimensionner('div.toSize26');
    redimensionner('div.toSize27');
    redimensionner('div.toSize28');
    redimensionner('div.toSize29');
    redimensionner('div.toSize30');

</script>