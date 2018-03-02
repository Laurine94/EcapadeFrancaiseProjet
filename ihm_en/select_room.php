<?php
session_start();
?><!DOCTYPE html>
<?php
include 'connexion.php';

// Si tout va bien, on peut continuer
//On récupère la valeur de la maison d'hote sélectionnée
$nom_mh = $_GET['nom_mh'];

// On récupère tout le contenu de la table chambre en prenant en compte la ville choisie
$reponse = $bdd->query('SELECT * FROM chambre inner join maison_hote on chambre.nom_mh=maison_hote.nom_mh where chambre.nom_mh = "' . $nom_mh . '" order by prix_chambre');
?>

<html>
    <head>
        <meta charset="UTF-8"> 
        <link href="css/select_guesthouse.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/w3.css">
        <link rel="stylesheet" type="text/css" href="css/select_room.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/datepicker.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="css/calendar2.js"></script>
        <!--<script>
            $( function() {
                $( "#date_debut" ).datepicker();
            } );
        </script>
        <script>
            $( function() {
                $( "#date_fin" ).datepicker();
            } );
        </script>-->

        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>





        <?php

        function suppr_accents($str, $encoding = 'utf-8') {
            // transformer les caractères accentués en entités HTML
            $str = htmlentities($str, ENT_NOQUOTES, $encoding);

            // remplacer les entités HTML pour avoir juste le premier caractères non accentués
            // Exemple : "&ecute;" => "e", "&Ecute;" => "E", "Ã " => "a" ...
            $str = preg_replace('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $str);

            // Remplacer les ligatures tel que : Œ, Æ ...
            // Exemple "Å“" => "oe"
            $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str);
            // Supprimer les quotes
            $str = preg_replace('#"#', '', $str);
            // Supprimer tout le reste
            $str = preg_replace('#&[^;]+;#', '', $str);

            return $str;
        }
        ?>







<?php include 'div_panier.php'; ?>

        <div id="entete">
