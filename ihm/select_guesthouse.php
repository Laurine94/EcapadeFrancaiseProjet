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
       <meta charset="utf-8"> 
       <link href="css/select_guesthouse.css" rel="stylesheet">
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
        
        <?php include 'div_panier.php'; ?>
        
        <div id="global">
            <div id="entete">
                <?php include 'navbar.php'; ?>
            </div>
            <br>
            <div id="center">
                <ul class="menu_guesthouse">
                    <li><a href="guesthouse.php" style="text-decoration:none;color:grey;">1. Choisissez votre ville</a></li>
                    <li class="guesthouse_active">2. Choisissez votre maison d'hotes</li>
                    <li>3. reservez votre chambre </li>
                    <li>4. Confirmer</li>
                </ul>
            </div>
            <br><br><br>
            <div id="contenu"> 
                
                
                
                <?php
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
                ?>
                
                <div id="intro"><h2>nos maison d'hotes</h2></div>
                
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
                        echo '<span>' . $donnees['note_mh'] . '</span>';
                        echo '</div>';
                        
                        echo '<div class="div_65 toSize' . $a . '">';
                        echo '<h2>' . $donnees['nom_mh'] . '</h2>';
                        echo '<p>' . $donnees['description_mh'] . '</p>';
                        echo '<p><b>Nombre de chambres: ' . $donnees['rooms_nbr'] . '</b></p>';
                        echo '<br />';
                        echo '<div class="droite">';
                        //echo '<form method="post" action="test_chambres.php?nom_mh=' . $donnees['nom_mh'] . '>';
                        echo '<a href="select_room.php?nom_mh=' . $donnees['nom_mh'] . '"><input type="button" value="See the rooms"/></a>';
                        //echo '</form>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '<p class="espace">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>';
                        $a = $a + 1;
                    }                
                ?>

                <?php
                    $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
                
                
                
            </div>
        </div>
        
        <?php include 'pop.php'?>
        
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
</script>