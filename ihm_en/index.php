<?php
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>

<html>
    <head>
         <?php include 'connexion.php';?>
         <meta name="google-site-verification" content="ToDizTW9k4tXp_FWjnU7ji-KmO4nQPvsNr0Vzw9keMc" /> <!-- SAS pour mesurer le trafic-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">          
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Escapade Française is a large array of guest houses, activities and private guided all over France. Our activities are shoping, skydiving, trekking, sightseeing tour and more all around France ">
        <meta name="keyword" content="paris stay, stay in paris,where to stay in paris,where to stay in paris with family, where to stay in paris as a tourist, where to stay in france as a tourist, best area to stay in paris as a tourists,best area of paris to stay for tourist,best area in paris to stay as tourist, best area in france to stay as a tourist,best place to stay in paris for tourist,best tourist area to stay in paris, best tourist area to stay in france, paris best area to stay tourist, paris tour guide, france tour guide, french riviera tour guide, tour guide paris, tour guide france, paris guided tours,guided tours paris,tour in paris,guided tours in paris,guided tours in France, guided tours of Paris, city tour Paris,city tour of Paris,city tour in paris,guided tours to paris, guided paris tours, tour guides in Paris, paris city tour itinerary, hotel all inclusive,all inclusive vacances, hotel all exclusive,all in exclusive, paris stay, france stay, french riviera stay, stay in paris, stay in france, where to stay paris, where to stay france, where to stay in paris,where to stay in paris with family,where to stay in paris as a tourist,best place to stay in paris for tourist, best place to stay in france for tourist, paris best area to stay tourist, paris tour guide, tour guide France,book amazing guesthouses, book amazing activities, book amazing private guides,Strasbourg stay, where to Stay in Strasbourg, Bordeaux Stay, where to stay in Bordeaux as a tourist, normandy stay, French Brittany stay, best area to stay in French Riviera as a tourist, Corse Stay, French Polynesia stay, bora bora stay, Courchevel stay, Annecy Stay, Winter holidays in France, christmas market strasbourg, Paris, Strasbourg,Lyon,normandy,bretagne,Brittany,Corse,haute-savoie, Annecy, Courchevel, Mont Blanc, marseille, Martinique, Saint barthelemy, St-barth, French Polynesia, Polynesie francaise, bora bora, bordeaux,ile de la reunion, Reunion island, France, paris hotels, hotels in paris, hotels strasbourg, hotels bordeaux, guest houses paris, paris guest houses, france guest houses, guest houses in france, hotel in paris, guest house in paris, bed and breakfast, b&b, escapade francaise, escapade française,   ">

        <link rel="stylesheet" type="text/css" href="css/indexnew.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
       <!-- <link href="css/select_guesthouse.css" rel="stylesheet">-->
        
        <!--<link href="css/styles.css" rel="stylesheet">-->
        <!-- animsition.css -->
        <!--<link rel="stylesheet" href="css/animsition.min.css">-->
    
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.min.js"></script>
         <script src="http://malsup.github.com/jquery.cycle2.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- animsition.js -->
        <script src="js/animsition.min.js"></script>


        <title>ESCAPADE FRANCAISE</title>


        <!--<link rel="stylesheet" type="text/css" href="css/w3.css">-->
        <!--<link rel="stylesheet" type="text/css" href="css/select_room.css">-->
        <link rel="stylesheet" href="css/datepicker.css">
        <link href="css/guesthouse.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="css/calendar2.js"></script>
        <script>
            $( function() {
                $( "#date_debut" ).datepicker();
            } );
        </script>
        <script>
            $( function() {
                $( "#date_fin" ).datepicker();
            } );
        </script>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
 
        
    </head>

    <body class="animsition">
        <?php include 'div_panier.php'; ?>
        <div id="global">
            <div id="entete">
                <?php include 'navbar.php'; ?>
            </div>
        </div>
            <?php //include 'slideshow.php'; ?> 

            <div class="intro-header">
                <div class="video-bg">
                    <video autoplay muted loop style="width:100%;">
                        <source src="video/sea.mp4" type="video/mp4"></source>
                    </video>
                    <div class="repertoire">
                        <h3>Best guest houses, guides and activities of France.</h3>
                    </div>
                    <div class="rapide">

                        
                        <?php
                        // Connexion a la BDD
                        $bddname = 'ef_en';
                        $hostname = 'localhost';
                        $username = 'root';
                        $password = '';
                        $db = mysqli_connect ($hostname, $username, $password, $bddname);
                        ?>

                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                        <script type="text/javascript" src="js/jquery.chained.js"></script>

                        <script type="text/javascript">$(function(){
                            $("#ville").chained("#genre");
                            $("#guesthouse").chained("#ville");
                        });
                        </script>

                        <form method="get" action="select_room.php">

                        <select name="" id="genre">
                        <option value="">Select a place</option>
                        <?php
                        // Appel des genres
                        $req = "SELECT DISTINCT genre FROM ville ORDER BY genre";
                        $rep = mysqli_query($db, $req);
                        while ($row = mysqli_fetch_array($rep)) {
                            echo "<option value=".$row['genre'].">".$row['genre']."</option>";
                        }
                        ?>
                        </select>

                        <select name="" id="ville">
                        <option value="">Select a city</option>
                        <?php
                        // Appel des villes
                        $req = "SELECT genre, ville FROM ville ORDER BY ville";
                        $rep = mysqli_query($db, $req);
                        while ($row = mysqli_fetch_array($rep)) {
                            echo "<option value=".$row['ville']." class=".$row['genre'].">".$row['ville']."</option>";
                        }
                        ?>
                        </select>
                            
                        <!--<select name="guesthouse" id="guesthouse">
                        <option value="">Type of service</option>
                        <?php
                        // Appel des maisons dhote
                        /*$req = "SELECT ville, nom_mh FROM maison_hote ORDER BY nom_mh";
                        $rep = mysqli_query($db, $req);
                        while ($row = mysqli_fetch_array($rep)) {
                            echo "<option value=".$row['nom_mh']." class=".$row['ville'].">".$row['nom_mh']."</option>";
                        }*/
                        ?>
                        </select>-->

                        <select name="nom_mh" id="guesthouse">
                        <option value="">Select a guesthouse</option>
                        <?php
                        // Appel des maisons dhote
                        $req = "SELECT ville, nom_mh FROM maison_hote ORDER BY nom_mh";
                        $rep = mysqli_query($db, $req);
                        while ($row = mysqli_fetch_array($rep)) {
                            echo "<option value=".$row['nom_mh']." class=".$row['ville'].">".$row['nom_mh']."</option>";
                        }
                        ?>
                        </select>
                            
                        <input type="submit" value="Search"/>
                        
                        </form>
                        

                    </div>
                </div>
            </div>


        <!-- end header-->  

        <div class="container" style="width:90%">
            <p>Beyond reservations, we wish to offer you emotional feeling: discover the cultural richness of France by living as a local.</p>
            <p style="font-size:35px; font-family:Open Sans">Select, Book, Meet</p>
        </div>

                                                