<?php include 'navbar.php'; ?>
        </div>
        <br>
        <div id="center">
            <ul class="menu_guesthouse">
                <li><a href="guesthouse.php" style="text-decoration:none;color:grey;">Choose your city</a></li>

                <?php
                $back = $bdd->query('SELECT ville FROM maison_hote where nom_mh="' . $nom_mh . '"');
                while ($ville = $back->fetch()) {
                    $nom_ville = $ville['ville'];
                    echo '<li><a href="select_guesthouse.php?ville=' . $nom_ville . '" style="text-decoration:none;color:grey;">Choose your guesthouse</a></li>';
                }
                ?>

                <li class="guesthouse_active">Book your room</li>
                <li>Confirm</li>
            </ul>
        </div>
        <br /><br />



        <div class="tableau_select_region">



            <?php
            $roomNbr = 0;
            $desc = $bdd->query('
                        SELECT *, (SELECT COUNT(*) FROM chambre where chambre.nom_mh=maison_hote.nom_mh) AS rooms_nbr 
                        FROM maison_hote where nom_mh = "' . $nom_mh . '"
                    ');
            while ($donnees = $desc->fetch()) {
                if (file_exists('img/presentation_mh/' . $donnees['nom_mh'] . '_pres.jpg'))
                    echo '<div class="bloc16">';
                echo '<img src="img/presentation_mh/' . $donnees['nom_mh'] . '_pres.jpg" alt="' . $donnees['nom_mh'] . '"/>';
                echo '<div class="overlay">';
                echo '<h1>' . $donnees['nom_mh'] . '</h1>';
                echo '<br>';
                echo '<br>';
                echo '<p>' . htmlspecialchars($donnees['description_mh']) . '</p>';
                echo '<br>';
                echo '<br>';
                echo '<p><b>Nombre de chambres: ' . $donnees['rooms_nbr'] . '</b></p>';
                $roomNbr = intval($donnees['rooms_nbr']);
            }
            $desc->closeCursor(); // Termine le traitement de la requête
            echo '<br>';
            echo "<h3> All descriptions are exclusively the total property from our partners. </h3>";
            echo '<br>';
            $desc = $bdd->query("SELECT nom_chambre FROM chambre where nom_mh = '$nom_mh'");
            $i = 1;
            while ($donnees = $desc->fetch()) {
                if ($i < $roomNbr)
                    echo '<a href="#' . $donnees['nom_chambre'] . '" style="color:white"> ' . $donnees['nom_chambre'] . "  |  " . '</a>';
                else
                    echo '<a href="#' . $donnees['nom_chambre'] . '" style="color:white"> ' . $donnees['nom_chambre'] . '</a>';
                $i++;
            }
            echo '<br>';
            echo '<br>';
            echo '</div>';
            echo '</a>';
            echo '</div>';


            $desc->closeCursor(); // Termine le traitement de la requête
            ?>

        </div>



        <!--<div class="presentation_ville">
        <div class="ville_description">
        <?php
        $roomNbr = 0;
        $desc = $bdd->query('
                		SELECT *, (SELECT COUNT(*) FROM chambre where chambre.nom_mh=maison_hote.nom_mh) AS rooms_nbr 
                		FROM maison_hote where nom_mh = "' . $nom_mh . '"
                	');
        while ($donnees = $desc->fetch()) {
            echo '<h1>' . $nom_mh . '</h1>';
            echo '<p>' . $donnees['description_mh'] . '</p>';
            echo '<p><b>Number of rooms: ' . $donnees['rooms_nbr'] . '</b></p>';
            $roomNbr = intval($donnees['rooms_nbr']);
        }
        $desc->closeCursor(); // Termine le traitement de la requête

        $desc = $bdd->query("SELECT nom_chambre FROM chambre where nom_mh = '$nom_mh'");
        $i = 1;
        while ($donnees = $desc->fetch()) {
            if ($i < $roomNbr)
                echo '<a href="#' . $donnees['nom_chambre'] . '" style="color:white"> ' . $donnees['nom_chambre'] . "  |  " . '</a>';
            else
                echo '<a href="#' . $donnees['nom_chambre'] . '" style="color:white"> ' . $donnees['nom_chambre'] . '</a>';
            $i++;
        }
        $desc->closeCursor(); // Termine le traitement de la requête
        ?>
                </div>
</div>-->
        <br />
        <br>
        <br>

        <style>
            #sticky-menu {
                position: sticky;
                position: -webkit-sticky;
                top: 0px;
                margin-top: 100px;
                width: 100%;
                height: 40px;
                background-color: white;
                color: #f00;
                /*opacity: 0.6;*/
                text-align: center;
                font-size: 150%;
                z-index: 100;
            }
            .titre  h1 {
                padding-top: 40px;
            }
        </style>

        <div id="sticky-menu">
            <?php
            $desc = $bdd->query("SELECT nom_chambre FROM chambre where nom_mh = '$nom_mh'");
            $i = 1;
            while ($donnees = $desc->fetch()) {
                if ($i < $roomNbr)
                    echo '<a href="#' . $donnees['nom_chambre'] . '" > ' . $donnees['nom_chambre'] . "  |  " . '</a>';
                else
                    echo '<a href="#' . $donnees['nom_chambre'] . '" > ' . $donnees['nom_chambre'] . '</a>';
                $i++;
            }
            $desc->closeCursor(); // Termine le traitement de la requête
            ?>
        </div>


<?php
// On cree une variable pour numeroter les slides
$a = 0;


// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch()) {
    ?>

            <br>

            <div id="grande_div">
                <br>
                <br>
                <div class="titre" id="<?php echo $donnees['nom_chambre']; ?>">

    <?php
    echo '<h1>' . $donnees['nom_chambre'] . '</h1>';
    ?>


                </div>
                <br>
                <br>
                <div class="bloc1">

    <?php
    //bouton pour ajouter a la wishlist
    $nom_chambre = $donnees['nom_chambre'];
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $infos = $bdd->query("SELECT * FROM favorisc where nom_chambre = '$nom_chambre' and num_client=$id");
        $donnees_fav = $infos->fetch();

        if ($donnees_fav == FALSE) {
            ?><a href="ajouterWishlist.php?action=ajouterFav&nom_mh=<?php echo $nom_mh; ?>&nom_chambre=<?php echo $nom_chambre ?>"><span class="glyphicon glyphicon-star-empty glyphicon-5x" style="font-size: 50px; color: yellow"></span>Add to wishlist</a>
                        <?php
                        } else if ($donnees_fav['favoris'] == 1) {
                            ?><a href="ajouterWishlist.php?action=enleverFav&nom_mh=<?php echo $nom_mh; ?>&nom_chambre=<?php echo $nom_chambre ?>"><span class="glyphicon glyphicon-star glyphicon-5x" style="font-size: 50px ;color: yellow"> </span>Add to wishlist</a>
                            <?php
                        } else {
                            ?><a href="ajouterWishlist.php?action=remettreFav&nom_mh=<?php echo $nom_mh; ?>&nom_chambre=<?php echo $nom_chambre ?>"><span class="glyphicon glyphicon-star-empty glyphicon-5x" style="font-size: 50px; color: yellow"></span>Add to wishlist</a>
                            <?php
                        }
                    } else {
                        ?><a href="#"><span class="glyphicon glyphicon-star-empty glyphicon-5x" style="font-size: 50px; color: yellow"></span>Add to wishlist</a>
                        <?php
                    }


                    //Vigettes
                    ?>
                    <div class="btn-group" role="group" aria-label="Basic example" style="left:7%">
                    <?php
                    $req_count_vignette = $bdd->query("SELECT count(*) FROM chambre_vignette where nom_chambre = '$nom_chambre'");
                    $donnees_count_vignette = $req_count_vignette->fetch();
                    $req_vignette = $bdd->query("SELECT nom_vignette FROM chambre_vignette join vignette on vignette.id_vignette=chambre_vignette.id_vignette where nom_chambre = '$nom_chambre'");
                    $donnees_vignette = $req_vignette->fetchAll();
                    $i = 0;

                    foreach ($donnees_vignette as $uneVignette) {
                        $nom_vignette = $uneVignette['nom_vignette'];

                        if ($nom_vignette == "With friends") {
                            ?>
                                <button type="button" class="btn btn-secondary" style="background-color:orange; color: whitesmoke; border: whitesmoke "><?php echo $nom_vignette; ?></button>
                            <?php
                            } else if ($nom_vignette == "Family") {
                                ?>
                                <button type="button" class="btn btn-secondary" style="background-color:#2b508c; color: whitesmoke; border: whitesmoke"><?php echo $nom_vignette; ?></button>
                                <?php
                                } else if ($nom_vignette == "Business Travel") {
                                ?>
                                <button type="button" class="btn btn-secondary" style="background-color:#34C924; color:whitesmoke;border: whitesmoke"><?php echo $nom_vignette; ?></button>
                                <?php
                                } else if ($nom_vignette == "For two") {
                                ?>
                                <button type="button" class="btn btn-secondary" style="background-color:#FD3F92; color: whitesmoke;border: whitesmoke"><?php echo $nom_vignette; ?></button>
                                <?php
                                } else {}
                                }
                                
                                ?>



                            </div>


                            <div class="div_75 toSize">
                                <div class="w3-content" style="width:95%; margin-left:15%;"> 

            <?php
            $texte = "img/guesthouses/" . $nom_mh . "/" . $donnees['nom_chambre'];
            $rp = suppr_accents($texte); // nom du répertoire à lister
            $rep = opendir($rp);
            while ($nom_img = readdir($rep)) { // parcours du répertoire
                if (($nom_img == ".") || ($nom_img == "..")) {
                    echo "";
                } else {
                    echo '<img class="mySlides' . $a . '" src="' . $rp . '/' . $nom_img . '" style="width:80%; height:auto">';
                }
            }
            closedir($rep);
            ?>



                                    <div class="w3-row-padding w3-section">
                                    <?php
                                    $texte = "img/guesthouses/" . $nom_mh . "/" . $donnees['nom_chambre'];
                                    $rp = suppr_accents($texte); // nom du répertoire à lister
                                    $rep = opendir($rp);
                                    $nbr = 1;
                                    while ($nom_img = readdir($rep)) { // parcours du répertoire
                                        if (($nom_img == ".") || ($nom_img == "..")) {
                                            echo "";
                                        } else {
                                            echo '<div class="w3-col s1">';
                                            echo '<img class="demo w3-opacity w3-hover-opacity-off" src="' . $rp . '/' . $nom_img . '" style="width:100%; height:27px"';
                                            echo 'onclick="currentDiv(' . $nbr . ', ';
                                            echo "'mySlides" . $a . "')";
                                            echo '">';
                                            echo '</div>';
                                            $nbr = $nbr + 1;
                                        }
                                    }
                                    closedir($rep);
                                    ?>

                                    </div>       

                                </div>
                            </div>



                            <div class="div_100">

            <?php
            echo '<p>' . $donnees['description_chambre'] . '</p>';
            ?>

                            </div>
                        </div>

                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                        <div class="bloc2">

                            <div class="div_101">

                                <p><span style="text-decoration:underline;">Services</span>&nbsp;:

            <?php
            if ($donnees['wifi'] == true)
                echo '<img class="icone" src="img/icons/wifi_grey.png" alt="wifi" title="Wifi">';
            if ($donnees['coffre_fort'] == true)
                echo '<img class="icone" src="img/icons/safe_grey.png" alt="safe" title="Safe">';
            if ($donnees['douche'] == true)
                echo '<img class="icone" src="img/icons/shower_grey.png" alt="shower" title="Shower">';
            if ($donnees['baignoire'] == true)
                echo '<img class="icone" src="img/icons/bathtub_grey.png" alt="bathtub" title="Bathtub">';
            if ($donnees['tel'] == true)
                echo '<img class="icone" src="img/icons/phone_grey.png" alt="phone" title="Phone">';
            if ($donnees['tv'] == true)
                echo '<img class="icone" src="img/icons/tv_grey.png" alt="tv" title="TV">';
            if ($donnees['serviettes'] == true)
                echo '<img class="icone" src="img/icons/towels_grey.png" alt="towels" title="Towels">';
            if ($donnees['bureau'] == true)
                echo '<img class="icone" src="img/icons/desk_grey.png" alt="desk" title="Desk">';
            if ($donnees['cuisine'] == true)
                echo '<img class="icone" src="img/icons/kitchen_grey.png" alt="kitchen" title="Kitchen">';
            if ($donnees['mini_bar'] == true)
                echo '<img class="icone" src="img/icons/mini_bar_grey.png" alt="mini_bar" title="Mini-Bar">';
            if ($donnees['ventilateurs'] == true)
                echo '<img class="icone" src="img/icons/fan_grey.png" alt="fan" title="Fan / Air Conditioning">';
            if ($donnees['seche_cheveux'] == true)
                echo '<img class="icone" src="img/icons/hair_dryer_grey.png" alt="hair_dryer" title="Hair Dryer">';
            ?>

                                </p>
                                    <?php if (preg_match("/ihm_fr/", $_SERVER['REQUEST_URI'])): ?>
                                    <p>Arrival time is at <?php echo $donnees['heure_arr']; ?> et l'heure de départ est à <?php echo $donnees['heure_dep']; ?>.<br /></p>
                                    <?php else: ?>
                                    <p>Arrival time is at <?php echo date("g:i a", strtotime($donnees['heure_arr'])) ?> and the departure time is at: <?php echo date("g:i a", strtotime($donnees['heure_dep'])) ?>.<br /></p>
            <?php endif; ?>

                            </div>

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

                                                    <input class="form-control" type="text"  class="calendrier" id="date" name="date"  required>

                                                    <script> $('input[name="date"]').daterangepicker(
                                                                {

                                                                    locale: {

                                                                        format: 'YYYY-MM-DD'

                                                                    },

                                                                    startDate: '2018-02-19',
                                                                    minDate: moment().startOf("day"),
                                                                    endDate: '2019-06-30'

                                                                },
                                                                function (start, end, label) {

                                                                    alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));

                                                                });</script>


                                                    <? if (isset($_GET['start'])){

                                                    $date_debut=$_GET['start'];
                                                    }              
                                                    else                   {
                                                    $date_debut='';
                                                    }

                                                    if isset($_GET['end']){

                                                    $date_fin=$_GET['end'];
                                                    }              
                                                    else                   {
                                                    $date_fin='';
                                                    }             
                                                    ?>              
                                                    <input type="hidden" name="cookie_name" value="gh">
                                                    <input type="hidden" name="type" value="gh">
                                                    <input type="hidden" name="cookie_val" value="<?php echo $donnees['nom_chambre']; ?>">
                                                    <!-- <label class="label" for="date_debut">
                                                         Arrival date :<br />
                                                         <input type="text"  class="calendrier" id="date_debut<?php // echo $a;  ?>" name="date_debut" required>
                                                       
                                                     </label>
                                                     <br /><br />
                                                     <label class="label" for="date_fin">
                                                         Departure date :<br />
                                                         <input type="text"  class="calendrier" id="date_fin<?php // echo $a;  ?>" name="date_fin" required/>
                                                     </label>-->
                                                    <?if (isset($_GET['date_debut'])){
                                                    $date_debut=$_GET['date_debut'];
                                                    }
                                                    else{
                                                    $date_debut="";
                                                    }
                                                    if (isset($_GET['date_fin'])){
                                                    $date_fin=$_GET['date_fin'];
                                                    }
                                                    else{
                                                    $date_fin="";
                                                    }

                                                    if ($date_fin<$date_debut){
                                                    $date_fin=false;
                                                    echo "Vos date sont incorrect !";
                                                    }                      
                                                    ?>
                                                    <script src="js/jquery-1.9.1.min.js"></script>
                                                    <script src="js/bootstrap-datepicker.js"></script>
                                                    <script type="text/javascript">
                        // When the document is ready
                        /*  $(document).ready(function () {
                 
                         $('#date_debut<?php // echo $a;  ?>').datepicker({
                         format: "dd/mm/yyyy",
                         startDate: "today",
                         autoclose: true
                 
                 
                 
                         });
                 
                         $('#date_fin<?php // echo $a;  ?>').datepicker({
                         format: "dd/mm/yyyy",
                         startDate: "today",
                         autoclose: true,
                 
                 
                 
                         }); 
                         function compar(sdate1, sdate2)
                         {
                         var sdate_debut = document.getElementById('date_debut').value
                         var date_debut = new Date();
                         date_debut.setFullYear(sdate1.substr(6,4));
                         date_debut.setMonth(sdate1.substr(3,2));
                         date_debut.setDate(sdate1.substr(0,2));
                         var d1=date_debut.getTime()
                 
                         var sdate_fin = document.getElementById('date_fin').value
                         var date_fin = new Date();
                         date_fin.setFullYear(sdate2.substr(6,4));
                         date_fin.setMonth(sdate2.substr(3,2));
                         date_fin.setDate(sdate2.substr(0,2));
                         var d2=date_fin.getTime()
                 
                         //si la date d'arrviée et superieur a la date de depart en afficher un message d'erreur
                         if(d1>d2)
                         {  
                         alert('Vous avez selection un date incorrect!!')
                         }
                         else
                         {
                         alert('Correct')
                         }
                 
                         }
                         });*/
                                                    </script>
                                                    <br /><br />
                                                    <div>

                                                        <label>Number of persons: </label>
                                                        <div class="row">  
                                                            <div class="col-xs-3 col-sm-3 col-md-3"><select class="form-control" name="nb_places" style="color: black">
            <?php
            for ($p = 1; $p <= $donnees['nb_places']; $p++)
                echo "<option value=$p>$p</option>";
            ?>
                                                                </select><br>
                                                            </div>
                                                        </div>
                                                        <br><input type="checkbox" name="with_babies" id="with_babies" class="pull-right"/><span class="pull-right">Baby (- 3 years old)</span>
                                                    </div>
                                                    <br /><br />

            <?php
            echo '<p style="font-size:20px;" id="prix_' . $donnees['nom_chambre'] . '">Price: <strong>' . $donnees['prix_chambre'] . '€</strong></p>';
            ?>


                                                    <a><input type="submit" value="Book" class="submit_btn"/></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>


                                    <br /><br />
                                </div>
                            </div>
                        </div>

                    </div>

            <?php
            $a = $a + 1;
            echo '<br />';
        }
        $reponse->closeCursor(); // Termine le traitement de la requête
        ?>

                <link href="css/members.css" rel="stylesheet">

                <h3 style="color:#FF0000; text-align:center" > Discover the other guest houses in <?= htmlspecialchars($nom_ville) ?></h3>	
                <div class="tableau_select_region">	
        <?php
        $vq = $bdd->query('SELECT * FROM maison_hote WHERE ville = "' . $nom_ville . '" ');

        while ($donnees = $vq->fetch()) {
            if (file_exists('img/presentation_mh/' . $donnees['nom_mh'] . '_pres.jpg'))
                echo '
<div class="photo">
<a href="select_room.php?nom_mh=' . $donnees['nom_mh'] . '">
<img src="img/presentation_mh/' . $donnees['nom_mh'] . '_pres.jpg" />
<div class="overlay">
<p style="font-family:\'Open-sans\', serif;">' . $donnees['nom_mh'] . '</p>
</div>
</a>
</div>
';
        }
        ?>
                </div>

                    <?php
                    $adr = $bdd->query('SELECT * FROM maison_hote where nom_mh = "' . $nom_mh . '"');
                    while ($donnees = $adr->fetch()) {
                        echo '<div class="carte">';
                        echo $donnees['adresse_mh'];
                        echo '</div>';
                    }
                    $adr->closeCursor(); // Termine le traitement de la requête
                    ?>

                <?php include 'pop.php' ?>

                <?php include 'footer.php'; ?>
    </body>





    <script>
        var slideIndex = 1;
        showDivs(slideIndex, "mySlides0");
        showDivs(slideIndex, "mySlides1");
        showDivs(slideIndex, "mySlides2");
        showDivs(slideIndex, "mySlides3");
        showDivs(slideIndex, "mySlides4");
        showDivs(slideIndex, "mySlides5");
        showDivs(slideIndex, "mySlides6");
        showDivs(slideIndex, "mySlides7");
        showDivs(slideIndex, "mySlides8");
        showDivs(slideIndex, "mySlides9");
        showDivs(slideIndex, "mySlides10");
        showDivs(slideIndex, "mySlides11");
        showDivs(slideIndex, "mySlides12");
        showDivs(slideIndex, "mySlides13");
        showDivs(slideIndex, "mySlides14");
        showDivs(slideIndex, "mySlides15");
        showDivs(slideIndex, "mySlides16");
        showDivs(slideIndex, "mySlides17");
        showDivs(slideIndex, "mySlides18");
        showDivs(slideIndex, "mySlides19");
        showDivs(slideIndex, "mySlides20");
        showDivs(slideIndex, "mySlides31");
        showDivs(slideIndex, "mySlides32");
        showDivs(slideIndex, "mySlides33");
        showDivs(slideIndex, "mySlides34");
        showDivs(slideIndex, "mySlides35");
        showDivs(slideIndex, "mySlides36");
        showDivs(slideIndex, "mySlides37");
        showDivs(slideIndex, "mySlides38");
        showDivs(slideIndex, "mySlides39");
        showDivs(slideIndex, "mySlides40");

        function plusDivs(n, mySlides) {
            showDivs(slideIndex += n, mySlides);
        }

        function currentDiv(n, mySlides) {
            showDivs(slideIndex = n, mySlides);
        }

        function showDivs(n, mySlides) {
            var i;
            var y = mySlides;
            var x = document.getElementsByClassName(y);
            var dots = document.getElementsByClassName("demo");
            if (n > x.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = x.length
            }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
            }
            x[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " w3-opacity-off";
        }
    </script>

    <script type="text/javascript">
        //redimensionner('div.toSize');

        function redimensionner(selecteur) {
            var hauteur = 0;
            $(selecteur).each(function () {
                if ($(this).height() > hauteur)
                    hauteur = $(this).height();
            });

            $(selecteur).each(function () {
                $(this).height(hauteur);
            });
        }
    </script>


    <script language="javascript">
        function compar(d1, d2)
        {
            var sdate_debut = document.getElementById('date_debut').value
            var date_debut = new Date();
            date_debut.setFullYear(sdate1.substr(6, 4));
            date_debut.setMonth(sdate1.substr(3, 2));
            date_debut.setDate(sdate1.substr(0, 2));
            var d1 = date_debut.getTime()

            var sdate_fin = document.getElementById('date_fin').value
            var date_fin = new Date();
            date_fin.setFullYear(sdate2.substr(6, 4));
            date_fin.setMonth(sdate2.substr(3, 2));
            date_fin.setDate(sdate2.substr(0, 2));
            var d2 = date_fin.getTime()

    //si la date d'arrviée et superieur a la date de depart en afficher un message d'erreur
            if (d1 > d2)
            {
                alert('Vous avez selection un date incorrect!!')
            } else
            {
                alert('Correct')
            }

        }
    </script>
