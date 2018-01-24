
<!DOCTYPE html>
<html>
    <head>
        <title> Mes factures</title>
        <meta charset="UTF-8">
    </head>

    <body>
        <div class="container-fluid" id="background">
            <div class="row" id="titre-factures">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1> Mes factures</h1>
                    <p>Téléchargez et consultez ici toutes vos factures.</p>
                </div>
            </div>
            <div class="row" id="carousel-div">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="carousel fade-carousel slide" style="border:2px solid black" data-ride="carousel" data-interval="3000" id="bs-carousel">
					<!--puces-->
					<ol class="carousel-indicators ">
						<li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
                                                <?php $c = count($lesFactures); 
                                                for($i = 1; $i <= $c; $i++){?>
						<li data-target="#bs-carousel" data-slide-to="<?php echo $i ?>" ></li>
                                                <?php } ?>
					</ol>
					
					<!--Carroussel-->
					<div class="carousel-inner">
                                                <div class="item active img-slide" id="" style="background-image: url(../img/espace_membre/mes_reservations_passees.jpg);">
                                                    <div class="carousel-caption" >
                                                        <h3 data-animation="animated zoomIn" style="font-family: 'Arial', serif;"></h3>
                                                        <h1>Ici téléchargez les factures</h1>
                                                        <h1> de vos dernières réservation</h1>
                                                    </div>
						</div>
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
						<div class="item img-slide" id="" style="background-image: url(../img/espace_membre/mes_reservations_a_venir_3.jpg);">
                                                    <div class="carousel-caption" >
                                                        <h3 data-animation="animated zoomIn" style="font-family: 'Arial', serif;">Nom ville</h3>
                                                        <h2><?php echo $nomMh ?></h2>
                                                        <h2><?php echo $prix ?>€</h2>
                                                        <a href='indexClient.php?uc=espaceClient&action=genererpdf'><input type="button" class="bouton_ef" data-animation="animated zoomIn" value="Télécharger la facture " style="font-family: 'Arial', serif;"></a>
                                                    </div>
						</div>
                                            <?php } ?>
						<!--<div class="item " id="img-slide2" style="background-image: url(../img/espace_membre/mes_reservations_passees.jpg);">
                                                    <div class="carousel-caption">
                                                        <h3 data-animation="animated zoomIn" style="font-family: 'Arial', serif;">Nom ville</h3>
                                                        <a href='indexClient.php?uc=espaceClient&action=genererpdf'><input type="button" class="bouton_ef" data-animation="animated zoomIn" value="Télécharger la facture " style="font-family: 'Arial', serif;"></a>
                                                    </div>
						</div>
						<div class="item " id="img-slide3" style="background-image: url(../img/espace_membre/mes_factures.jpg);">
                                                    <div class="carousel-caption">
                                                        <h3 data-animation="animated zoomIn" style="font-family: 'Arial', serif;">Nom ville</h3>
                                                        <a href="guesthouse.php"><input type="button" class="bouton_ef" data-animation="animated zoomIn" value="Télécharger la facture " style="font-family: 'Arial', serif;"></a>
                                                    </div>
						</div>-->
					</div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <ul class="" >
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
                    <div class="row">
                        <div class="col-md-2 col-sm-2 col-xs-2" id="pdf">
                            <li id="pdf_li">
                                <div class=''><?php echo $nomChambre ?> - <?php echo $nomMh ?> - <?php echo $activite ?></div>
                                <div class=''> Du <?php echo $dateDebut ?> au <?php echo $dateFin ?></div>
                                <div class=''><?php echo $prix ?>€ </div>
                                <div class=''> <a href='indexClient.php?uc=espaceClient&action=genererpdf'>Télécharger pdf</a></div>
                            </li>
                        </div>
                    </div>
                <?php } ?>
                </ul>
            </div>
        </div>
    </body>
</html>