<?php include "indexslides.php" ?>
<br>
x<br>
<div class="container">
    <div class="row">
        <div class="col-md-4" style="padding: 40px">
            
            <div class="border3" style="border:0px solid #245580; background-color: #245580; color: white; height: 200px;">
            <br>
            <br>
                <h3><br>THE COLLECTION<br></h3>
                <br>
                <figure>
                <a href="coffrets.php">
                    <img src="img/cadeaux/Mockup1.jpg" width="100%" height="250" style="margin-top: 28px;">
                </figure>
             </a>   
            </div>
        </div>

        <div class="col-md-4" style="padding: 40px">
           <div class="border3" style="border:0px solid red; background-color: red; color: white; height: 200px;" >
            <br>
                <h3>WE ARE ON INSTAGRAM,<br>FOLLOW US</h3>
                <br>
                <figure>
                 <a href="https://www.instagram.com/escapadefrancaise/" target="_blank">
                    <img src="img/new8.jpg" width="100%" height="250" style="margin-top: 20px;" >
                </figure>
                </a>
            </div>
        </div>
        <div class="col-md-4" style="padding: 40px"> 

           <div class="border3" style="border:0px solid #245580; background-color: #245580; color: white; height: 200px;">
            <br>
            <br>
                <h3><br>THIS SEPTEMBER<br></h3>
                <br>
                <figure>
                    <a href="blog.php">
                    <img src="img/mm.jpg" width="100%" height="250" style="margin-top: 28px;" >
                </figure>
                </a>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="case3" style="margin-top: 180px;">
            <div class="col-md-3">
            <img src="img/pop/1.png" class="img-responsive">
            <p>Locations all over France.</p>

        </div>
        <div class="col-md-3">
            <img src="img/pop/2.png" class="img-responsive">
            <p>Friendly welcome.</p>

        </div>
        <div class="col-md-3">
            <img src="img/pop/3.png" class="img-responsive">
            <p>Selected partners by us.</p>


        </div>
        <div class="col-md-3">
            <img src="img/pop/4.png" width="45px;" height="45px;" class="img-responsive">
            <p>Tested and certified by us.</p>

        </div>
        </div>
        
    </div>
</div>
 <?php include 'footer.php'; ?> 

</body>
</html>