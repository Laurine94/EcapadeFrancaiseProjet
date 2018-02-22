<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111755406-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111755406-1');
</script>
        <meta charset="UTF-8">
        <link href="css/index.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Custom CSS -->
        <link href="css/select_activities.css" rel="stylesheet">
            <link href="css/select_region.css" rel="stylesheet">


        <?php
if (!empty($_GET['genre'])) $genre = $_GET['genre']; else header('Location: genrebis.php');
if (!empty($_GET['ville'])) $ville = $_GET['ville']; else $ville = '';
?>


</head>

<body>
    <?php include 'div_panier.php'; ?>

        <?php include 'connexion.php';?>
    
   
    <div id="entete">
        <?php include 'navbar.php'; ?>
    </div>
<?php if ($activities_work==1) { ?>
    <div class="slogan_act">
    	<br/><br/><br/><br/><br/><br/><br/>
        <h1>cette page sera bientot mise en ligne  </h1>
    	<br/><br/><br/><br/><br/><br/><br/>
    </div>
<?php } else { ?>
    <div id="center">
        <ul class="menu_guesthouse">
            <li class="guesthouse_active"><strong>1. Choose your city</strong></li>
            <li>2. Choose your activity</li>
            <li>3. Book your activity</li>
            <li>4. Confirm</li>
        </ul>
    </div>
    <br>

    <br>

    <div class="slogan_act">
        <h1 style="font-family:'Open-sans', sans-serif">Where do you want to go?</h1>
    </div>

    <br>
    <br>
    
    <div class="titre" style="padding-top: 40px">
        <h1 style="font-family:'Open-sans', sans-serif">Select a city / region </h1>
    </div>
    <br>

    <br>
    <!-- Page Content -->
    <div class="container">
        <div class="tableau_select_region">
    <?php
        $reponse = $bdd->query("SELECT * FROM ville WHERE genre='$genre'");
        while ($donnees = $reponse->fetch()) {
			if (file_exists('img/villes_activites/'.$donnees['ville'].'_acti.jpg')) echo '
                    <div class="bloc5">
                        <a href="select_activities_ville_bis.php?ville='.$donnees['id'].'">
							<img src="img/villes_activites/'.$donnees['ville'].'_acti.jpg" alt="'.$donnees['ville'].'"/>
                            <div class="overlay">
                                <p style="font-family:\'Open-sans\', serif;">'.$donnees['ville'].'</p>
                            </div></a>
                    </div>
			';
		}
    ?>
        </div>
    </div>
    <!-- /.container -->
    <br>
    <br>
    <br>
    
    
<?php } ?>
    
 <?php include 'footer.php'; ?>
    
    
</body>

</html>
