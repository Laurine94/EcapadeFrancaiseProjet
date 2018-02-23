<?php
session_start();
var_dump($_SESSION['id']);
?><html>

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
            if (!empty($_GET['id'])) $id = $_GET['id']; else $id = '';
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
            $req = $bdd->query("SELECT * FROM activites where nom_activite='$nom_activite' ");
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
                <div class="container_2">
                        <!--<div style="width: 60%; display:inline-block">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8" style="overflow: hidden; border-color: #183e67; border-style: solid;">
                                        <div id="datetimepicker12">-->
                                        
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
        minDate:moment().startOf("day"),
        showDropdowns: true

    }, 

);

</script>
Hour of departure:<select class="form-control" name="hours" style="color: black">
<?php 
for ($i=10;$i<=17;$i++){
    echo"<option value=$i>$i H</option>";
}
?>

</select>
                                <input type="hidden" name="cookie_name" value="guide">
                                <input type="hidden" name="type" value="guide">
                                <input type="hidden" name="cookie_val" value="<?php echo $infos['nom_activite']; ?>">
                                <input type="hidden" name="cookie_id" value="<?php echo $id ?>">
                                
                                <!--<script src="js/jquery-1.9.1.min.js"></script>
                                <script src="js/bootstrap-datepicker.js"></script>
                                <script type="text/javascript">
                                   
                                    
                                </script>-->
                                 <br />
				<div>
                                    Number of persons: <input class="form-control" type="number" value="0" name="nb_places" style="color: black">
				    
                                    <br /><br />
				    <input class="form-control" type="number" name="with_babies" value="0" id="with_babies" class="pull-right" style="color: black"/><span class="pull-right">Child between 6/11 years old</span>
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
                            </div>
                    </div>

                    <div class="cadreavis">
                        
                        <p style="color:#923e67">avis<p>

                    </div>
                </div>


                <div class="container">
                    <h3 style="color:red; text-align:center" > See the other activities proposed by <?= htmlspecialchars($_GET["nom"]) ?> </h3>
		  <div class="tableau_select_region">
		    <?php
		      
		      $req = $bdd->prepare("SELECT A.* FROM activites A INNER JOIN activity_guide_activities B ON B.activity=A.id_activite WHERE B.guide=:guide");
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
		      $req->closeCursor(); // Termine le traitement de la requête
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
                <?php include 'pop.php';?>
        <?php include 'footer.php'; ?>
        <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        </script>-->
        
    </body>

</html>