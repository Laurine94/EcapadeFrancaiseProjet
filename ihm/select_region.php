<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Custom CSS -->
    <link href="css/select_region.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

</head>

        <body>
            <!-- Page Content -->
            <div class="container">
                <div class="tableau_select_region">
    <?php
		require_once 'connexion.php';
        $req = $bdd->query('SELECT * FROM ville');
        while ($donnees = $req->fetch()) {
			if (file_exists('img/villes_activites/'.$donnees['id'].'_activites-min-1.jpg')) echo '
                    <div class="bloc1">
                        <a href="select_guesthouse.php?ville='.$donnees['id'].'">
							<img src="img/villes_activites/'.$donnees['id'].'_activites-min-1.jpg" alt="'.$donnees['ville'].'"/>
                            <div class="overlay">
                                <p style="font-family:\'Cutive\', serif;">'.$donnees['ville'].'</p>
                            </div></a>
                    </div>
			';
		}
    ?>
                </div>
            </div>
        </body>
</html>
