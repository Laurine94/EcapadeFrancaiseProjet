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
            <div class="intro-header">
                <div class="video-bg">
                    <video autoplay muted loop style="width:100%;">
                        <source src="video/ocean.mp4" type="video/mp4">
                        <source src="video/ocean.webm" type="video/webm">
                    </video>
                    <div class="overlay"></div>
                </div>
            </div>
        </div>
        <div class="container" style="width:90%">
            <p>Feel our emotions. You will never be as close to a country than the one you are visiting, France.</p>
            <p style="font-size:35px;">Select, Reserve, Meet</p>
        </div>
            <div class="tableau">
                <div class="bloc1">
                    <img class="" src="img/eiffel-tower-background.jpg" alt="paris">
                    <div class="overlay">
                        <p style="font-family: 'Arial-black', serif;">Paris</p>
                        <a href="select_guesthouse.php?ville=Paris"><input type="button" value="Book a Room"></a>
                        <a href="select_activities_ville.php?ville=Paris"><input type="button" value="Select an Actvity"></a>
                    </div>
                </div>
                <div class="bloc1">
                    <img class="" src="img/Cassis_Sud_France.png" alt="Cassis Sud France">
                    <div class="overlay">
                        <p style="font-family: 'Arial-black', serif;">French Riviera</p>
                        <a href="select_guesthouse.php?ville=French Riviera"><input type="button" value="Book a Room"></a>
                        <a href="select_activities_ville.php?ville=French Riviera"><input type="button" value="Select an Activity"></a>
                    </div>
                </div>
                <br />
                <div class="bloc2">
                    <img class="" src="img/strasbourg.JPG" alt="Strasbourg">
                    <div class="overlay">
                        <p style="font-family: 'Arial-black', serif;">Strasbourg</p>
                        <a href="select_guesthouse.php?ville=Strasbourg"><input type="button" value="Book a Room"></a>
                        <a href="select_activities_ville.php?ville=Strasbourg"><input type="button" value="Select an Activity"></a>
                    </div>
                </div>
                 <div class="bloc2">
                     <img class="" src="img/saint bath.png" alt="Saint Barthelemy">
                     <div class="overlay">
                         <p style="font-family: 'Arial-black', serif;">St-Barthelemy</p>
                         <a href="select_guesthouse.php?ville=Saint-Barthelemy"><input type="button" value="Book a Room"></a>
                         <a href="select_activities_ville.php?ville=Saint-Barthelemy"><input type="button" value="Select an Activity"></a>
                     </div>
                 </div>
                 <div class="bloc2">
                     <img class="" src="img/Biarritz-Plage.png" alt="Biarritz">
                     <div class="overlay">
                         <p style="font-family: 'Arial-black', serif;">Biarritz</p>
                         <a href="select_guesthouse.php?ville=Biarritz"><input type="button" value="Book a Room"></a>
                         <a href="select_activities_ville.php?ville=Biarritz"><input type="button" value="Select an Activity"></a>
                     </div>
                </div>
        </div>
        
        <?php include 'pop.php'?>
        
        <?php include 'footer.php'; ?>
        <script src="<?php echo $dr;?>plugins/video-bg/video.js"></script>
    </body>
</html>