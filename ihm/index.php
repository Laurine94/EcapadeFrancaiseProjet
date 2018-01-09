<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/index.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <!--<link href="css/styles.css" rel="stylesheet">-->
        <!-- animsition.css -->
        <!--<link rel="stylesheet" href="css/animsition.min.css">-->
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- animsition.js -->
        <script src="js/animsition.min.js"></script>
        <title>ESCAPADE FRANCAISE</title>
        
    </head>

    <body class="animsition">
        
        
        
        
        <?php include 'div_panier.php'; ?>
        
        
        
        
        <div id="global">
            <div id="entete">
                <?php include 'navbar.php'; ?>
            </div>
        </div>
        <div>
            <?php include 'slideshow.php'; ?>    <!--slideshow-->
        </div>
        <div class="container" style="width:90%">
            <p>Au-delà des réservations, nous souhaitons vous offrir de l’émotion : découvrez la richesse culturelle de la France en vivant comme un local.</p>
            <p style="font-size:35px;">selectionnez, reservez, rencontrez</p>
        </div>
            <div class="tableau">
                <div class="bloc1">
                    <img class="" src="img/eiffel-tower-background.jpg" alt="paris">
                    <div class="overlay">
                        <p style="font-family: 'Open sans', serif;">Paris</p>
                        <a href="select_guesthouse.php?ville=Paris"><input type="button" value="Réserver une chambre" style='font-size:14px; width:200px;'></a>
                        <a href="select_activities_ville.php?ville=Paris"><input type="button" value="Selectionner une activité" style='font-size:14px; width:200px;'></a>
                    </div>
                </div>
                <div class="bloc1">
                    <img class="" src="img/Cassis_Sud_France.png" alt="Cassis Sud France">
                    <div class="overlay">
                        <p style="font-family: 'Open sans', serif;">Cote d'azur</p>
                        <a href="select_guesthouse.php?ville=French Riviera"><input type="button" value="Réserver une chambre" style='font-size:14px; width:200px;'></a>
                        <a href="select_activities_ville.php?ville=French Riviera"><input type="button" value="Selectionner une activité" style='font-size:14px;width:200px;'></a>
                    </div>
                </div>
                <br />
                <div class="bloc2">
                    <img class="" src="img/strasbourg.JPG" alt="Strasbourg">
                    <div class="overlay">
                        <p style="font-family: 'Open sans', serif;">Strasbourg</p>
                        <a href="select_guesthouse.php?ville=Strasbourg"><input type="button" value="Réserver une chambre" style="font-size:10.5px; width:128px;"></a>
                        <a href="select_activities_ville.php?ville=Strasbourg"><input type="button" value="Selectionner une activité" style="font-size:10.5px; width:130.5px;"></a>
                    </div>
                </div>
                 <div class="bloc2">
                     <img class="" src="img/saint bath.png" alt="Saint Barthelemy">
                     <div class="overlay">
                         <p style="font-family: 'Open sans', serif;">St-Barthelemy</p>
                         <a href="select_guesthouse.php?ville=Saint-Barthelemy"><input type="button" value="Réserver une chambre" style='font-size:10.5px;width:128px;'></a>
                         <a href="select_activities_ville.php?ville=Saint-Barthelemy"><input type="button" value="Selectionner une activité" style='font-size:10.5px;width:130.5px;'></a>
                     </div>
                 </div>
                 <div class="bloc2">
                     <img class="" src="img/Biarritz-Plage.png" alt="Biarritz">
                     <div class="overlay">
                         <p style="font-family: 'Open sans', serif;">Biarritz</p>
                         <a href="select_guesthouse.php?ville=Biarritz"><input type="button" value="Réserver une chambre" style='font-size:10.5px;width:128px;'></a>
                         <a href="select_activities_ville.php?ville=Biarritz"><input type="button" value="Selectionner une activité" style='font-size:10.5px;width:130.5px;'></a>
                     </div>
                </div>
        </div>
        
        <?php include 'pop.php'?>
        
        <?php include 'footer.php'; ?>
    </body>
</html>