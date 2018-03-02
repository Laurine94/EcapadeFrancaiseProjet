<?php ?>
<!DOCTYPE html>
<html>
    <head>
        <title> My Wishlist</title>
        <meta charset="UTF-8">
        <link href="../css/carouStyle.scss">
        <script src="../js/waterwheel.js"></script>
        <script src="../js/main.js"></script>
    </head>

    <body>
        
        <div class="container-fluid">
            <div class="row">
              
                
                
                
                
                
                
                
                <div class="col-md-12 col-sm-12 col-xs-12 carousel"
                     
                    <h1 id="titreWish">Book your favourite rooms</h1>
                    <br>
                    <a href="v_wishlistGuide.php"></a>
                    <div class=""> 
                    <?php
                        foreach ($fav_chambres as $fav_chambre){
                            $nomChambre=$fav_chambre['nom_chambre'];
                            $nomMh=$fav_chambre['nom_mh'];
                            $image=$fav_chambre['nom_img'];
                    ?>
                        <?php
                            if ($nomChambre != "" && $nomMh != "") {

                            $path = '../img/guesthouses/' . $nomMh . '/' . $nomChambre . '/'; // chemin vers le dossier contenant tes images (ne pas oublier le slash final)
                            $tab = scandir($path); // Place tes images dans un tableau
                            $tab = array_slice($tab, 2); // J'avais oublier que scandir listait . et .. donc on les vires aussi
                           
                            $tab = array_slice($tab, 0, 1); // Garde la première image
                            // Enfin on fait une boucle du tableau pour l'affichage
                            ?>
                            <?php
                            foreach ($tab as $img) {
                            ?>
                        <a href="../select_room.php?nom_mh=<?php echo $fav_chambre['nom_mh'];?>"><img src="<?php echo $path ?><?php echo $img ?>" width=250 alt="" /></a>
                                <!--<div class="row"><h4 class=""><?php //echo $nomMh ?> - <?php// echo $nomChambre ?></h4></div></br>
                               <hr class="separationH_foto">
                                   <div>€<?php// echo $prix ?></div>-->
                            <?php }
                            }?>
                        
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>  
                
    </body>
</html>