<?php
	function traiter_cookies_v($cookie_code) {
		$cookie_array= array();
		if (!empty($cookie_code)) @$cookie_code=explode('||', $cookie_code);
		if (!empty($cookie_code)) foreach ($cookie_code as $i=>$toinert) {
			if (!empty($toinert)) $cookie_array[]=json_decode($toinert);
		}
		return $cookie_array;
	}
?>
<head>
    <title>Votre réservation</title>
    <link rel="stylesheet" type="text/css" href="css/confirm.css">
</head>

<body>
    <?php include 'connexion.php';?>

    <?php
        function taxePrixTotal($prix){
            $nb = $prix + 10;
            return $nb;
        }
    ?>

    <div id="entete">
        <?php include 'navbar.php'; ?>
    </div>

    <br />
    <br />
    <br />
    <br />

    <?php $prix_total = 0; ?>
    <table style="width: 90%; margin: auto;">
        <tr>
            <td colspan="4" class="td_titre">Votre réservation </td>
        </tr>
        <tr class="no_border"><td colspan="4">&nbsp;</td></tr>

        <tr><td class="sous_titre" colspan="4">Maisons d'hôtes </td></tr>
        <tr class="titre_colonnes">
            <td class="td1">Chambres</td>
            <td class="td1">Dates</td>
            <td class="td2">Prix</td>
            <td class="td3">Action</td>
        </tr>

        <?php
            if (isset($_COOKIE['guesthouse']) == false){
                echo '<tr><td colspan="4" style="text-align:center;">AUCUNE CHAMBRES SÉLECTIONNÉES</td></tr>';
                echo '<tr class="no_border"><td colspan="4" class="suggestions">Voir les maisons d\'hôtes ici : <a href="select_guesthouse.php?ville=Paris">Paris</a> /
                                                                                                                <a href="select_guesthouse.php?ville=Strasbourg">Strasbourg</a> / 
                                                                                                                <a href="select_guesthouse.php?ville=Côte d\'Azur">Côte d\'Azur</a> / 
                                                                                                                <a href="select_guesthouse.php?ville=Ile de la Réunion">Ile de la Réunion</a> / 
                                                                                                                <a href="select_guesthouse.php?ville=Lyon">Lyon</a> / 
                                                                                                                <a href="select_guesthouse.php?ville=Biarritz">Biarritz</a> / 
                                                                                                                <a href="select_guesthouse.php?ville=Bordeaux">Bordeaux</a> / 
                                                                                                                <a href="select_guesthouse.php?ville=Haute-Savoie">Haute-Savoie</a> / 
                                                                                                                <a href="select_guesthouse.php?ville=Polynésie Française">Polynésie Française</a> / 
                                                                                                                <a href="select_guesthouse.php?ville=Corse">Corse</a> / 
                                                                                                                <a href="select_guesthouse.php?ville=Martinique">Martinique</a>/ 
                                                                                                                <a href="select_guesthouse.php?ville=Saint-Barthelemy">Saint-Barthelemy</a> / 
                                                                                                                <a href="select_guesthouse.php?ville=Marseille">Marseille</a> / 
                                                                                                                <a href="select_guesthouse.php?ville=Reims">Reims</a> / 
                                                                                                                <a href="select_guesthouse.php?ville=Normandie/ Bretagne">Normandie/ Bretagne</a></td></tr>';
            }
            foreach($_COOKIE as $t1 => $t2){
                if (is_array($t2)){
                    foreach($t2 as $t3 => $val){
                        if ($t1 == "guesthouse" && !empty($val)){
                            echo '<tr>';
                            echo '<td style="font-weight:bold;" class="td1">' . $val["chambre"];
                            $infos = $bdd->query('SELECT * FROM chambre inner join maison_hote on chambre.nom_mh=maison_hote.nom_mh where chambre.nom_chambre="' . $val["chambre"] . '"');
                            while ($donnees_gh = $infos->fetch())
                            {
                                echo ' - ' . $donnees_gh['nom_mh'] . ' (' . $donnees_gh['ville'] . ')</td>';
                                echo '<td class="td1">From <strong>' . $val["date_debut"] . '</strong> to <strong>' . $val["date_fin"] . '</strong></td>';
                                echo '<td class="td2">' . $donnees_gh['prix_chambre'] . ' &euro;</td>';
                                echo '<td class="td3"><a href="fonctionSuppr.php?cookie_name=' . $t3 . '&cookie_val=' . $t1 . '" title="Cancel"><img src="img/logos/Delete.svg"></a></td>';
                                $prix_total = $prix_total + $donnees_gh['prix_chambre'];
                            }
                            echo '</tr>';
                        }
                    }
                }
            }
            echo '<tr class="no_border"><td colspan="4">&nbsp;</td></tr>';
        ?>

