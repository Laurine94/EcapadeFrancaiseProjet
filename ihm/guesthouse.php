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
        <title>Maisons d'hotes</title>
        
        <?php include 'connexion.php';?>

    </head>
    <body>
        
        <?php include 'div_panier.php'; ?>
        
        <div id="global">
            <div id="entete">
                <?php include 'navbar.php'; ?>
            </div>
            <br>
            <div id="center">
                <ul class="menu_guesthouse">
                    <li class="guesthouse_active"><strong>1. Choisissez votre ville</strong></li>
                    <li>2. Choisissez vos activités </li>
                    <li>3. Réservez votre chambre</li>
                    <li>4. Confirmer</li>
                </ul>
            </div>
            
            <div class="slogan_gh">
                <h1>Où aimeriez-vous séjourner ?</h1>
            </div>
            
            <div class="sous_titre">
                <h1> Selectionnez votre destination :</h1>
            </div>
            <div id="contenu">
               <?php include 'select_region.php'; ?>
            </div>
            
            <div class="sous_titre">
                <h1>... ou choisissez dans la liste suivante :</h1>
            </div>

            <div class="select_form_act">    
                <form method="get" action="select_guesthouse.php">
                    <select name="ville" id="ville">
                        <option selected="selected" value="default1" disabled>choisissez une ville / region</option>
                        <?php
                            $reponse = $bdd->query('SELECT DISTINCT ville FROM maison_hote'); // On récupère les valeurs des villes dans la bdd
                            while ($donnees = $reponse->fetch())
                            {
                        ?>
                        <option value="<?php echo $donnees['ville']; ?>" ><?php echo $donnees['ville']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                    <input type="submit" value="Search"/>
                </form>
            </div>
        </div>
        
        <?php include 'footer.php'; ?>
    </body>
</html>
