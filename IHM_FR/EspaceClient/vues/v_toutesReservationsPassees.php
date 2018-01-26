<!DOCTYPE html>
<html>
    <head>
        <title> Mes Reservations à venir</title>
        <meta charset="UTF-8">
    </head>

    <body>
        <div>
            <?php
            foreach ($lesRes as $uneRes) {
                $nomChambre = $uneRes['nom_chambre'];
                $nomMh = $uneRes['nom_mh'];
                $prix = $uneRes['prix_res'];
                $nomActivite = $uneRes['nom_activite'];

                if ($nomChambre != "" && $nomMh != "") {


                    $path = '../img/guesthouses/' . $nomMh . '/' . $nomChambre . '/'; // chemin vers le dossier contenant tes images (ne pas oublier le slash final)


                    $tab = scandir($path); // Place tes images dans un tableau
                    $tab = array_slice($tab, 2); // J'avais oublier que scandir listait . et .. donc on les vires aussi
                    shuffle($tab); // Mélange le tableau
                    $tab = array_slice($tab, 0, 1); // Garde la première image
                    // Enfin on fait une boucle du tableau pour l'affichage
                    echo '<div id="Espace_foto">
                                 <div id="SMEspace_foto">
                                 <hr class="separationH_foto">';
                    foreach ($tab as $img) {
                        echo '<div class="float_foto"><img src="' . $path . $img . '" width=250 alt="" /></div>'
                        . '<h4 class="ST1Espace_foto">' . $nomMh . ' - ' . $nomChambre . '</h4></br>'
                        // . '<hr class="separationH_foto">'
                        . '€' . $prix;
                        echo '  </div>
                                         </div>';
                    }
                    ?>

                    <a href='indexClient.php?uc=espaceClient&action=#'><input type="button" class="bouton_ef" data-animation="animated zoomIn" value="Voir la commande " style="font-family: 'Arial', serif;"></a>

                    <?php
                }

                if ($nomActivite != "") {
                    $path = '../img/activities/'; // chemin vers le dossier contenant tes images (ne pas oublier le slash final)
                    $tab = scandir($path); // Place tes images dans un tableau
                    $tab = array_slice($tab, 2); // J'avais oublier que scandir listait . et .. donc on les vires aussi
                    shuffle($tab); // Mélange le tableau
                    $tab = array_slice($tab, 0, 1); // Garde la première image
// Enfin on fait une boucle du tableau pour l'affichage
                    echo '<div id="Espace_foto">
                                 <div id="SMEspace_foto">
                                 <hr class="separationH_foto">';
                    foreach ($tab as $img) {
                        echo '<div class="float_foto"><img src="' . $path . $img . '" width=250 alt="" /></div>'
                        . '<h4 class="ST1Espace_foto">' . $nomActivite . '</h4></br>'
// . '<hr class="separationH_foto">'
                        . '€' . $prix;
                        echo '  </div>
                                         </div>';
                    }
                    ?>

                    <a href='indexClient.php?uc=espaceClient&action=#'><input type="button" class="bouton_ef" data-animation="animated zoomIn" value="Voir la commande " style="font-family: 'Arial', serif;"></a>

                    <?php
                }
            }
            ?>
        </div>
    </body>
</html>