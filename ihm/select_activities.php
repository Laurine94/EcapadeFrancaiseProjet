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
    
    <?php include 'div_panier.php'; ?>
    
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
            <li class="guesthouse_active"><strong>1. Choose your City</strong></li>
            <li>2. Choose your Activity</li>
            <li>3. Book your Activity</li>
            <li>4. Confirm</li>
        </ul>
    </div>

    <div class="slogan_act">
        <h1>Where would you like to go?</h1>
    </div>
    
    <div class="titre">
        <h1>Select a city / region for your activity :</h1>
    </div>

    <!-- Page Content -->
    <div class="container">
        <div class="tableau_select_region">
    <?php
        $reponse = $bdd->query('SELECT * FROM ville');
        while ($donnees = $reponse->fetch()) {
			if (file_exists('img/villes_activites/'.$donnees['id'].'_activites-min-2.jpg')) echo '
                    <div class="bloc1">
                        <a href="select_activities_ville.php?ville='.$donnees['id'].'">
							<img src="img/villes_activites/'.$donnees['id'].'_activites-min-2.jpg" alt="'.$donnees['ville'].'"/>
                            <div class="overlay">
                                <p style="font-family:\'Cutive\', serif;">'.$donnees['ville'].'</p>
                            </div></a>
                    </div>
			';
		}
    ?>
        </div>
    </div>
    <!-- /.container -->
    
    <div class="titre">
        <h1>... or choose among the following list :</h1>
    </div>
    
    <div class="select_form_act">    
        <form method="get" action="select_activities_ville.php">
            <select name="ville" id="ville">
                <option selected="selected" value="default1" disabled>Select a city / region</option>
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
    
    
    <?php include 'footer.php'; ?>
    
</body>

</html>
