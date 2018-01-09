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

        
       
        <link href="css/members.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/select_room.css">
        <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />
        <script src="js/animsition.min.js"></script>
        




        <?php
            if (!empty($_GET['ville'])) $ville = $_GET['ville']; else header('Location: select_activities.php');
            if (!empty($_GET['type_activite'])) $type_activite = $_GET['type_activite']; else $type_activite = '';
            if (!empty($_GET['nom_activite'])) $nom_activite = $_GET['nom_activite']; else $nom_activite = '';
            if (!empty($_GET['id_activite'])) $id_activite = $_GET['id_activite']; else $id_activite = '';
        ?>

    </head>

    <body class="animsition">
    
        <div id="entete">
            <?php include 'navbar.php'; ?>
        </div>
        <br>
        <br>
        <div id="center">
            <ul class="menu_guesthouse">
                <li>1. Choose your city</li>
                <li>2. Choose your activity </li>
                <li class="guesthouse_active"><strong>3. Book your activity </strong></li>
                <li>4. Confirm </li>
            </ul>
        </div>

        <br />
        <br /> 

        <?php
            include 'connexion.php';
        ?>

        <div>
            <?php
            include 'slideshow.php';
        ?>
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
                                <p style="color:#183e67; text-align:justify; margin-top:5%; margin-left:5%; margin-right:5%"><?php echo $infos['description_activite']; ?></p>
                                <br>
                                <br>
                                <p style="color:#183e67; text-align:left; margin-left:5%"> Price: <?php echo $infos['prix_activite']; ?> €</p>
                                <br>
                                <p style="color:#183e67; text-align:left; margin-left:5%; margin-bottom:5%"> Duration: <?php echo $infos['duree']; ?> Hours </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <div class="container_2">
                        <div style="width: 60%; display:inline-block">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8" style="overflow: hidden; border-color: #183e67; border-style: solid;">
                                        <div id="datetimepicker12"></div>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="cadreavis">
                        
                        <p style="color:#923e67">avis<p>

                    </div>
                </div>


                <!--<div class="container">
                    <h3 style="color:red; text-align:center" > Other activities proposed by <?= htmlspecialchars($_GET["nom"]) ?> </h3>
		  <div class="tableau_select_region">
		    <?php
		      
		      /*$req = $bdd->prepare("SELECT A.* FROM activites A INNER JOIN activity_guide_activities B ON B.activity=A.id_activite WHERE B.guide=:guide");
		      $req->execute(array('guide'=>$_GET["id"]));
		      while ($donnees = $req->fetch()) {
                      if (file_exists('img/actgui/'.$donnees['nom_activite'].'.jpg')) 
                      echo '
                      <div class="photo">
                      <a href="select_activites_final.php?nom_activite='.$donnees['nom_activite'].'&ville='.$donnees['ville']. '&nom='.$_GET["nom"].'&id='.$_GET['id'].'">
                      <img src="img/actgui/'.$donnees['nom_activite'].'.jpg" />
                      <div class="overlay">
                      <p style="font-family:\'Cutive\', serif;">'.$donnees['nom_activite'].'</p>
                      </div>
                      </a>
                      </div>
		      ';
		      }
		      $req->closeCursor(); // Termine le traitement de la requête*/
		    ?> 
		    <br>
		    </div>
		  </div>-->

                
                <div class="container_3">
                    <div class="carte">
                        <p style="color:white"><?php echo $infos['localisation']; ?></p> 
                    </div>
                </div>

                <?php include 'div_panier.php'; ?>
                <?php include 'pop.php';?>
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
                   format: 'DD.MM.YYYY.HH.mm',
                   minDate : moment()
               });
            });
        });
        </script>
    </body>

</html>

