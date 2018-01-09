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
    <title>votre reservation</title>
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
            <td colspan="4" class="td_titre">Votre reservation </td>
        </tr>
        <tr class="no_border"><td colspan="4">&nbsp;</td></tr>

        <tr><td class="sous_titre" colspan="4">Maison d'hotes </td></tr>
        <tr class="titre_colonnes">
            <td class="td1">Chambre</td>
            <td class="td1">Dates</td>
            <td class="td2">Prix</td>
            <td class="td3">Action</td>
        </tr>

        <?php
            if (isset($_COOKIE['guesthouse']) == false){
                echo '<tr><td colspan="4" style="text-align:center;">NO ROOM SELECTED</td></tr>';
                echo '<tr class="no_border"><td colspan="4" class="suggestions">See the guesthouses in : <a href="select_guesthouse.php?ville=Paris">Paris</a> / <a href="select_guesthouse.php?ville=Strasbourg">Strasbourg</a> / <a href="select_guesthouse.php?ville=French Riviera">French Riviera</a> / <a href="select_guesthouse.php?ville=Reunion Island">Reunion Island</a></td></tr>';
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

        <tr><td class="sous_titre" colspan="4">Activites</td></tr>
        <tr class="titre_colonnes">
            <td class="td1">Activites</td>
            <td class="td1">Ville</td>
            <td class="td2">Prix</td>
            <td class="td3">Action</td>
        </tr>

        <?php
            if (empty($demandes_visit)){
                echo '<tr><td colspan="4" style="text-align:center;">NO ACTIVITY SELECTED</td></tr>';
                echo '<tr class="no_border"><td colspan="4" class="suggestions">Select activities in : <a href="select_activities_ville.php?ville=Paris">Paris</a> / <a href="select_activities_ville.php?ville=French Riviera">French Riviera</a></td></tr>';
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
            echo '<td colspan="2" style="font-weight:bold; color:#183e67;">TOTAL PRICE (excl. tax.)</td>';
            echo '<td colspan="2" style="font-weight: bold; color:#183e67;">' . $prix_total . ' &euro;</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td colspan="2" style="font-weight:bold; color:#183e67;">TOTAL PRICE (incl. tax.)</td>';
            $prix_ttc = taxePrixTotal($prix_total);
            echo '<td colspan="2" style="font-weight: bold; color:#183e67;">' . $prix_ttc . ' &euro;</td>';
            echo '</tr>';
        ?>
    </table>

    <br />
    <br />

    <div class="payment_btn">
        <a href="customer_infos.php"><input type="button" class="submit_btn" value="Confirm"></a>
    </div>
    
    <br />
    <br />
    <br />
    <br />
    
    <?php include 'footer.php'; ?>
</body>