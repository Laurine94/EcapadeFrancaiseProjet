<?php
session_start();
var_dump($_SESSION['id']);
?><?php if (!empty($_GET['guide']) && filter_var($_GET['guide'], FILTER_VALIDATE_INT)!==false) $guide = $_GET['guide']; else header('Location: guide_plus.php');?>

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
            <li>1. Choose your guide</li>
            <li class="guesthouse_active"><strong>2. Choose your activity </strong></li>
            <li>3. Book your activity </li>
            <li>4. Confirm</li>
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


    <div class="titre" style="text-align:center">
        <h1>Professional Private Guide</h1>
    </div>

    <br>
    <br>
    <br>
    <div class="container_1">
        <div class="contenu1">
            <div class="toSize">
                <div class="media">
                    <div class="media-left media-top cadre1">
                        <div class="media-left media-top ">
                            <img class="img_reduc media-object cercle1" style="center" src="img/guides_filters/<?php echo $infos['id'] ?>.png" alt="<?php echo $infos['nom'] ?>">
                        </div>
                        <br>
                        <br>
                        <div>
                          <h3 class="media-heading" style="color:#183e67; padding-left:20%"><?php echo $infos['nom'] ?></h3>
            
                          <?php
           $num_guide=$infos['id'];
           if(isset($_SESSION['id'])){
           $id=$_SESSION['id'];
           $requete = $bdd->query("SELECT * FROM favorisg where num_guide =$num_guide and num_client=$id");
           $donnees_fav = $requete->fetch();
        
            if($donnees_fav==FALSE){
                ?><a href="ajouterWishlistGuide.php?action=ajouterFavGuide&guide=<?php echo $num_guide;?>"><button>Add in wishlist</button></a>
           <?php }
           else if($donnees_fav['favoris']==1){
                ?><a href="ajouterWishlistGuide.php?action=enleverFavGuide&guide=<?php echo $num_guide;?>"><button>Add in wishlist</button></a>
           <?php
           }
           else{
               ?><a href="ajouterWishlistGuide.php?action=remettreFavGuide&guide=<?php echo $num_guide;?>"><button>Add in wishlist</button></a>
           <?php
               
           }
           } 
           else{
                ?><a href="#"><button>Add in wishlist</button></a>
           <?php
           }
?>
                          <ul class="guide-langue">
<?php
$req = $bdd->prepare("SELECT A.*, B.langue AS lng FROM activity_guide_langue A LEFT JOIN activity_langues B ON B.id=A.langue WHERE A.guide=:guide");
$req->execute(array('guide'=>$infos['id']));
while ($languages = $req->fetch()) {
    echo '<li><img src="img/languages/'.$languages['langue'].'.png" alt="'.$languages['lng'].'"/></li>';
}

?>
</ul>
                        </div>
                    </div>
                    <div class="media-body cadre2">

                        <p style="text-align:justify; margin-left: 10%; margin-right: 10%; margin-bottom: 10%; color:#183e67; margin-top: 10%;"><?php echo $infos['description'] ?></p>

                    </div>
                </div>

            </div>
        </div>
        <br />
    </div>

    <br>
    <br>
    <div class="titre" style="text-align:center">
        <h1>Select your routes</h1>
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
                if (file_exists('img/actgui/'.$donnees['nom_activite'].'.jpg')) 
                    echo '
                    <div class="photo">
                        <a href="select_activites_guide_final.php?nom_activite='.$donnees['nom_activite'].'&ville='.$donnees['ville']. '&nom='.urlencode ($infos["nom"]).'&id='.urlencode ($guide).'">
                            <img src="img/actgui/'.$donnees['nom_activite'].'.jpg" />
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

