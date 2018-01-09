<?php
    include 'connexion.php';

    $nom = $_POST['nom_client'];
    $prenom = $_POST['prenom_client'];
    $mail = $_POST['mail_client'];
    $tel = $_POST['telephone_client'];
    $sexe = $_POST['sexe_client'];
    $adresse = $_POST['adresse_client'];
    $ville = $_POST['ville_client'];
    $zip = $_POST['zip_client'];
    $pays = $_POST['pays_client'];


    // Insertion des informations à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO client(nom_client, prenom_client, mail_client, tel_client, sexe_client, adresse_client, ville_client, zip_client, pays_client) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $req->execute(array($nom, $prenom, $mail, $tel, $sexe, $adresse, ville, zip, pays));

    // Redirection du visiteur vers la page ...
    header('Location: index.php');
?>