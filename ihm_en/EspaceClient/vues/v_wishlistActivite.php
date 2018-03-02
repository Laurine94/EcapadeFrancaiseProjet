<?php ?>
<!DOCTYPE html>
<html>
    <head>
        <title> Mes factures</title>
        <meta charset="UTF-8">
        <link href="../css/carouStyle.scss">
        <script src="../js/waterwheel.js"></script>
        <script src="../js/main.js"></script>
    </head>

    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 carousel"
                     <h1 id="titreWish">Réservez vos activités favorites</h1>
                    <div class=""> 
                        <?php
                        foreach ($fav_activites as $fav_activite) {

                            if (file_exists('../img/tousactivites/' . $fav_activite['nom_activite'] . '_act.jpg')) {
                                ?>

                                <a href="../select_activites_final.php?ville=<?php echo $fav_activite['ville']; ?>&type_activite=<?php echo $fav_activite['type_activite'] ?>&nom_activite=<?php echo $fav_activite['nom_activite']?>">
                                    <img src="../img/tousactivites/<?php echo $fav_activite['nom_activite'] ?>_act.jpg" alt="<?php echo $fav_activite['type_activite'] ?> " width="25%"/>

                                </a>

                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>  

    </body>
</html>