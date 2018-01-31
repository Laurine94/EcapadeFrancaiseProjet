        <div class="col-md-8 col-sm-8 col-xs-8 listeReservationChambre" id="">
            <nav class="navbar navbar">
                <div class="container-fluid">
                    <ul class="nav navbar-nav listeReservation">
                    <?php
                    foreach ($lesRes as $uneRes) {
                        $nomChambre = $uneRes['nom_chambre'];
                        $nomMh = $uneRes['nom_mh'];
                        $prix = $uneRes['prix_res'];
                        ?>

                        <li>

                        <?php
                        if ($nomChambre != "" && $nomMh != "") {

                            $path = '../img/guesthouses/' . $nomMh . '/' . $nomChambre . '/'; // chemin vers le dossier contenant tes images (ne pas oublier le slash final)
                            $tab = scandir($path); // Place tes images dans un tableau
                            $tab = array_slice($tab, 2); // J'avais oublier que scandir listait . et .. donc on les vires aussi
                            shuffle($tab); // Mélange le tableau
                            $tab = array_slice($tab, 0, 1); // Garde la première image
                            // Enfin on fait une boucle du tableau pour l'affichage
                    ?>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php
                                foreach ($tab as $img) {
                                ?>
                                    <div class="row"><img class="center-block" src="<?php echo $path ?><?php echo $img ?>" width=250 alt="" /></div>
                                    <div class="row"><h4 class="ST1Espace_foto"><?php echo $nomMh ?> - <?php echo $nomChambre ?></h4></div></br>
            <!--                        <hr class="separationH_foto">-->
                                    <div class="row"><h4>€<?php echo $prix ?></h4></div>
                                </div>
                            </div>
                            <?php } ?>

                            <a href='indexClient.php?uc=espaceClient&action=#'><input type="button" class="bouton_ef" data-animation="animated zoomIn" value="Voir la commande " style="font-family: 'Arial', serif;"></a>

                            <?php
                        }
                    }
                    ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