<?php
	$demandes_visit=array();
	if (!empty($_COOKIE['demandes_visit'])) var_dump($_COOKIE['demandes_visit']);
	if (!empty($_COOKIE['demandes_visit'])) $demandes_visit=traiter_cookies_v($_COOKIE['demandes_visit']);
?>

        <tr><td class="sous_titre" colspan="4">Activités</td></tr>
        <tr class="titre_colonnes">
            <td class="td1">Activités</td>
            <td class="td1">Ville</td>
            <td class="td2">Prix</td>
            <td class="td3">Action</td>
        </tr>

        <?php
            if (empty($demandes_visit)){
                echo '<tr><td colspan="4" style="text-align:center;">AUCUNE ACTIVITÉS SÉLECTIONNÉES</td></tr>';
                echo '<tr class="no_border"><td colspan="4" class="suggestions">Voir les activités ici : <a href="select_activities_ville.php?ville=Paris">Paris</a> / 
                                                                                                         <a href="select_activities_ville.php?ville=Strasbourg">Strasbourg</a> / 
                                                                                                         <a href="select_activities_ville.php?ville=Côte d\'Azur">Côte d\'Azur</a> / 
                                                                                                         <a href="select_activities_ville.php?ville=Ile de la Réunion">Ile de la Réunion</a> / 
                                                                                                         <a href="select_activities_ville.php?ville=Lyon">Lyon</a> / 
                                                                                                         <a href="select_activities_ville.php?ville=Biarritz">Biarritz</a> / 
                                                                                                         <a href="select_activities_ville.php?ville=Bordeaux">Bordeaux</a> / 
                                                                                                         <a href="select_activities_ville.php?ville=Haute-Savoie">Haute-Savoie</a> / 
                                                                                                         <a href="select_activities_ville.php?ville=Polynésie Française">Polynésie Française</a> / 
                                                                                                         <a href="select_activities_ville.php?ville=Corse">Corse</a> / 
                                                                                                         <a href="select_activities_ville.php?ville=Martinique">Martinique</a> / 
                                                                                                         <a href="select_activities_ville.php?ville=Saint-Barthelemy">Saint-Barthelemy</a> / 
                                                                                                         <a href="select_activities_ville.php?ville=Marseille">Marseille</a> / 
                                                                                                         <a href="select_activities_ville.php?ville=Reims">Reims</a> / 
                                                                                                         <a href="select_activities_ville.php?ville=Normandie/ Bretagne">Normandie/ Bretagne</a></td></tr>';
            }
            foreach($demandes_visit as $x => $demande){
                if (!empty($demande)){
					echo '<tr>';
					echo '<td style="font-weight:bold;" class="td1">' . $demande->activity . '</td>';
					$infos = $bdd->query('SELECT * FROM activites where nom_activite="' . $demande->activity . '"');
					while ($donnees_act = $infos->fetch())
					{
						echo '<td class="td1">' . $donnees_act['ville'] . '</td>';
						echo '<td class="td2">' . $donnees_act['prix_activite'] . ' &euro;</td>';
						echo '<td class="td3"><a href="fonctionSupprB.php?cookie_name=' . $demande->activity . '" title="Cancel"><img src="img/logos/Delete.svg"></a></td>';
						$prix_total = $prix_total + $donnees_act['prix_activite'];
					}
					echo '</tr>';
                }
            }
            echo '<tr class="no_border"><td colspan="4">&nbsp;</td></tr>';
        ?>

        <?php
            echo '<tr>';
            echo '<td colspan="2" style="font-weight:bold; color:#183e67;">Prix total (taxes exclues)</td>';
            echo '<td colspan="2" style="font-weight: bold; color:#183e67;">' . $prix_total . ' &euro;</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td colspan="2" style="font-weight:bold; color:#183e67;">Prix Total (taxes incluses)</td>';
            $prix_ttc = taxePrixTotal($prix_total);
            echo '<td colspan="2" style="font-weight: bold; color:#183e67;">' . $prix_ttc . ' &euro;</td>';
            echo '</tr>';
        ?>
    </table>

    <br />
    <br />

    <div class="payment_btn">
        <a href="customer_infos.php"><input type="button" class="submit_btn" value="Confirmez"></a>
    </div>
    
    <br />
    <br />
    <br />
    <br />
    
    <?php include 'footer.php'; ?>
</body>