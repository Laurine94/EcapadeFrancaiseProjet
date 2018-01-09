<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php include 'connexion.php';?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Activites</title>

    <!-- Custom CSS -->
    <link href="css/select_activities.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div id="entete">
        <?php include 'navbar.php'; ?>
    </div>
<?php if ($activities_work==1) { ?>
    <div class="slogan_act">
    	<br/><br/><br/><br/><br/><br/><br/>
        <h1>cette page sera bientot mise en ligne  </h1>
    	<br/><br/><br/><br/><br/><br/><br/>
    </div>
<?php } else { ?>
    <div id="center">
        <ul class="menu_guesthouse">
            <li class="guesthouse_active"><strong>1. Choisissez votre ville</strong></li>
            <li>2. Choisissez votre activité</li>
            <li>3. Réservez votre activité</li>
            <li>4. Confirmez</li>
        </ul>
    </div>
    <br>

    <br>

    <div class="slogan_act">
        <h1 style="font-family:'Open-sans', sans-serif">Ou voulez-vous aller?</h1>
    </div>

    <br>
    <br>
    
    <div class="titre">
        <h1 style="font-family:'Open-sans', sans-serif">Sélectionnez une ville / région pour votre activité </h1>
    </div>
    <br>

    <br>
    <!-- Page Content -->
    <div class="container">
        <div class="tableau_select_region">
    <?php
        $reponse = $bdd->query('SELECT * FROM ville');
        while ($donnees = $reponse->fetch()) {
			if (file_exists('img/villes_activites/'.$donnees['id'].'_activites-min-2.jpg')) echo '
                    <div class="bloc1">
                        <a href="select_activities_ville_bis.php?ville='.$donnees['id'].'">
							<img src="img/villes_activites/'.$donnees['id'].'_activites-min-2.jpg" alt="'.$donnees['ville'].'"/>
                            <div class="overlay">
                                <p style="font-family:\'Open-sans\', serif;">'.$donnees['ville'].'</p>
                            </div></a>
                    </div>
			';
		}
    ?>
        </div>
    </div>
    <!-- /.container -->
    <br>
    <br>
    <br>
    
    <div class="titre">
        <h1 style="font-family:'Open-sans', sans-serif">... ou choisissez dans la liste suivante </h1>
    </div>
    <br>
    <div class="select_form_act">    
        <form method="get" action="select_activities_ville_bis.php">
            <select name="ville" id="ville">
                <option selected="selected" value="default1" disabled>Selectionnez une ville / région</option>
                <?php
                    $reponse = $bdd->query('SELECT DISTINCT ville FROM activites'); // On récupère les valeurs des villes dans la bdd
                    while ($donnees = $reponse->fetch())
                    {
                ?>
                <option value="<?php echo $donnees['ville']; ?>" ><?php echo $donnees['ville']; ?></option>
                <?php
                    }
                ?>
            </select>
            <input type="submit" value="Search"/>
        </form>
    </div>
<?php } ?>
    

    <?php include 'div_panier.php'; ?>
    
    <?php include 'footer.php'; ?>
    
</body>

</html>
