<?php
require_once ("connexion.php");
?>

<div id = "contenu">


    <h2>Identifiez vous:</h2>
    <form action="accueilClient.php" method="post">
        <p>
            <label for = "mail_client">Adresse email*</label>
            <input id = "mail_cient" type = "mail_client" name = "mail_client" size = "30" maxlength = "45">
        </p>
        <p>
            <label for = "mdp">Mot de passe*</label>
            <input id = "mdp" type = "password" name = "mdp" size = "30" maxlength = "45">
            <br> <br>

        </p>
        <input type = "submit" value = "Valider" name = "valider">
        <input type = "reset" value = "Annuler" name = "annuler">
        <a href = "inscription.php"> s'inscrire </a>
        </p>
    </form>
</div>
