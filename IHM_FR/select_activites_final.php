<html>

    <head>
        <link rel="stylesheet" type="text/css" href="css/select_activities_ville.css">
        <title>Activités</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Custom CSS -->
        <link href="css/select_activities.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="css/select_activities_ville.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/activities_plus.css" rel="stylesheet">

        
        <script src="js/animsition.min.js"></script>
        <link href="css/members.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/select_room.css">
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />
        




        <?php
            if (!empty($_GET['ville'])) $ville = $_GET['ville']; else header('Location: select_activities.php');
            if (!empty($_GET['type_activite'])) $type_activite = $_GET['type_activite']; else $type_activite = '';
            if (!empty($_GET['nom_activite'])) $nom_activite = $_GET['nom_activite']; else $nom_activite = '';
        ?>

    </head>

    <body class="animsition">
    
        <?php include 'div_panier.php'; ?>
    
        <div id="entete">
            <?php include 'navbar.php'; ?>
        </div>
        <br>
        <br>
        <div id="center">
            <ul class="menu_guesthouse">
                <li>1. Choisissez votre ville</li>
                <li>2. Choisissez votre activité </li>
                <li class="guesthouse_active"><strong>3. Réservez votre activité </strong></li>
                <li>4. Confirmez</li>
            </ul>
        </div>

        <br />
        <br /> 

        <?php
            include 'connexion.php';
        ?>

        <div>
            <?php include 'slideshow.php'; ?>    <!--slideshow-->
        </div>

        <br>
        <br>
        <br>

        <?php
            $req = $bdd->query("SELECT * FROM activites WHERE nom_activite='$nom_activite'");
            $infos = $req->fetch();
        ?>
                <div class="container_1">
                    <div class="contenu1">
                        <div class="toSize">
                            <div class="media">
                                <div class="media-body cadre2">
                                <br>
                                <h3 class="media-heading" style="color:white">Description de l'activité</h3>
                                <br>
                                <br>
                                <p style="color:white"><?php echo $infos['description_activite']; ?></p>
                                <br>
                                <br>
                                <p style="color:white"> Prix: <?php echo $infos['prix_activite']; ?> €</p>
                                <br>
                                <p style="color:white"> Durée: <?php echo $infos['duree']; ?> Heure(s) </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <div class="container_2">
                        <div style="width: 60%;">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8" style="overflow: hidden; border-color: darkred; border-style: solid;">
                                        <div id="datetimepicker12"></div>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="cadreavis">
                        <br>
                        <br>
                        <br>
                        <br>
                        <p>avis<p>

                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="container_3">
                    <div class="carte">
                        <p style="color:white"><?php echo $infos['localisation']; ?></p> 
                    </div>
                </div>
                <br>
                <br>
                <br>
                <div class="container_4">
                    <div class="tableau_select_region">
                    <?php
            
                        $reponse = $bdd->query("SELECT nom_activite FROM activites WHERE ville='$ville'");
                            while ($donnees = $reponse->fetch()) {
                            if (file_exists('img/activities/'.$donnees['nom_activite'].'_activites-min-2.jpg')) echo '
                                <div class="photo">
                                    <a href="select_activites_final.php?ville='.$ville.'&type_activite='.$type_activite.'&nom_activite='.$donnees['nom_activite'].'">
                                        <img src="img/activities/'.$donnees['nom_activite'].'_activites-min-2.jpg" alt="'.$type_activite.'"/>
                                            <div class="overlay">
                                                <p style="font-family:\'Open-sans\', serif;">'.$donnees['nom_activite'].'</p>
                                            </div>
                                    </a>
                                </div>
                            ';
                            }
                    ?>
                    </div>
                <br>
                <br>
                <br>
                <br>
        </div>
        <?php include 'footer.php'; ?>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/moment-with-locales.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function()
        {    
            $(function ()
            {
               $('#datetimepicker12').datetimepicker(
               {
                   inline: true,
                   sideBySide: true,
                   format: 'DD.MM.YYYY.HH.mm'
               });
            });
        });
        </script>
    </body>

</html>

