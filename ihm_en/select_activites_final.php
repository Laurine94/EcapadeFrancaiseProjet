<?php
session_start();
var_dump($_SESSION['id']);
?><html>

    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111755406-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-111755406-1');
        </script>
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
        if (!empty($_GET['ville']))
            $ville = $_GET['ville'];
        else
            header('Location: select_activities.php');
        if (!empty($_GET['type_activite']))
            $type_activite = $_GET['type_activite'];
        else
            $type_activite = '';
        if (!empty($_GET['nom_activite']))
            $nom_activite = $_GET['nom_activite'];
        else
            $nom_activite = '';
        if (!empty($_GET['id_activite']))
            $id_activite = $_GET['id_activite'];
        else
            $id_activite = '';
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
                            <h3> All descriptions are exclusively the total property from our partners. </h3>
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
        
        <div class="favoris" style="text-align: center;">
        <?php
        $nom_actvite = $infos['nom_activite'];
        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $requete = $bdd->query("SELECT * FROM favorisa where nom_activite = '$nom_activite' and num_client=$id");
            $donnees_fav = $requete->fetch();

            if ($donnees_fav == FALSE) {
                ?><a href="ajouterWishlistActivite.php?action=ajouterFavActivite&nom_activite=<?php echo $nom_activite; ?>&ville=<?php echo $ville ?>&type_activite=<?php echo $type_activite; ?>"><span class="glyphicon glyphicon-star-empty glyphicon-5x" style="font-size: 50px; color: yellow"></span>Add to wishlist</a>
                <?php
            } else if ($donnees_fav['favoris'] == 1) {
                ?><a href="ajouterWishlistActivite.php?action=enleverFavActivite&nom_activite=<?php echo $nom_activite; ?>&ville=<?php echo $ville ?>&type_activite=<?php echo $type_activite; ?>"><span class="glyphicon glyphicon-star glyphicon-5x" style="font-size: 50px ;color: yellow"> </span>Add to wishlist</a>
                <?php
            } else {
                ?><a href="ajouterWishlistActivite.php?action=remettreFavActivite&nom_activite=<?php echo $nom_activite; ?>&ville=<?php echo $ville ?>&type_activite=<?php echo $type_activite; ?>"><span class="glyphicon glyphicon-star-empty glyphicon-5x" style="font-size: 50px; color: yellow"></span>Add to wishlist</a>
                <?php
            }
        } else {
            ?><a href="#"><span class="glyphicon glyphicon-star-empty glyphicon-5x" style="font-size: 50px; color: yellow"></span>Add to wishlist</a>
        <?php }
        ?>
            </div>
        <div class="container_2">

            <!-- <div style="width: 60%; display:inline-block">
                 <div class="form-group">
                     <div class="row">
                         <div class="col-md-8" style="overflow: hidden; border-color: #183e67; border-style: solid;">
                             <div id="date">-->
            <div class="div_25 toSize">
                <div class="sous_div">
                    <p style="font-weight:bold; font-size:18px; text-align: center;">Selection your visit date:</p>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <form action="fonctionAdd.php" method="get">
                                <div class="form-group">
                                    <!-- Include Required Prerequisites -->

                                    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>

                                    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

                                    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />



                                    <!-- Include Date Range Picker -->

                                    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

                                    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

                                    <input class="form-control" type="text" name="date" /><br>



                                    <script type="text/javascript">



            $('input[name="date"]').daterangepicker({

                singleDatePicker: true,
                startDate: moment().startOf("day"),
                minDate: moment().startOf("day"),
                showDropdowns: true

            },
                    );

                                    </script>
                                    <label>Hour of departure:</label>
                                    <div class="row">  
                                        <div class="col-xs-4 col-sm-4 col-md-4">
                                            <select class="form-control" name="hours" style="color: black">
                                        
                                    <?php
                                    for ($i = 10; $i <= 17; $i++) {
                                        echo"<option value=$i>$i H</option>";
                                    }
                                    ?>

                                    </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="cookie_name" value="act">
                                    <input type="hidden" name="type" value="act">
                                    <input type="hidden" name="cookie_val" value="<?php echo $infos['nom_activite']; ?>">


<!--<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
   
    
</script>-->
                                    <br /><br />
                                    <div>
                                        <label>Number of persons:</label>
                                        <div class="row">  
                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                <input class="form-control" type="number" value="0" name="nb_places" style="color: black">
                                            </div>
                                        </div>
                                        <br /><br />
                                        <div class="row">  
                                            <div class="col-xs-4 col-sm-4 col-md-4">
                                                <input class="form-control" type="number" name="with_babies" value="0" id="with_babies" class="pull-right" style="color: black"/><span class="pull-right">Child between 6/11 years old</span>
                                            </div>
                                        </div>
                                    </div>


                                    <br /><br />


                                    <?php
                                    echo '<p style="font-size:20px;" id="prix_' . $infos['nom_activite'] . '">Price: <strong>' . $infos['prix_activite'] . '€</strong></p>';
                                    ?>


                                    <a><input type="submit" value="Book" class="submit_btn"/></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="cadreavis">

            <p style="color:#923e67">Tell us ...<p>

        </div>
    </div>


    <div class="container">
<!-- <? $nom_ville = $ville['ville'];?>-->
        <h3 style="color:red; text-align:center" > Browse other activities in <?= htmlspecialchars($ville) ?> </h3>
        <div class="tableau_select_region">
            <?php
            $reponse = $bdd->query("SELECT DISTINCT nom_activite FROM activites WHERE type_activite='$type_activite' AND ville='$ville'");
            while ($donnees = $reponse->fetch()) {
                if (file_exists('img/tousactivites/' . $donnees['nom_activite'] . '_act.jpg'))
                    echo '
                        <div class="bloc12" class="contourblanc">
                                <a href="select_activites_final.php?ville=' . $ville . '&type_activite=' . $type_activite . '&nom_activite=' . $donnees['nom_activite'] . '">
                                    <img src="img/tousactivites/' . $donnees['nom_activite'] . '_act.jpg" alt="' . $type_activite . '"/>
                                    <div class="overlay">
                                        <p>' . $donnees['nom_activite'] . '</p>
                                    </div>
                                </a>
                        </div>
                    ';
            }
            ?>
            <br>
        </div>
    </div>


    <div class="container_3">
        <div class="carte">
            <p style="color:white"><?php echo $infos['localisation']; ?></p> 
        </div>
    </div>

    <?php include 'div_panier.php'; ?>
    <?php include 'pop.php'; ?>
    <?php include 'footer.php'; ?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!--<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
    /*$(document).ready(function()
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
    });*/
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />-->




</body>

</html>

