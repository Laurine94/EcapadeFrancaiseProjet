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

    <title>Your reservation</title>
    <link rel="stylesheet" type="text/css" href="css/confirm.css">  
</head>

<body style="font-family:'Montserrat', sans-serif;">
    <?php include 'connexion.php';?>

    <?php
                                
        function taxePrixTotal($prix){
            $nb = $prix * 1.20;
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

    <?php $prix_total = 0;
    $prix_total_chambre = 0;
    $prix_total_activite = 0;
    $prix_total_guide = 0;?>
    <table style="width: 90%; margin: auto;">

        <h2 style ="margin-left:5%; margin-top:-2%; margin-bottom:-2%; font-family:'Montserrat', sans-serif;">Your reservation</h2>
        <tr class="no_border"><td colspan="8">&nbsp;</td></tr>

        <tr><td class="sous_titre" colspan="8">Guest Houses </td></tr>
        <tr class="titre_colonnes">
            <td class="td1">Rooms</td>
            <td class="td2">City</td>
            <td class="td3">Dates</td>
            <td class="td4">Number of person</td>
            <td class="td5">Babies (- 3 yrs old)</td>
            <td class="td6">Number of night</td>
            <td class="td7">Price</td>
            <td class="td8">Action</td>
        </tr>

        <?php
            if (isset($_COOKIE['guesthouse']) == false){
                echo '<tr><td colspan="8" style="text-align:center;">NO ROOMS SELECTED</td></tr>';
                echo '<tr class="no_border"><td colspan="8" class="suggestions">See more guest houses : <a href="select_guesthouse.php?genre=CITIES&ville=Paris">Paris</a> /
                                                                                                                <a href="select_guesthouse.php?genre=CITIES&ville=Strasbourg">Strasbourg</a> / 
                                                                                                                <a href="select_guesthouse.php?genre=SEA&ville=French Riviera">French Riviera</a> / 
                                                                                                                
                                                                                                                <a href="select_guesthouse.php?genre=SEA&ville=Biarritz">Biarritz</a> / 
                                                                                                                <a href="select_guesthouse.php?genre=CITIES&ville=Bordeaux">Bordeaux</a> / 
                                                                                                                <a href="select_guesthouse.php?genre=MOUNTAIN&ville=Biarritz">Haute-Savoie</a> / 
                                                                                                                <a href="select_guesthouse.php?genre=SEA&ville=Polynésie Française">French Polynesia</a> / 
                                                                                          
                                                                                                                <a href="select_guesthouse.php?genre=SEA&ville=Marseille">Marseille</a> / 
                                                                                                                <a href="select_guesthouse.php?genre=COUNTRISIDE&ville=Reims">Reims</a> / 
                                                                                                                <a href="select_guesthouse.php?genre=SEA&ville=Normandie/ Bretagne">Normandie/ Bretagne</a></td></tr>';
            }
            foreach($_COOKIE as $t1 => $t2){
                if (is_array($t2)){
                    foreach($t2 as $t3 => $val){
                        if ($t1 == "guesthouse" && !empty($val)){
                            echo '<tr>';
                            echo '<td style="font-weight:bold;" class="td1">' . $val['chambre'];
                            $infos = $bdd->query('SELECT * FROM chambre inner join maison_hote on chambre.nom_mh=maison_hote.nom_mh where chambre.nom_chambre="' . $val['chambre'] . '"');
                            while ($donnees_gh = $infos->fetch())
                            {
                                $nb_nuit=$val['nb_jours']+1;
                                $prix=$donnees_gh['prix_chambre']*$val['nb_jours'];
                                echo ' - ' . $donnees_gh['nom_mh'] . '<br><br><img class="img-rounded" src="img/panier/'.$donnees_gh['nom_chambre'].'.jpg" class="img-thumbnail" width="275px" height=" 180px"></td>';
                                echo '<td class="td2">' . $donnees_gh['ville'] . ' </td>';
                                echo '<td class="td3">From <strong>' . $val['date_debut'] . '</strong> to <strong>' . $val['date_fin'] . '</strong></td>';
                                echo '<td class="td4">' . $val['nb_places'] . ' </td>';
                                echo '<td class="td5">' . $val['with_babies'] . ' </td>';
                                echo '<td class="td6">' . $nb_nuit . '</td>';
                                echo '<td class="td7">' . $prix . ' &euro;</td>';
                                echo '<td class="td8"><a href="fonctionSuppr.php?cookie_name=' . $t3 . '&cookie_val=' . $t1 . '" title="Cancel"><img src="img/logos/Delete.svg"></a></td>';
                                $prix_total_chambre = $prix_total_chambre + $prix;
                            }
                            echo '</tr>';
                        }
                    }
                }
            }
//                            echo '<tr class="no_border"><td colspan="8" class="suggestions">See more guest houses : <a href="select_guesthouse.php?genre=CITIES&ville=Paris">Paris</a> /
//                                                                                                                <a href="select_guesthouse.php?genre=CITIES&ville=Strasbourg">Strasbourg</a> / 
//                                                                                                                <a href="select_guesthouse.php?genre=SEA&ville=French Riviera">French Riviera</a> / 
//                                                                                                                
//                                                                                                                <a href="select_guesthouse.php?genre=SEA&ville=Biarritz">Biarritz</a> / 
//                                                                                                                <a href="select_guesthouse.php?genre=CITIES&ville=Bordeaux">Bordeaux</a> / 
//                                                                                                                <a href="select_guesthouse.php?genre=MOUNTAIN&ville=Biarritz">Haute-Savoie</a> / 
//                                                                                                                <a href="select_guesthouse.php?genre=SEA&ville=Polynésie Française">French Polynesia</a> / 
//                                                                                          
//                                                                                                                <a href="select_guesthouse.php?genre=SEA&ville=Marseille">Marseille</a> / 
//                                                                                                                <a href="select_guesthouse.php?genre=COUNTRISIDE&ville=Reims">Reims</a> / 
//                                                                                                                <a href="select_guesthouse.php?genre=SEA&ville=Normandie/ Bretagne">Normandie/ Bretagne</a></td></tr>';            
            echo '<tr class="no_border"><td colspan="8">&nbsp;</td></tr>';
        ?>

<?php
//	$demandes_visit=array();
//	if (!empty($_COOKIE['demandes_visit'])) var_dump($_COOKIE['demandes_visit']);
//	if (!empty($_COOKIE['demandes_visit'])) $demandes_visit=traiter_cookies_v($_COOKIE['demandes_visit']);
?>

        <tr><td class="sous_titre" colspan="8">Activities</td></tr>
        <tr class="titre_colonnes">
            <td class="td1">Activities</td>
            <td class="td2">City</td>
            <td class="td6">Dates</td>
            <td class="td5">Hours</td>
            <td class="td3">Number of Persons</td>
            <td class="td4">Number of child (between 6 and 11) </td>
            <td class="td7">Price</td>
            <td class="td8">Action</td>
        </tr>

        <?php
            if (isset($_COOKIE['activity']) == false){
                echo '<tr><td colspan="8" style="text-align:center;">NO ACTIVITIES SELECTED</td></tr>';
                echo '<tr class="no_border"><td colspan="8" class="suggestions">See more activities : <a href="select_activities_ville_bis.php?ville=Paris">Paris</a> / 
                                                                                                         <a href="select_activities_ville_bis.php?ville=Strasbourg">Strasbourg</a> / 
                                                                                                         <a href="select_activities_ville_bis.php?ville=French-Riviera">French Riviera</a> / 
                                                                       
                                                                                                         <a href="select_activities_ville_bis.php?ville=Biarritz">Biarritz</a> / 
                                                                                                         <a href="select_activities_ville_bis.php?ville=Bordeaux">Bordeaux</a> / 
                                                                                                         <a href="select_activities_ville_bis.php?ville=Haute-Savoie">Haute-Savoie</a> / 
                                                                                                         <a href="select_activities_ville_bis.php?ville=Frenchpolynesia">French Polynesia</a> / 
                                                                                                         <a href="select_activities_ville_bis.php?ville=Corse">Corse</a> / 
                                                                                                         <a href="select_activities_ville_bis.php?ville=Marseille">Marseille</a> / 
                                                                                                         <a href="select_activities_ville_bis.php?ville=Reims">Reims</a> / 
                                                                                                         <a href="select_activities_ville_bis.php?ville=Normandie">Normandie/ Bretagne</a></td></tr>';
            }
     





            foreach($_COOKIE as $t1 => $t2){
                if (is_array($t2)){
                    foreach($t2 as $t3 => $val){
                        if ($t1 == "activity" && !empty($val)){
                            echo '<tr>';
                            echo '<td style="font-weight:bold;" class="td1">' . $val['nom_activite'];
                            $infos = $bdd->query('SELECT * FROM activites where nom_activite="' . $val['nom_activite'] . '"');
                            while ($donnees_act = $infos->fetch())
                            {
                               $fin_heure= $val['hours']+$donnees_act['duree'];
                                echo ' - ' .$donnees_act['nom_activite'] . '<br><br><img class="img-rounded" src="img/tousactivites/'.$donnees_act['nom_activite'].'_act.jpg" class="img-thumbnail" width="275px" height=" 180px"></td>';
                                echo '<td class="td2">' . $donnees_act['ville'] . ' </td>';
                                echo '<td class="td3">' . $val['date'] . '</td>';
                                echo '<td class="td4">From <strong>' . $val['hours'] . ':00</strong> to <strong>'.$fin_heure.':00</strong></td>';
                                echo '<td class="td5">' . $val['nb_places'] . '</td>';
                                echo '<td class="td6">' . $val['with_babies'] . ' </td>';
                                
                                echo '<td class="td7">' . $donnees_act['prix_activite'] . ' &euro;</td>';
                                echo '<td class="td8"><a href="fonctionSupprB.php?cookie_name=' . $t3 . '&cookie_val=' . $t1 . '" title="Cancel"><img src="img/logos/Delete.svg"></a></td>';
                                $prix_total_activite = $prix_total_activite + $donnees_act['prix_activite'];
                            }
                            echo '</tr>';
                        }
                    }
                }
            }
//            echo '<tr class="no_border"><td colspan="8" class="suggestions">See more guest houses : <a href="select_guesthouse.php?genre=CITIES&ville=Paris">Paris</a> /
//            <a href="select_guesthouse.php?genre=CITIES&ville=Strasbourg">Strasbourg</a> / 
//            <a href="select_guesthouse.php?genre=SEA&ville=French Riviera">French Riviera</a> / 
//            
//            <a href="select_guesthouse.php?genre=SEA&ville=Biarritz">Biarritz</a> / 
//            <a href="select_guesthouse.php?genre=CITIES&ville=Bordeaux">Bordeaux</a> / 
//            <a href="select_guesthouse.php?genre=MOUNTAIN&ville=Biarritz">Haute-Savoie</a> / 
//            <a href="select_guesthouse.php?genre=SEA&ville=Polynésie Française">French Polynesia</a> / 
//
//            <a href="select_guesthouse.php?genre=SEA&ville=Marseille">Marseille</a> / 
//            <a href="select_guesthouse.php?genre=COUNTRISIDE&ville=Reims">Reims</a> / 
//            <a href="select_guesthouse.php?genre=SEA&ville=Normandie/ Bretagne">Normandie/ Bretagne</a></td></tr>'; 
          


            
            ?>
        </table><table style="width: 90%; margin: auto;">
          <tr class="no_border"><td colspan="6">&nbsp;</td></tr>
<?php
/*	$demandes_v=array();
	if (!empty($_COOKIE['demandes_v'])) var_dump($_COOKIE['demandes_v']);
	if (!empty($_COOKIE['demandes_v'])) $demandes_v=traiter_cookies_v($_COOKIE['demandes_v']);
*/?>
 <table style="width: 90%; margin: auto;">
        <tr><td class="sous_titre" colspan="8">Guides</td></tr>
        <tr class="titre_colonnes">
            <td class="td1">Guides Visits</td>
           
            <td class="td2">City</td>
            <td class="td6">Dates</td>
            <td class="td5">Hours</td>
            <td class="td3">Number of Persons</td>
            <td class="td4">Number of child (between 6 and 11) </td>
            <td class="td7">Price</td>
            <td class="td8">Action</td>
        </tr>

        <?php
            if (isset($_COOKIE['guides']) == false){
                echo '<tr><td colspan="8" style="text-align:center;">NO VISITS SELECTED</td></tr>';
                echo '<tr class="no_border"><td colspan="8" class="suggestions">See more activities : <a href="select_activities_ville_bis.php?ville=Paris">Paris</a> / 
                                                                                                         <a href="select_activities_ville_bis.php?ville=Strasbourg">Strasbourg</a> / 
                                                                                                         <a href="select_activities_ville_bis.php?ville=French-Riviera">French Riviera</a> / 
                                                                       
                                                                                                         <a href="select_activities_ville_bis.php?ville=Biarritz">Biarritz</a> / 
                                                                                                         <a href="select_activities_ville_bis.php?ville=Bordeaux">Bordeaux</a> / 
                                                                                                         <a href="select_activities_ville_bis.php?ville=Haute-Savoie">Haute-Savoie</a> / 
                                                                                                         <a href="select_activities_ville_bis.php?ville=Frenchpolynesia">French Polynesia</a> / 
                                                                                                         <a href="select_activities_ville_bis.php?ville=Corse">Corse</a> / 
                                                                                                         <a href="select_activities_ville_bis.php?ville=Marseille">Marseille</a> / 
                                                                                                         <a href="select_activities_ville_bis.php?ville=Reims">Reims</a> / 
                                                                                                         <a href="select_activities_ville_bis.php?ville=Normandie">Normandie/ Bretagne</a></td></tr>';
            }
            





           foreach($_COOKIE as $t1 => $t2){
                if (is_array($t2)){
                    foreach($t2 as $t3 => $val){
                        if ($t1 == "guides" && !empty($val)){
                            echo '<tr>';
                            echo '<td style="font-weight:bold;" class="td1">' . $val['nom_activite'];
                           $nom_activite=$val['nom_activite'];
                           $id_guide=$val['id'];
                          
                            $infos = $bdd->query("SELECT activity_guide.nom as nom_guide, activites.ville , activites.duree,activites.nom_activite, activites.prix_activite, activity_guide.id FROM activity_guide  inner join activity_guide_activities on activity_guide_activities.guide=activity_guide.id inner join activites on  activites.nom_activite=activity_guide_activities.nom_activite where activity_guide_activities.nom_activite='$nom_activite'and activity_guide.id='$id_guide'");
                            while ($donnees_g = $infos->fetch())
                            {
                               $fin_heure= $val['hours']+$donnees_g['duree'];
                                echo ' - ' .$donnees_g['nom_guide'] . '<br><br><img class="img-rounded" src="img/actgui/'.$donnees_g['nom_activite'].'.jpg" class="img-thumbnail" width="275px" height=" 180px"></td>';
                                echo '<td class="td2">' . $donnees_g['ville'] . ' </td>';
                                echo '<td class="td3">' . $val['date'] . '</td>';
                                echo '<td class="td4">From <strong>' . $val['hours'] . ':00</strong> to <strong>'.$fin_heure.':00</strong></td>';
                                echo '<td class="td5">' . $val['nb_places'] . '</td>';
                                echo '<td class="td6">' . $val['with_babies'] . ' </td>';
                                
                                echo '<td class="td7">' . $donnees_g['prix_activite'] . ' &euro;</td>';
                                echo '<td class="td8"><a href="fonctionSupprT.php?cookie_name=' . $t3 . '&cookie_val=' . $t1 . '" title="Cancel"><img src="img/logos/Delete.svg"></a></td>';
                                $prix_total_guide = $prix_total_guide + $donnees_g['prix_activite'];
                            }
                            echo '</tr>';
                            
                        }
                    }
                }
            }
echo '</table>';
        
        $prix_total=$prix_total_chambre+$prix_total_activite+$prix_total_guide;
         ?><table style="width: 90%; margin: auto;"><?php
            echo '<tr>';
            echo '<td colspan="2" style="font-weight:bold; color:#183e67;">Total price (taxes excluded)</td>';
            echo '<td colspan="2" style="font-weight: bold; color:#183e67;">' . $prix_total . ' &euro;</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td colspan="2" style="font-weight:bold; color:#183e67;">Total price (taxes included - VAT rates 20%)</td>';
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