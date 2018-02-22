<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="js/onglets.js"></script>
        <link href="css/guesthouse.css" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Custom CSS -->
        <link href="css/select_region.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <title>Maisons d'hôtes</title>
        
        <?php include 'connexion.php';?>

    </head>
    <body>
        
        <?php include 'div_panier.php'; ?>
        
        <div id="global">
            <div id="entete">
                <?php include 'navbar.php'; ?>
            </div>
            <br>
            <div id="center">
                <ul class="menu_guesthouse">
                    <li class="guesthouse_active"><strong>1. Choisissez votre ville</strong></li>
                    <li>2. Choisissez votre maison d'hôte</li>
                    <li>3. Réservez votre chambre</li>
                    <li>4. Confirmez</li>
                </ul>
            </div>
            <br>
       
            <br>
            
            <div class="slogan_gh">
                <h1>Où voulez vous passer vos vacances?</h1>
            </div>
            <br>
            <br>
            <br>

            <div id="contenu">
                <div class="container">
                    <div class="tableau_select_region">
                        <?php
                            require_once 'connexion.php';
                            $req = $bdd->query('SELECT DISTINCT genre FROM ville');
                            while ($donnees = $req->fetch()) {
                                if (file_exists('img/genre/'.$donnees['genre'].'.jpg')) echo '
                                        <div class="bloc5">
                                            <a href="guesthouse.php?genre='.$donnees['genre'].'">
                                                <img src="img/genre/'.$donnees['genre'].'.jpg" alt="'.$donnees['genre'].'"/>
                                                <div class="overlay">
                                                    <p style="font-family:\'Open-sans\', serif;">'.$donnees['genre'].'</p>
                                                </div>
                                            </a>
                                        </div>
                                ';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
                <?php include 'pop.php';?>
        <?php include 'footer.php'; ?>
    </body>
</html>