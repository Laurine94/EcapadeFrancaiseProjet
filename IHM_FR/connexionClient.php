<?php
require_once ("connexion.php");
?>

<div id = "contenu">


    <h2>Identifiez vous:</h2>
    <form action="accueilClient.php" method="post">
        <p>
            <label for = "email">Adresse email*</label>
            <input id = "email" type = "email" name = "email" size = "30" maxlength = "45">
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

<?php
// Hachage du mot de passe
$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

// Vérification des identifiants
$req = $bdd->prepare('SELECT num_client FROM client WHERE mail_client = :mail_client AND mdp = :mdp');
$req->execute(array(
    'mail_client' => $mail_client,
    'mdp' => $pass_hache));

$resultat = $req->fetch();

if (!$resultat) {
    echo 'Mauvais identifiant ou mot de passe !';
} else {
    session_start();
    $_SESSION['num_client'] = $resultat['num_client'];
    $_SESSION['mail_client'] = $mail_client;
    echo 'Vous êtes connecté !';
}
?>
