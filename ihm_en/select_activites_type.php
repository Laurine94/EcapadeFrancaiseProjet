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
    <link rel="stylesheet" type="text/css" href="css/select_activities_ville.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Activités</title>

        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Custom CSS -->
    <link href="css/select_activities.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

<?php
if (!empty($_GET['ville'])) $ville = $_GET['ville']; else header('Location: select_activities.php');
if (!empty($_GET['type_activite'])) $type_activite = $_GET['type_activite']; else $type_activite = '';
?>

</head>

<body>
    

    
    <div id="entete">
        <?php include 'navbar.php'; ?>
    </div>
        <div class="type_act" style="height: auto; width:100%; background-position: center bottom; opacity:1.75; background-image: url(<?php echo 'img/activitestype/'.$type_activite.'_fond.jpg';?>); background-size: cover; padding-bottom: 50px;">

    <br>
    <br>
    <div id="center">
        <div class="cadre3">
                <ul class="menu_guesthouse">
                    <li style="color:white">1. Choose your city</li>
                    <li class="guesthouse_active"><strong>2. Choose your activity </strong></li>
                    <li style="color:white">3. Book your activity</li>
                    <li style="color:white">4. Confirm     </li>
                </ul>
        </div>
    </div>

    <br />
    <br /> 

    <?php
        include 'connexion.php';
    ?>

        <br>
        <br>
        <br>
        
        <div class="sous_titre">
            <div class="cadre4">
                    <h2 style="color:white"> All activities of this type in your city </h2>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>

        <div class="container">
        <div class="tableau_select_region">

            <?php
            
            $reponse = $bdd->query("SELECT DISTINCT nom_activite FROM activites WHERE type_activite='$type_activite' AND ville='$ville'");
                while ($donnees = $reponse->fetch()) {
                    if (file_exists('img/tousactivites/'.$donnees['nom_activite'].'_act.jpg')) echo '
                        <div class="bloc12" class="contourblanc">
                                <a href="select_activites_final.php?ville='.$ville.'&type_activite='.$type_activite.'&nom_activite='.$donnees['nom_activite'].'">
                                    <img src="img/tousactivites/'.$donnees['nom_activite'].'_act.jpg" alt="'.$type_activite.'"/>
                                    <div class="overlay">
                                        <p>'.$donnees['nom_activite'].'</p>
                                    </div>
                                </a>
                        </div>
                    ';
                }
            ?>
        </div>        
        </div> 
        <br>
    </div>

    <br>

        <?php include 'div_panier.php'; ?>

    <?php include 'pop.php';?> 
            <?php include 'footer.php'; ?>

</body>
</html>