
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
            $mail = "cousinlaurine94260@gmail.com";
            while ($reservation = $pdo->getReservation($mail)) {
                $id = $reservation->id;
                echo "<li><div class='titre'>" . $reservation->nom_chambre . "</div>
                <div class='image'><img src='" . $reservation->photo . "'/></div>
                <div class='date'>" . $reservation->date_debut . " - " . $reservation->date_fin . "</div>
                <div class='prix'>" . $reservation->prix_res . "€ </div>
                <div class='span'><a href='ajout_panier.php?id=$id'><button> Télécharger </button> </a></div></li> ";
            }
            ?>

        </div>
    </body>
</html>