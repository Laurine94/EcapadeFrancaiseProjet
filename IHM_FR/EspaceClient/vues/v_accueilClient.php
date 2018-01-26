

<?php
?>
<div class="container-fluid">
    <div class="row" id="imageEncadreBienvenue">
        <div class="col-md-12 col-sm-12 col-xs-12" >
                <div class="col-md-12 col-xs-12" id="encadreBienvenue">
                    <h2 id="h2_encadreBienvenue">Bienvenue sur votre espace client <?php echo $prenom ;?></h2>

                </div>
                <div class="row" id="cadreEssentiels">
                    <div class="col-md-12 col-sm-12 col-xs-12"
                        <p>Retrouvez tous vos essentiels sur votre espace client</p>
                    </div>
                </div>
        </div>
    </div>
    <div class="row" id="wishlist-factures">
        <div class="col-md-6 col-sm-6 col-xs-6" id="image-wishlist">
            <div class="row w-f-white-div">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1>Ma Wishlist</h1><br>
                    <hr class="hr"><br>
                    <h2>Tous vos coups de coeur pour vos futures séjours en France</h2><br>
                    <a href="#"><input type="button" class="btn link-w-f" name="btn-voirFactures" value="Voir"></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-6" id="image-factures">
            <div class="row w-f-white-div">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1>Mes factures</h1><br>
                    <hr class="hr"><br>
                    <h2>Retrouvez toutes vos factures issus de vos dernières escapades!</h2><br>
                    <a href="indexClient.php?uc=espaceClient&action=voirFacture" type="button" ><input type="button" class="btn link-w-f" name="btn-voirFactures" value="Voir"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6" id="resa-a-venir">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6 r_div" id="">
                    <a href="indexClient.php?uc=espaceClient&action=menuReservationsAVenir" style="cursor:pointer"><h1>Mes réservations à venir</h1></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6" id="resa-passees">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6 r_div" id="">
                    <a href="#" style="cursor:pointer"><h1>Mes réservations passées</h1></a>
                </div>
            </div>      
        </div>
    </div>  
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12" id="white_div">
            
        </div>
    </div>
</div>