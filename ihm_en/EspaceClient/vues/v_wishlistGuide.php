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
                    <h1 id="titreWish">Réservez vos guides favorites</h1>
                    <div class=""> 
                    <?php
                        foreach ($fav_guides as $fav_guide){
                    if (file_exists('../img/guides_filters/' . $fav_guide['num_guide'] . '.png')) {
                                ?>

                                <a href="../guide_plus.php?city=<?php echo $fav_guide['ville'];?>">
                                    <img src="../img/guides_filters/<?php echo $fav_guide['num_guide'] ?>.png" alt="<?php echo $fav_guide['num_guide'] ?> " width="20%"/>

                                </a>

                                <?php
                            }
                    } ?>
                    </div>
                </div>
            </div>
        </div>  
                
    </body>
</html>