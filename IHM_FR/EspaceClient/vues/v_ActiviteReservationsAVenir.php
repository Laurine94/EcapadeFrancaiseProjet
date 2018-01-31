        <div class="col-md-8 col-sm-8 col-xs-8 listeReservationChambre">
            <nav class="navbar navbar">
                <div class="container-fluid">
                    <ul class="nav navbar-nav listeReservation">
                    <?php
                    if ($lesRes) {
                        foreach ($lesRes as $uneRes) {
                            $prix = $uneRes['prix_res'];
                            $nomActivite = $uneRes['nom_activite'];
                            ?>

                        <li>

                            <?php
                                if ($nomActivite!=""){
                                     $path = '../img/activities/'; // chemin vers le dossier contenant tes images (ne pas oublier le slash final)
                                    $tab = scandir($path); // Place tes images dans un tableau
                                    $tab = array_slice($tab, 2); // J'avais oublier que scandir listait . et .. donc on les vires aussi
                                    shuffle($tab); // Mélange le tableau
                                    $tab = array_slice($tab, 0, 1); // Garde la première image
                                    // Enfin on fait une boucle du tableau pour l'affichage
                        ?>
                                   <div id="Espace_foto">
                                        <div id="SMEspace_foto">
                                        <hr class="separationH_foto">
                                        <?php 
                                        foreach ($tab as $img) {
                                        ?>
                                            <div class="float_foto"><img src="<?php echo $path ?><?php echo $img ?>" width=250 alt="" /></div>
                                            <h4 class="ST1Espace_foto"><?php echo $nomActivite ?></h4></br>
            <!--                                     <hr class="separationH_foto">-->
                                            €<?php echo $prix ?>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>

                                    <a href='indexClient.php?uc=espaceClient&action=#'><input type="button" class="bouton_ef" data-animation="animated zoomIn" value="Voir la commande " style="font-family: 'Arial', serif;"></a>

                                    <?php
                                }
                            }
                    }

                    ?>
                    </li>
                </ul>
            </div>
        </div>