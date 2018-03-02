

<?php
?>
<div class="container-fluid">
    <div class="row" id="imageEncadreBienvenue">
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12 col-sm-12 col-xs-12" id="encadreBienvenue">
                    <h2 id="h2_encadreBienvenue">Welcome to your customer space <?php echo $_SESSION['prenom'] ;?></h2>

                </div>
                <div class="row" id="cadreEssentiels">
                    <div class="col-md-12 col-sm-12 col-xs-12"
                        <p>Find all your essentials on your customer page.</p>
                    </div>
                </div>
        </div>
    </div>
    <div class="row" id="wishlist-factures">
        <div class="col-md-6 col-sm-6 col-xs-6" id="image-wishlist">
            <div class="row w-f-white-div">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1>My Wishlist</h1><br>
                    <hr class="hr"><br>
                    <h2>All your favorites for your future stays in France.</h2><br>
                    <a href="indexClient.php?uc=espaceClient&action=voirWishlist"><input type="button" class="btn link-w-f" name="btn-voirFactures" value="Voir"></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-6" id="image-factures">
            <div class="row w-f-white-div">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1>My invoices</h1><br>
                    <hr class="hr"><br>
                    <h2>Find all your tickets from your last escapades!</h2><br>
                    <a href="indexClient.php?uc=espaceClient&action=voirFacture" type="button" ><input type="button" class="btn link-w-f" name="btn-voirFactures" value="Voir"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6" id="resa-a-venir">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6 r_div" id="">
                    <a href="indexClient.php?uc=espaceClient&action=menuReservationsAVenir" style="cursor:pointer"><h1>My upcoming bookings</h1></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6" id="resa-passees">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6 r_div" id="">
                    <a href="indexClient.php?uc=espaceClient&action=menuReservationsPassees" style="cursor:pointer"><h1>My previous booking</h1></a>
                </div>
            </div>      
        </div>
    </div>  
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12" id="white_div">
            
        </div>
    </div>
</div>
