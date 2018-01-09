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
            <?php //include 'slideshow.php'; ?> 

            <div class="intro-header">
                <div class="video-bg">
                    <video autoplay muted loop style="width:100%;">
                        <source src="video/sea.mp4" type="video/mp4">
                        <source src="video/sea.webm" type="video/webm">
                    </video>
                    <div class="overlay"></div>
                </div>
            </div>
     
        <div class="container" style="width:90%">
            <p>Au-delà des réservations, nous souhaitons vous offrir de l’émotion : découvrez la richesse culturelle de la France en vivant comme un local.</p>
            <p style="font-size:35px; font-family:Open Sans">Selectionnez, Réservez, Rencontrez</p>
        </div>
            <div class="tableau">
                <div class="bloc1">
                    <img class="" src="img/index/hote.jpg" style="height:300px">
                     <div class="carreblanc">
                                <p style="color: black;">Nos maisons d'hôtes</p>
                            </div>
                        <div class="overlay" style="font-family:Helvetica,Sans-Serif">    
                            <p>Une sélection d'hôtels particuliculiers, de demeures et de maisons d'exceptions.</p>
                            <a href="guesthouse.php"><input type="button" value="Découvrir nos maisons d'hôtes" style='font-size:14px; width:215px;'></a>
                        </div>
                </div>
                <div class="bloc1">
                    <img class="" src="img/index/activite.jpg" style="height:300px">
                    <div class="carreblanc">
                                <p style="color: black;">Nos activités</p>
                            </div>
                    <div class="overlay">
                        <p>Un large panel d'activités conviviales à partager à deux, en famille, entre amis ou seul.</p>
                        <a href="select_activities.php?"><input type="button" value="Découvrir nos activités" style='font-size:14px; width:200px;'></a>
                    </div>
                </div>
                <br />
                <div class="bloc2">
                    <img class="" src="img/strasbourg.JPG" alt="Strasbourg">
                    <div class="carreblanc">
                                <p style="color: black;">Nouveautés</p>
                            </div>
                    <div class="overlay">
                        <p>...</p>
                        <a href="select_activities.php?ville=Strasbourg"><input type="button" value="Découvrir" style="font-size:13px; width:118px;"></a>
                    </div>
                </div>
                 <div class="bloc2">
                     <img class="doubleImage" src="img/index/insta1.jpg" style="width: 49%; height:194px;">
                     <img class="doubleImage" src="img/index/insta2.jpg" style="margin-left: -3px; width: 49%; height:194px;">
                     <div class="carreblanc1">
                                <p style="color: black;">Suivez-nous sur instagram</p>
                            </div>
                     <div class="overlay">
                         <p>Partagez votre expérience Escapade Française avec notre hashtag #LiveLikeAFrench et découvrez les secrets de nos partenaires.</p>
                         <a href="https://www.instagram.com/escapadefrancaise/?hl=fr"><input type="button" value="Je follow le compte" style='font-size:13px;width:148px;'></a>
                     </div>
                 </div>
                 <div class="bloc2">
                     <img class="" src="img/Biarritz-Plage.png" alt="Biarritz">
                     <div class="carreblanc">
                                <p style="color: black;">L'escapade du mois</p>
                            </div>
                     <div class="overlay">
                         <p>Quel destination en France au mois de Septembre</p>
                         <a href="blog.php?"><input type="button" value="Découvrir" style='font-size:13px;width:118px;'></a>
                     </div>
                </div>        
            </div>
        
        <?php include 'pop.php'?>
        
        <?php include 'footer.php'; ?>
    </body>
</html>