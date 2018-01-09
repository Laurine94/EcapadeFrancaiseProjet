<html>

<head>
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
    
    <?php include 'div_panier.php'; ?>
    
    <div id="entete">
        <?php include 'navbar.php'; ?>
    </div>
        <div class="type_act" style="height: auto; width:100%; background-position: center bottom; opacity:1.75; background-image: url(<?php echo 'img/activitestype/'.$type_activite.'_fond.jpg';?>); background-size: cover; padding-bottom: 50px;">

    <br>
    <br>
    <div id="center">
        <ul class="menu_guesthouse">
            <li>1. Choisissez votre ville</li>
            <li class="guesthouse_active"><strong>2. Choisissez votre activité </strong></li>
            <li>3. Réservez votre activité</li>
            <li>4. Confirmez</li>
        </ul>
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
                <h2 style="color:white"> Toutes les activités de ce type dans votre ville </h2>
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
                        <div class="bloc12">
                            <div class="contourblanc">
                                <a href="select_activites_final.php?ville='.$ville.'&type_activite='.$type_activite.'&nom_activite='.$donnees['nom_activite'].'">
                                    <img src="img/tousactivites/'.$donnees['nom_activite'].'_act.jpg" alt="'.$type_activite.'"/>
                                    <div class="overlay">
                                        <p>'.$donnees['nom_activite'].'</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    ';
                }
            ?>
        </div>        
        </div> 
        <br>
    </div>

    <br>

    <?php include 'pop.php';?> 
            <?php include 'footer.php'; ?>

</body>
</html>