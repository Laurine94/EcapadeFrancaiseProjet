<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Custom CSS -->
    <link href="css/select_region.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <?php
if (!empty($_GET['genre'])) $genre = $_GET['genre']; else header('Location: genre.php');
if (!empty($_GET['ville'])) $ville = $_GET['ville']; else $ville = '';
?>

</head>

        <body>
            <?php
                    include 'connexion.php';
                    ?>

            <!-- Page Content -->
            <div class="container">
                <div class="tableau_select_region">  
                    <?php
                        $req = $bdd->query("SELECT * FROM ville WHERE genre='$genre'");
                        while ($donnees = $req->fetch()) {
                			if (file_exists('img/villes_activites/'.$donnees['id'].'_guest.jpg')) echo '
                                    <div class="bloc5">
                                        <a href="select_guesthouse.php?genre='.$donnees['genre'].'&ville='.$donnees['ville'].'"/>
                							<img src="img/villes_activites/'.$donnees['id'].'_guest.jpg" alt="'.$donnees['ville'].'"/>
                                            <div class="overlay">
                                                <p style="font-family:\'Open-sans\', serif;">'.$donnees['ville'].'</p>
                                            </div></a>
                                    </div>
                			';
                		}
                    ?>
                </div>
            </div>
        </body>
</html>
