
<!DOCTYPE html>
<head>
    <title> Mes factures</title>
    <meta charset="UTF-8">
</head>
<html>
    <body>
        <h1> Mes factures</h1>
        <p>Téléchargez et consultez ici toutes vos factures.</p>



        <div id="pdf">
            <?php
            /* while ($reservation = $pdo->getReservation($mail)) {
              $id = $reservation->num_res;
              echo "<li><div class='titre'>" . $reservation->nom_chambre . "</div>
              <div class='date'>" . $reservation->date_debut . " - " . $reservation->date_fin . "</div>
              <div class='prix'>" . $reservation->prix_res . "€ </div>
              <div class='span'> <a href='indexClient.php?uc=espaceClient&action=genererpdf'><img src='images/telecharger.png' WIDTH='20%' HEIGHT='20%'></a></div>
              </li> ";
              } */

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
                echo "<li><div class='titre'>" . $nomChambre . " - ".$nomMh." - ".$activite."</div>
                <div class='date'> Du " . $dateDebut . " au " . $dateFin . "</div>
                <div class='prix'>" . $prix . "€ </div>
                <div class='span'> <a href='indexClient.php?uc=espaceClient&action=genererpdf'>Télécharger pdf</a></div>
                        </li> ";
            }
            ?>

        </div>
    </body>
</html>