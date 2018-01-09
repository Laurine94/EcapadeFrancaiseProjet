<?php

include 'connexion.php';

$message = "<h3>You have been subscribed to the newsletter</h3>";

$requete = $bdd->prepare ("INSERT INTO newsletter (email) VALUES (?)");
if (isset ($_POST["email"])) {
    if (!$requete->execute (array ($_POST["email"]))) {
        $message = "<h3 style='color:red'>An error has occured</h3>";
    } 
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="js/onglets.js"></script>
        <link href="css/guesthouse.css" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Custom CSS -->
        <link href="css/select_region.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <title>Maisons d'hôtes</title>
        
        <?php include 'connexion.php';?>

    </head>
    <body>
        
        <?php include 'div_panier.php'; ?>
        
        <div id="global">
            <div id="entete">
                <?php include 'navbar.php'; ?>
            </div>
            <br>
              <br>
		<center>
		  <h3>
		    <?= $message ?>
		  </h3>
		</center>
            <br>
            <br>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>
