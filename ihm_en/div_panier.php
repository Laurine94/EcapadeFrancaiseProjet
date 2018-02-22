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
<link href="css/div_panier.css" rel="stylesheet">
<!--<link rel='stylesheet prefetch' href='https://cdn.rawgit.com/filamentgroup/fixed-sticky/master/fixedsticky.css'>-->
<script src='js/div_panier.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<?php 
    if (isset($_COOKIE['guesthouse']))
        $nb_guesthouse = count($_COOKIE['guesthouse']);
    else
        $nb_guesthouse = 0;
    if (isset($_COOKIE['demandes_visit']))
        $nb_activity = count(traiter_cookies_v($_COOKIE['demandes_visit']));
    else
        $nb_activity = 0;

   echo '<div class="panier" id="sticky" style=" position: fixed; bottom: 148px;"><a title="Check your reservation"><p><U><strong>Your Reservation :</strong></U> &nbsp;&nbsp;&nbsp; Guesthouses (' . $nb_guesthouse . ') | Activities (' . $nb_activity . ') | Guides (0)</p></a></div>';
?>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
<head>
    <title>Your reservation</title>
    <link rel="stylesheet" type="text/css" href="css/div_panier.css">
</head>

<body style="font-family:'Montserrat', sans-serif;">
    <?php include 'connexion.php';?>

    <?php
        function taxePrixTotal($prix){
            $nb = $prix + 10;
            return $nb;
        }
    ?>

    <?php $prix_total = 0; ?>
    <table style="width: 90%; margin: auto;">
        <h2 style ="margin-left:5%; margin-top:5%; margin-bottom:-2%; font-family:'Montserrat', sans-serif;">Your reservation</h2>
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
                            echo '<td style="font-weight:bold;" class="td1">' . $val["chambre"];
                            $infos = $bdd->query('SELECT * FROM chambre inner join maison_hote on chambre.nom_mh=maison_hote.nom_mh where chambre.nom_chambre="' . $val["chambre"] . '"');
                            while ($donnees_gh = $infos->fetch())
                            {
                                echo ' - ' . $donnees_gh['nom_mh'] . '<br><img src="img/panier/'.$donnees_gh['nom_img'].'" class="img-thumbnail" width="275px" height=" 180px"></td>';
                                echo '<td class="td2">' . $donnees_gh['ville'] . '</td>';
                                echo '<td class="td3">From <strong>' . $val["date_debut"] . '</strong> to <strong>' . $val["date_fin"] . '</strong></td>';
                                echo '<td class="td4">' . $donnees_gh["nb_places"] . ' </td>';
                                echo '<td class="td5">' . $donnees_gh['nb_places'] . ' </td>';
                                echo '<td class="td6">' . $donnees_gh['prix_chambre'] . ' &euro;</td>';
                                echo '<td class="td7">' . $donnees_gh['prix_chambre'] . ' &euro;</td>';
                                echo '<td class="td8"><a href="functSuppr.php?cookie_name=' . $t3 . '&cookie_val=' . $t1 . '" title="Cancel"><img src="img/logos/Delete.svg"></a></td>';
                                $prix_total = $prix_total + $donnees_gh['prix_chambre'];
                            }
                            echo '</tr>';
                        }
                    }
                }
                
            }
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
            echo '<tr class="no_border"><td colspan="8">&nbsp;</td></tr>';
        ?>

<?php
    $demandes_visit=array();
    if (!empty($_COOKIE['demandes_visit'])) var_dump($_COOKIE['demandes_visit']);
    if (!empty($_COOKIE['demandes_visit'])) $demandes_visit=traiter_cookies_v($_COOKIE['demandes_visit']);
?>

        <tr><td class="sous_titre" colspan="6">Activities</td></tr>
        <tr class="titre_colonnes">
            <td class="td1">Activities</td>
            <td class="td2">City</td>
            <td class="td3">Dates</td>
            <td class="td4">Hours</td>
            <td class="td7">Price</td>
            <td class="td8">Action</td>
        </tr>

        <?php
            if (empty($demandes_visit)){
                echo '<tr><td colspan="6" style="text-align:center;">NO ACTIVITIES SELECTED</td></tr>';
                echo '<tr class="no_border"><td colspan="6" class="suggestions">See more activities : <a href="select_activities_ville_bis.php?ville=Paris">Paris</a> / 
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
            foreach($demandes_visit as $x => $demande){
                if (!empty($demande)){
                    echo '<tr>';
                    echo '<td style="font-weight:bold;" class="td1">' . $demande->activity . '</td>';
                    $infos = $bdd->query('SELECT * FROM activites where nom_activite="' . $demande->activity . '"');
                    while ($donnees_act = $infos->fetch())
                    {
                        echo '<td class="td2">' . $donnees_act['ville'] . '</td>';
                        echo '<td class="td3">' . $donnees_act['ville'] . '</td>';
                        echo '<td class="td4">' . $donnees_act['ville'] . '</td>';
                        echo '<td class="td7">' . $donnees_act['prix_activite'] . ' &euro;</td>';
                        echo '<td class="td8"><a href="fonctionSupprB.php?cookie_name=' . $demande->activity . '" title="Cancel"><img src="img/logos/Delete.svg"></a></td>';
                        $prix_total = $prix_total + $donnees_act['prix_activite'];
                    }
                    echo '</tr>';
                }
            }

            echo '<tr class="no_border"><td colspan="6">&nbsp;</td></tr>';
        ?>

        <?php
            echo '<tr>';
            echo '<td colspan="2" style="font-weight:bold; color:#183e67;">Total price (taxes excluded)</td>';
            echo '<td colspan="2" style="font-weight: bold; color:#183e67;">' . $prix_total . ' &euro;</td>';
            echo '</tr>';
            echo '<tr>';
            echo '<td colspan="2" style="font-weight:bold; color:#183e67;">Total price (taxes included)</td>';
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
    <br>
    <br>
    <br>
</body>
  </div>

</div>



<script>
// Get the modal
var modal = document.getElementById('myModal');
// Get the button that opens the modal
var btn = document.getElementById("sticky");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>