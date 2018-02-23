<?php
session_start();
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
        <title>Maisons d'hôtes</title>
        
        <?php include 'connexion.php';
            var_dump($_SESSION['id']);?> 

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
                    <li class="guesthouse_active"><strong>1. Choose your city</strong></li>
                    <li>2. Choose your guest house </li>
                    <li>3. Book your room</li>
                    <li>4. Confirm</li>
                </ul>
            </div>
            <br>
       
            <br>
            
            <div class="slogan_gh">
                <h1>Where would you like to stay?</h1>
            </div>
            <br>
      
            <br>
            <div class="sous_titre">
                <h1> Select your destination </h1>
            </div>
            <br>
            <div id="contenu">
               <?php include 'select_region.php'; ?>
            </div>
            <br>
            <br>
            <!--
            <div class="sous_titre">
                <h1>... Or choose from the following list </h1>
            </div>
            <br>
            <div class="select_form_act">    
                <form method="get" action="select_guesthouse.php">
                    <select name="ville" id="ville">
                        <option selected="selected" value="default1" disabled>Choose a city / region</option>
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
                    <input type="submit" value="Rechercher"/>
                </form>
            </div>
        -->
        </div>
                <?php include 'pop.php';?>
        
        <?php include 'footer.php'; ?>
    </body>
</html>
