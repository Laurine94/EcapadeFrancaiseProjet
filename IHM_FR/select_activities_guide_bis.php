<?php if (!empty($_GET['guide']) && filter_var($_GET['guide'], FILTER_VALIDATE_INT)!==false) $guide = $_GET['guide']; else header('Location: guide_plus.php');?>

<!DOCTYPE html>
<html>

<head> 
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/members.css" />
    <link rel="stylesheet" type="text/css" href="css/select_activities_ville.css">
    <link href="css/select_activities.css" rel="stylesheet">
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>


<body>
    <?php include 'div_panier.php'; ?>
    
    <div id="entete">
        <?php include 'navbar.php'; ?>
    </div>
    <div id="center">
        <ul class="menu_guesthouse">
            <li>1. Choisissez votre guide</li>
            <li class="guesthouse_active"><strong>2. Choisissez votre activit&eacute; </strong></li>
            <li>3. Réservez votre activit&eacute;</li>
            <li>4. Confirmez</li>
        </ul>
    </div>

    <hr />
    <br />
    <br /> 

    <?php
        include 'connexion.php';

        $req = $bdd->prepare("SELECT * FROM activity_guide WHERE id=:guide");
       
        $req->execute(array('guide'=>$guide));
        $infos = $req->fetch();
    ?>

    <div class="container_1">
        <div class="contenu1">
            <div class="toSize">
                <div class="media">
                    <div class="media-left media-top cadre1">
                        <div class="media-left media-top">
                            <img class="img_reduc media-object" style="center" src="img/guides_filters/<?php echo $infos['id'] ?>.png" alt="<?php echo $infos['nom'] ?>">
                        </div>
                        <div>
                            <p class="media-heading" style="color:white"><?php echo $infos['nom'] ?></p>


                        </div>
                    </div>
                    <div class="media-body cadre2">
                        <br>
                        <h3 class="media-heading" style="color:white">Guide Privé Professionnel</h3>
                        <br>
                        <br>
                        <p style="color:white"><?php echo $infos['description'] ?></p>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>

            </div>
        </div>
        <br />
    </div>

    <br>
    <br>
    <div class="titre" style="text-align:center">
        <h1>Sélectionnez vos parcours</h1>
    </div>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="tableau_select_region">
            <?php
            
            $req = $bdd->prepare("SELECT A.* FROM activites A INNER JOIN activity_guide_activities B ON B.activity=A.id_activite WHERE B.guide=:guide");
            $req->execute(array('guide'=>$guide));
            while ($donnees = $req->fetch()) {
                if (file_exists('img/activities/'.$donnees['id_activite'].'_activites-min-2.jpg')) 
                    echo '
                    <div class="bloc1">
                        <a href="select_activites_final.php?guide='.$donnees['id_activite'].'">
                            <img src="img/activities/'.$donnees['id_activite'].'_activites-min-2.jpg" />
                            <div class="overlay">
                                <p style="font-family:\'Cutive\', serif;">'.$donnees['nom_activite'].'</p>
                            </div>
                        </a>
                    </div>
            ';
        }
        $req->closeCursor(); // Termine le traitement de la requête
    ?> 
    <br>
</div>
</div>


    <?php include 'pop.php'?>
    
    <?php include 'footer.php'; ?>
</body>
</head>