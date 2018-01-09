<head>
    <link rel="stylesheet" type="text/css" href="css/select_activities_ville.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Activités</title>

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
    
    <br />

    <div class="type_act">
        <?php
            $abc = $bdd->query('SELECT DISTINCT type_activite FROM activites where ville = "' . $ville . '"');
            while ($donnees = $abc->fetch()){
                echo '<a href="?ville=' . $ville . '&type_activite=' . $donnees['type_activite'] . '">' . $donnees['type_activite'] . '</a>';
            }
            $abc->closeCursor();
        ?>
        <br />
        <a href="?ville=<?php echo $ville; ?>">
            <input type="button" value="Toutes les activités dans votre ville" />
        </a>
    </div> 
    
    <br />
    
    <?php
        $a = 1;
        if (isset($_GET['type_activite'])) 
            $reponse = $bdd->query('SELECT * FROM activites where ville="' . $ville . '" and type_activite="' . $type_activite .'"');
        else
            $reponse = $bdd->query('SELECT * FROM activites where ville="' . $ville . '"');
        while ($donnees = $reponse->fetch())
        {
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
            echo '<a href="activities_plus.php?nom_activite=' . $donnees['nom_activite'] . '"><input type="button" value="Plus d\'informations"/></a>';
            echo '</div>';
            echo '</div>';
            echo '&nbsp;';
            echo '</div>';
            $a = $a + 1;
        }
        $reponse->closeCursor(); // Termine le traitement de la requête
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
    redimensionner('div.adapt31');
    redimensionner('div.adapt32');
    redimensionner('div.adapt33');
    redimensionner('div.adapt34');
    redimensionner('div.adapt35');
    redimensionner('div.adapt36');
    redimensionner('div.adapt37');
    redimensionner('div.adapt38');
    redimensionner('div.adapt39');
    redimensionner('div.adapt40');
    redimensionner('div.adapt41');
    redimensionner('div.adapt42');
    redimensionner('div.adapt43');
    redimensionner('div.adapt44');
    redimensionner('div.adapt45');
    redimensionner('div.adapt46');
    redimensionner('div.adapt47');
    redimensionner('div.adapt48');
    redimensionner('div.adapt49');
    redimensionner('div.adapt50');

    
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