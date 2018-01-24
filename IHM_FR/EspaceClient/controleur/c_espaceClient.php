<?php
include "../connexion.php";
require_once ("include/class.pdoef.inc.php");
require_once ("include/fct.inc.php");
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'accueil';
}
$action = $_REQUEST['action'];
$id = $_SESSION['mail'];
include("vues/v_headClient.php");
switch ($action) {
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
                $num = $client['num'];
                $nom = $client['nom'];
                $prenom = $client['prenom'];
                connecter($num, $nom, $prenom);
                include("vues/v_accueilClient.php");
            }

            break;
        }
    case 'accueil': {
            include("vues/v_accueilClient.php");
            break;
        }
    case 'voirFacture': {
        echo $id;
            $lesFactures = $pdo->getReservationDisponible($id);
            $Cles = array_keys($lesFactures);
            $factureASelectionner = $Cles[0];
            include("vues/v_voirFactures.php");
            break;
        }
    case 'genererpdf': {
            $numRes=$_REQUEST['numRes'];
            $lesVoyageurs=$pdo->getVoyageur($numRes);
            $reservationf = $pdo->getReservation($id, $numRes);
            $voyageurf=$pdo->getVoyageur($numRes);
           $donneeRes = $pdo->getReservationPdf($id, $numRes);
           
            include("vues/v_pdf.php");
            creerPdf($reservationf);
            break;
        }
     
    case 'menuReservationsAVenir':{
        
        include('vues/v_menuReservationsAVenir');
        include('vues/v_toutesReservationsAVenir');
        break;
    }
    
    case 'voirToutesLesResAVenir':{
        include('vues/v_toutesReservationsAVenir');
        break;
    }
    
    default: {
            include("vues/v_accueilVClient.php");

            break;
        }
        
}
include("vues/v_footer.php");