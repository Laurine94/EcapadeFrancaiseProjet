<?php
   include 'connexion.php';

if (isset($_POST['nom_mh']))
{

       $nom_mh = $_POST['nom_mh'];
       $reponse = $bdd->query("SELECT adresse_mh FROM maison_hote WHERE nom_mh='$nom_mh'");
       $donnees = $reponse -> fetch();

       if (isset($donnees['adresse_mh']))
       {
           echo $donnees['adresse_mh'];
       }
       else
           echo '"error"';
   }
   ?>