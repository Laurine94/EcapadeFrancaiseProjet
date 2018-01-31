<?php
include "../connexion.php";
require_once ("include/class.pdoef.inc.php");
require_once ("include/fct.inc.php");
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'accueil';
}
$action = $_REQUEST['action'];
$id = $_SESSION['mail'];
//include("vues/v_menu.html");
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
    case 'voirWishlist': {
            include("vues/v_wishlist.php");
            break;
    }
    case 'voirFacture': {
            $lesFactures = $pdo->getReservationDisponible($id);
            $lesFactures2 = $pdo->getReservationDisponibleCarousel($id);
            $Cles = array_keys($lesFactures);
            $factureASelectionner = $Cles[0];
            $Cles2 = array_keys($lesFactures2);
            $factureASelectionner2 = $Cles2[0];
            include("vues/v_voirFactures.php");
            break;
        }
    case 'genererpdf': {
            $numRes = $_REQUEST['numRes'];
            var_dump($numRes);
            $lesVoyageurs = $pdo->getVoyageur($numRes);
            $reservationf = $pdo->getReservation($id, $numRes);
            $voyageurf = $pdo->getVoyageur($numRes);
            $donneeRes = $pdo->getReservationPdf($id, $numRes);

            include("vues/v_pdf.php");
            creerPdf($reservationf);
            break;
        }

    case 'menuReservationsAVenir': {

            include('vues/v_menuReservationsAVenir.php');

            $lesRes = $pdo->getReservationAVenir($id);
            if (empty($lesRes)) {
                echo"Il n'y a aucune réservation à venir.";
            } else {
                $Cles = array_keys($lesRes);
                $resASelectionner = $Cles[0];
                include('vues/v_toutesReservationsAVenir.php');
            }
            break;
        }

    case 'voirActivitesLesResAVenir': {
            include('vues/v_menuReservationsAVenir.php');
            $lesRes = $pdo->getActiviteReservationAVenir($id);
             if (empty($lesRes)) {
                echo"Il n'y a aucune réservation à venir.";
            } else {
            $Cles = array_keys($lesRes);
            $resASelectionner = $Cles[0];
            include('vues/v_ActiviteReservationsAVenir.php');}
            break;
        }

    case 'voirHebergementLesResAVenir': {
            include('vues/v_menuReservationsAVenir.php');
            $lesRes = $pdo->getHebergementReservationAVenir($id);
             if (empty($lesRes)) {
                echo"Il n'y a aucune réservation à venir.";
            } else {
            $Cles = array_keys($lesRes);
            $resASelectionner = $Cles[0];
            include('vues/v_hebergementsReservationsAVenir.php');}
            break;
        }
        
    case 'menuReservationsPassees':{
        include('vues/v_menuReservationsPassees.php');

            $lesRes = $pdo->getReservationPassees($id);
            if (empty($lesRes)) {
                echo"Il n'y a aucune réservation passée.";
            } else {
                $Cles = array_keys($lesRes);
                $resASelectionner = $Cles[0];
                include('vues/v_toutesReservationsPassees.php');
            }
        break;
    }
    
    case 'voirHebergementLesResPassee': {
            include('vues/v_menuReservationsPassees.php');
            $lesRes = $pdo-> getHebergementReservationPassees($id);
             if (empty($lesRes)) {
                echo"Il n'y a aucune réservation d'hebergement Passées.";
            } else {
            $Cles = array_keys($lesRes);
            $resASelectionner = $Cles[0];
            include('vues/v_hebergementsReservationsPassees.php');}
            break;
        }
        
        case 'voirActivitesPassees': {
            include('vues/v_menuReservationsPassees.php');
            $lesRes = $pdo->getActiviteReservationPassees($id);
             if (empty($lesRes)) {
                echo"Il n'y a aucune reservation d'activité passée.";
            } else {
            $Cles = array_keys($lesRes);
            $resASelectionner = $Cles[0];
            include('vues/v_ActiviteReservationsPassees.php');}
            break;
        }

    default: {
            include("vues/v_accueilClient.php");

            break;
        }
}
include("vues/v_footer.php");
