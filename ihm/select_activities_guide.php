<?php if (!empty($_GET['guide']) && filter_var($_GET['guide'], FILTER_VALIDATE_INT)!==false) $guide = $_GET['guide']; else header('Location: guide_plus.php');?>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/members.css" />
    <link rel="stylesheet" type="text/css" href="css/select_activities_ville.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Activities</title>
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
            <li>3. reservez votre activit&eacute;</li>
            <li>4. Confirmer</li>
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
                <div class="media-left media-top">
                    <img class="img_reduc media-object" src="img/guides_filters/<?php echo $infos['id'] ?>.png" alt="<?php echo $infos['nom'] ?>">
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $infos['nom'] ?></h4>
                    <p><?php echo $infos['description'] ?></p>
                </div>
            </div>
        </div>
    </div>
    <br />
</div>

    <br />
    <br /> 
    
    <?php
        $a = 1;
		$req = $bdd->prepare("SELECT A.* FROM activites A INNER JOIN activity_guide_activities B ON B.activity=A.id_activite WHERE B.guide=:guide");
		$req->execute(array('guide'=>$guide));
        while ($donnees = $req->fetch()) {
            echo '<div class="grande_div">';
            echo '<div class="img_act adapt' . $a . '">';
            echo '<img src="img/activities/' . $donnees['id_activite'] . '.jpg" alt="...">';
            echo '</div>';
            echo '<div class="desc_act adapt' . $a . '">';
            echo '<div class="sous_div">';
            echo '<h2>' . $donnees['nom_activite'] . '</h2>';
            echo '<br />';
            echo '<div class="infos">';
            echo '<p>' . $donnees['duree'] . ' Hrs &nbsp;|&nbsp; ' . $donnees['prix_activite'] . '€</p>';
            echo '<br />';
            echo '<p>' . $donnees['jours_dispo'] . '</p>';
            echo '</div>';
            echo '<br />';
            echo '<a href="activities_plus.php?nom_activite=' . $donnees['nom_activite'] . '"><input type="button" value="More Information"/></a>';
            echo '</div>';
            echo '</div>';
            echo '&nbsp;';
            echo '</div>';
            $a = $a + 1;
        }
        $req->closeCursor(); // Termine le traitement de la requête
    ?>  
    
<?php include 'pop.php'?>
    
<?php include 'footer.php'; ?>
</body>

<script type="text/javascript">
    redimensionner('div.adapt1');
    redimensionner('div.adapt2');
    redimensionner('div.adapt3');
    redimensionner('div.adapt4');
    redimensionner('div.adapt5');
    redimensionner('div.adapt6');
    redimensionner('div.adapt7');
    redimensionner('div.adapt8');
    redimensionner('div.adapt9');
    redimensionner('div.adapt10');
    redimensionner('div.adapt11');
    redimensionner('div.adapt12');
    redimensionner('div.adapt13');
    redimensionner('div.adapt14');
    redimensionner('div.adapt15');
    redimensionner('div.adapt16');
    redimensionner('div.adapt17');
    redimensionner('div.adapt18');
    redimensionner('div.adapt19');
    redimensionner('div.adapt20');
    redimensionner('div.adapt21');
    redimensionner('div.adapt22');
    redimensionner('div.adapt23');
    redimensionner('div.adapt24');
    redimensionner('div.adapt25');
    redimensionner('div.adapt26');
    redimensionner('div.adapt27');
    redimensionner('div.adapt28');
    redimensionner('div.adapt29');
    redimensionner('div.adapt30');
    
    function redimensionner(selecteur){
        var hauteur=0;
        $(selecteur).each(function(){
            if($(this).height()>hauteur) hauteur = $(this).height();
        });
        
        $(selecteur).each(function(){ 
            $(this).height(hauteur);
        });
    }
</script>