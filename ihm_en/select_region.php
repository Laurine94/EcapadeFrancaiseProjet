<!DOCTYPE html>
<html lang="en">

<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111755406-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111755406-1');
</script>
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
                			if (file_exists('img/guest/'.$donnees['id'].'_pres.jpg')) echo '
                                    <div class="bloc5">
                                        <a href="select_guesthouse.php?genre='.$donnees['genre'].'&ville='.$donnees['ville'].'"/>
                							<img src="img/guest/'.$donnees['id'].'_pres.jpg" alt="'.$donnees['ville'].'"/>
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
