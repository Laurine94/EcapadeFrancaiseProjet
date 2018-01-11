<?php
include "../connexion.php";
require_once ("include/class.pdoef.inc.php");
require_once ("include/fct.inc.php");
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
include("vues/v_navbar.php");
switch ($action) {
    case 'demandeConnexion': {
            include("vues/v_connexionClient.php");
            break;
        }
    case 'valideConnexion': {
            $mail = $_POST['mail'];
            $mdp = $_POST['mdp'];
            //Cryptage de mot de passe
            //$mdp= md5($mdp);

            $client = $pdo->getInfosClient($mail, $mdp);
            if (!is_array($client)) {
                ajouterErreur("Adresse mail ou mot de passe incorrect");
                include("vues/v_erreurs.php");
                include("vues/v_connexionClient.php");
            } else {
                //echo"blde";
                $num = $client['num'];
                $nom = $client['nom'];
                $prenom = $client['prenom'];
                connecter($num, $nom, $prenom);
                include("vues/v_accueilClient.php");
            }

            break;
        }
    case 'inscription': {
            include("vues/v_inscription.php");
            break;
        }
    case 'valideInscription': {
        
            //on recupère les données rentrées dans le formulaire d'inscription
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $sexe = $_POST['sexe'];
            $mail = $_POST['mail'];
            $mailconfirm = $_POST['mailconfirm'];
            $tel = $_POST['tel'];
            $adresse = $_POST['adresse'];
            $ville = $_POST['ville'];
            $cp = $_POST['cp'];
            $pays = $_POST['pays'];
            $mdp = $_POST['mdp'];
            $mdpconfirm = $_POST['mdpconfirm'];
            
            
            var_dump($nom);
                /*$valid = true;
                $verifMail=$pdo->mailExiste($mail);
                //verification que le mail n'est pas encore utilisé
                if (!empty($mail) && $verifMail) {
                    $valid = false;
                    $erreurMailExiste = true;
                }
                
                //verification que les deux mots de passe rentrés sont identiques
                if (!empty($mdp) && !empty($mdpconfirm) && $mdp != $mdpconfirm) {
                    $valid = false;
                    $erreurmdpdiff = true;
                }
                
                //verification que les deux adresse mail rentrées sont identiques
                if (!empty($mail) && !empty($mailconfirm) && $mail != $mailconfirm) {
                    $valid = false;
                    $erreurmaildiff = true;
                }
               
                //si tout est bon, on envoie le mail de confirmation
                if ($valid) { */
                    $pdo->sauvegardeClient($nom, $prenom, $sexe, $mail, $tel, $adresse, $ville, $cp, $pays, $mdp);
                    
                    //envoie d'un mail de confirmation
                    
                    
                    //affichage de la vue qui previent le client qu'il faut confirmer par mail
                    include('vues/v_confirmationMail.php');
                //}
                
            
            break;
        }
    default : {
            include("vues/v_connexionClient.php");
            break;
        }
}
include("vues/v_footer.php");
?>