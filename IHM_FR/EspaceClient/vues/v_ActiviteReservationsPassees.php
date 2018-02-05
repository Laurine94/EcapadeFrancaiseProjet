<div class="col-md-12 col-sm-12 col-xs-12 listeReservationChambre">
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
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <hr class="hr">
                            <?php
                            foreach ($tab as $img) {
                            ?>
                                <div class="row"><img src="<?php echo $path ?><?php echo $img ?>" width=250 alt="" /></div>
                                <div class="row"><h4 class="ST1Espace_foto"><?php echo $nomActivite ?></h4></div></br>
<!--                                    <hr class="separationH_foto">-->
                                <div class="row">€<?php echo $prix ?>
                                </div>
                            </div>
                            <?php
                            }
                        }
                        ?>
                            </li>
                        <?php
                    }
            }
            
            ?>
                    </ul>
                </div>
            </nav>
</div>