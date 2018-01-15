

<?php
//affichage du header en haut de page
include("v_headClient.php");
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div id="imageEncadreBienvenue">
                <div class="col-md-12 col-xs-12" id="encadreBienvenue">
                    <h2 id="h2_encadreBienvenue">Bienvenue sur votre espace client machin<?php //echo $prenom ;?></h2>
                </div>
                <div id="cadreEssentiels">
                    <p>Retrouvez tous vos essentiels sur votre espace client</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="wishlist-factures">
        <div class="col-md-6 col-xs-6" id="image-wishlist">
            <div class="w-f-white-div">
                <h1>Ma Wishlist</h1>
                <hr class="hr">
                <h2>Tous vos coups de coeur pour vos futures séjours en France</h2>
                <a href="#" class="link-w-f">Voir</a>
            </div>
        </div>
        <div class="col-md-6 col-xs-6" id="image-factures">
            <div class="w-f-white-div">
                <h1>Mes factures</h1>
                <hr class="hr">
                <h2>Retrouvez toutes vos factures issus de vos dernières escapades!</h2>
                <a href="#" class="link-w-f"><h1>Voir</h1></a>
            </div>
        </div>
    </div>
</div>
