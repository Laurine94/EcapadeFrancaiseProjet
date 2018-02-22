
<!DOCTYPE html>
<html>
    <head>
        <title> My invoices</title>
        <meta charset="UTF-8">
    </head>

    <body>
        <div class="container-fluid" id="background">
            <div class="row" id="titre-factures">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1> My invoices</h1>
                    <p>Download and consult here all your invoices.</p>
                </div>
            </div>
            <div class="row" id="carousel-div">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="carousel fade-carousel slide" style="border:2px solid black" data-ride="carousel" data-interval="3000" id="bs-carousel">
					<!--puces-->
					<ol class="carousel-indicators ">
						<li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
                                                <?php for($i = 1; $i <= 3; $i++){?>
						<li data-target="#bs-carousel" data-slide-to="<?php echo $i ?>" ></li>
                                                <?php } ?>
					</ol>
					
					<!--Carroussel-->
					<div class="carousel-inner">
                                                <div class="item active img-slide" id="" style="background-image: url(../img/espace_membre/mes_reservations_passees.jpg);">
                                                    <div class="carousel-caption" >
                                                        <h3 data-animation="animated zoomIn" style="font-family: 'Arial', serif;"></h3>
                                                        <h1>Download here all your invoices</h1>
                                                        <h1> of your last reservation</h1>
                                                    </div>
						</div>
                                            <?php
                                            foreach ($lesFactures2 as $uneFacture2) {
                                                $mail = $uneFacture2['mail_client'];
                                                $nomClient = $uneFacture2['nom_client'];
                                                $prenomClient = $uneFacture2['prenom_client'];
                                                $nomChambre=$uneFacture2['nom_chambre'];
                                                $nomMh=$uneFacture2['nom_mh'];
                                                $activite=$uneFacture2['nom_activite'];
                                                $dateDebut=$uneFacture2['date_debut'];
                                                $dateFin=$uneFacture2['date_fin'];
                                                $prix=$uneFacture2['prix_res'];
                                            ?>
						<div class="item img-slide" id="" style="background-image: url(../img/espace_membre/mes_reservations_a_venir_3.jpg);">
                                                    <div class="carousel-caption" >
                                                        <h3 data-animation="animated zoomIn" style="font-family: 'Arial', serif;">Nom ville</h3>
                                                        <h2><?php echo $nomMh ?></h2>
                                                        <h2><?php echo $prix ?>€</h2>
                                                        <a href='indexClient.php?uc=espaceClient&action=genererpdf'><input type="button" class="bouton_ef" data-animation="animated zoomIn" value="Download pdf " style="font-family: 'Arial', serif;"></a>
                                                    </div>
						</div>
                                            <?php } ?>
					</div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <nav class="navbar navbar">
                        <div class="container-fluid">
                            <ul class="nav navbar-nav listeReservation">
                                <?php
                                foreach ($lesFactures as $uneFacture) {
                                    $mail = $uneFacture['mail_client'];
                                    $nomClient = $uneFacture['nom_client'];
                                    $prenomClient = $uneFacture['prenom_client'];
                                    $nomChambre=$uneFacture['nom_chambre'];
                                    $nomMh=$uneFacture['nom_mh'];
                                    $activite=$uneFacture['nom_activite'];
                                    $dateDebut=$uneFacture['date_debut'];
                                    $dateFin=$uneFacture['date_fin'];
                                    $prix=$uneFacture['prix_res'];
                                ?>
<!--                                    <div class="row">
                                        <div class="col-md-2 col-sm-2 col-xs-2" id="pdf">-->
                                            <li id="pdf_li">
                                                <div class=''><?php echo $nomChambre ?> - <?php echo $nomMh ?> - <?php echo $activite ?></div>
                                                <div class=''> Du <?php echo $dateDebut ?> au <?php echo $dateFin ?></div>
                                                <div class=''><?php echo $prix ?>€ </div>
                                                <div class=''> <a href='indexClient.php?uc=espaceClient&action=genererpdf'>Download pdf</a></div>
                                                <hr class="hr">
                                            </li>
                                            
<!--                                        </div>
                                    </div>-->
                                <?php } ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </body>
</html>