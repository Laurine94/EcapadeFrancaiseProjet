﻿<?php
include "../connexion.php";
require_once ("include/class.pdoef.inc.php");
require_once ("include/fct.inc.php");
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'demandeConnexion';
}

if (!empty($_REQUEST['mail'])) {
    $id = $_REQUEST['mail'];
    $_SESSION['mail'] = $id;
}
$action = $_REQUEST['action'];

switch ($action) {
    case 'demandeConnexion': {
            $code = "";
            if (!empty($_SESSION['mail'])) {
                $id = $_SESSION['mail'];
                $code = 1;
                $_SESSION['code'] = $code;
                header("Location:http://localhost/escapadefrancaise/ihm_en/EspaceClient/indexClient.php?uc=connexion&action=valideConnexion&code=$code");
            } else {
                include("vues/v_navbar.php");
                include("vues/v_connexionClient.php");
            }

            break;
        }

    case 'inscription': {
            include("vues/v_navbar.php");
            include("vues/v_inscription.php");
            break;
        }
    case 'valideInscription': {
            include("vues/v_navbar.php");
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


            /* $valid = true;
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
            $longueurkey = 15;
            $key = "";

            for ($i = 1; $i < $longueurkey; $i++) {
                $key = $key . mt_rand(0, 9);
            }
            $pdo->sauvegardeClient($nom, $prenom, $sexe, $mail, $tel, $adresse, $ville, $cp, $pays, sha1($mdp), $key);

            //envoie d'un mail de confirmation
            $header = "MIME-Version: 1.0\r\n";
            $header .= 'From:"EscapadeFrancaise.com"<support@escapadefrancaise.com>' . "\n";
            $header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
            $header .= 'Content-Transfer-Encoding: 8bit';

            $message = '
            <html>
                <body>
                    <div align="center">
                    <a href="http://localhost/escapadefrancaise/IHM_EN/EspaceClient/indexClient.php?mail=' . urlencode($mail) . '&key=' . $key . '&uc=connexion&action=confirmationMail">Confirm your account.</a> 
                        We thank you for your registration on our website Escapade Française.<br/>
                        Please confirm your registration by clicking on the link below.<br/>
                        <a href="localhost/escapadefrancaisev4/ihm_fr/EspaceClient/indexClient.php> Back to the site </a>"
                       <br/>---------------<br/>
                        This is an automatic mail, please do not reply.
                    </div>
                </body>
            </html>
            ';
            mail($mail, "Account Confirmation", $message, $header);

            include('vues/v_confirmationMail.php');

            break;
        }

    case 'confirmationMail': {
            include("vues/v_navbar.php");
            $mail = $_REQUEST['mail'];
            $key = $_REQUEST['key'];
            if (isset($mail, $key)AND ! empty($mail)AND ! empty($key)) {
                $mail = htmlspecialchars(urldecode($mail));
                $key = htmlspecialchars($key);
                $userexist = $pdo->clientExist($mail, $key);


                //verification de l'existance du client dans la bdd
                if ($userexist == 1) {
                    $user = $pdo->getClient($mail, $key);
                    //verification de la confirmation du compte
                    if ($user['confirm'] == 0) {
                        $updateuser = $pdo->majKey($mail, $key);


                        include('vues/v_connexionClient.php');
                        echo"<p>Your account has been confirmed!</p> ";
                    } else {
                        echo "Your account has already been confirmed!";
                    }
                } else {
                    echo"User does not exist.";
                }
            }
            break;
        }
    case 'valideEmailMdpOublie': {
            include("vues/v_navbar.php");
            if (isset($_GET['section'])) {
                $section = htmlspecialchars($_GET['section']);
            } else {
                $section = "";
            }
            if (isset($_POST['recup_submit'], $_POST['recup_mail'])) {

                if (!empty($_POST['recup_mail'])) {
                    $recup_mail = htmlspecialchars($_REQUEST['recup_mail']);
                    if (filter_var($recup_mail, FILTER_VALIDATE_EMAIL)) {
                        $verifMail = $pdo->getMailClient($recup_mail);
                        if (!empty($verifMail)) {
                            $client = $pdo->getMailClient($recup_mail);
                            $nomClient = $client['nom'];
                            $prenomClient = $client['prenom'];
                            var_dump($nomClient, $prenomClient);
                            $_SESSION['recup_mail'] = $recup_mail;
                            $recup_code = "";
                            for ($i = 0; $i <= 8; $i++) {
                                $recup_code .= mt_rand(0, 9);
                            }
                            $_SESSION['recup_code'] = $recup_code;

                            $mail_recup_exist = $pdo->recupMailExist($recup_mail);
                            if ($mail_recup_exist == 1) {
                                $pdo->recupUpdate($recup_mail, $recup_code);
                            } else {
                                $pdo->recupInsert($recup_mail, $recup_code);
                            }
                            $header = "MIME-Version: 1.0\r\n";
                            $header .= 'From:"EscapadeFrancaise.com"<support@escapadefrancaise.com>' . "\n";
                            $header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
                            $header .= 'Content-Transfer-Encoding: 8bit';

                            $message = '
                                <html>
                                <head>
                                    <title>Password recovery - Escapade Française</title>
                                </head>
                                    <body>
                                        <div align="center">
                                            Hello <b>' . $nomClient . ' ' . $prenomClient . '</b>,            </div><br/>
                                                 Here s your recovery code: <b>' . $recup_code . '</b><br/>

                                                See you soon on our website of Escapade Française!<br/>
                                                <br/><br/><br/><br/>


                                            This is an automatic mail, please do not reply.

                                    </body>
                                </html>
                                    ';
                            mail($recup_mail, "Password recovery", $message, $header);
                            header("Location:http://localhost/escapadefrancaise/ihm_en/EspaceClient/indexClient.php?uc=connexion&action=valideEmailMdpOublie&section=code");
                        }
                        //si le mail n'existe pas dans la BDD
                        else {
                            echo "<span style='color:red'>You are not registered on our site.</span>";
                        }
                    }
                }
                //si le client n'a rien saisi
                else {
                    echo "<span style='color:red'>You did not enter any mail.</span>";
                }
            }


            if (isset($_POST['verif_submit'], $_POST['verif_code'])) {
                if (!empty($_POST['verif_code'])) {
                    $verif_code = htmlspecialchars($_POST['verif_code']);
                    $verif_req = $pdo->recuperCode($_SESSION['recup_mail'], $verif_code);
                    
                    if ($verif_req == 1) {
                        $del_req = $pdo->deleteCode($_SESSION['recup_mail']);
                        header('Location:http://localhost/escapadefrancaise/ihm_en/EspaceClient/indexClient.php?uc=connexion&action=valideEmailMdpOublie&section=changemdp');
                    } else {
                        echo"<span style='color:red'>Invalid code</span>";
                    }
                } else {
                    echo "<span style='color:red'>Please enter your confirmation code...</span>";
                }
            }

            if (isset($_POST['change_submit'])) {
                if (isset($_POST['change_mdp'], $_POST['change_mdpc'])) {
                    $mdp = htmlspecialchars($_POST['change_mdp']);
                    $mdpc = htmlspecialchars($_POST['change_mdpc']);
                    if (!empty($mdp)and ! empty($mdpc)) {
                        if ($mdp == $mdpc) {
                            $mdp = sha1($mdp);
                            $ins_mdp = $pdo->insertNouveauMdp($mdp, $_SESSION['recup_mail']);
                            header("Location:http://localhost/escapadefrancaise/ihm_en/EspaceClient/indexClient.php");
                        } else {
                            echo"<span style='color:red'>Your passwords don't match.</span>";
                        }
                    } else {
                        echo"<span style='color:red'>Please fill in all fields.</span>";
                    }
                } else {
                    echo"<span style='color:red'>Please fill in all fields.</span>";
                }
            }


            include('vues/v_demandeDEmailMdpOublie.php');
            break;
        }
    /* case 'valideConnexion':{
      include ("controleur/c_espaceClient.php");
      header("Location:http://localhost/escapadefrancaisev4/ihm_fr/EspaceClient/indexClient.php?uc=espaceClient&action=valideConnexion&mail=".$_SESSION['mail']."");
      break;
      } */

    case 'valideConnexion': {
            include("vues/v_headClient.php");
            //si le client est dejà connecté
            $code = $_SESSION['code'];
            if ($code == 1) {
                $id = $_SESSION['mail'];
                $client = $pdo->getLeClient($id);
                $prenom = $client['prenom_client'];
                $nom = $client['nom_client'];
                include("vues/v_accueilClient.php");
            }
            //si le client n'est pas encore connecté
            else {

                $mail = $_POST['mail'];
                $mdp = $_POST['mdp'];

                $client = $pdo->getInfosClient($mail, sha1($mdp));
                if (!is_array($client)) {
                    ajouterErreur("Incorrect email address or password");
                    include("vues/v_erreurs.php");
                    ;
                    ;
                    include("vues/v_connexionClient.php");
                } else {
                    $num = $client['num'];
                    $nom = $client['nom'];
                    $prenom = $client['prenom'];
                    connecter($num, $nom, $prenom);
                    include("vues/v_accueilClient.php");
                }
            }
            break;
        }
    case 'accueil': {

            $id = $_SESSION['mail'];
            header("Location:http://localhost/escapadefrancaise/ihm_en?id=$id");
            break;
        }
    case 'voirWishlist': {
            $id = $_SESSION['mail'];
            $fav_chambres = $pdo->getChambreFavoris($id);
            $fav_activites = $pdo->getActiviteFavoris($id);
            $fav_guides=$pdo->geGuideFavoris($id);
            include("vues/v_headClient.php");
          
            if (!empty($fav_chambres)) {
                $Cles = array_keys($fav_chambres);
                $ChambresASelectionner = $Cles[0];
                include("vues/v_wishlist.php");
            }
            if (!empty($fav_activites)) {
                $Cles = array_keys($fav_activites);
                $activiteASelectionner = $Cles[0];
                include ("vues/v_wishlistActivite.php");
            }

            if (!empty($fav_guides)) {
                $Cles = array_keys($fav_guides);
                $guidesASelectionner = $Cles[0];
                include("vues/v_wishlistGuide.php");
            }
            
            break;
        }
    case 'voirFacture': {
            include("vues/v_headClient.php");

            $id = $_SESSION['mail'];


            $lesFactures = $pdo->getReservationDisponible($id);
            if(!empty($lesFactures)){
            $lesFactures2 = $pdo->getReservationDisponibleCarousel($id);
            $Cles = array_keys($lesFactures);
            $factureASelectionner = $Cles[0];
            $Cles2 = array_keys($lesFactures2);
            $factureASelectionner2 = $Cles2[0];
            include("vues/v_voirFactures.php");
            }
            else{
                include("vues/v_aucuneFacture.php");
            }
            
            break;
        }
    case 'genererpdf': {
            $id = $_SESSION['mail'];
            $numRes = $_REQUEST['numRes'];
            $lesVoyageurs = $pdo->getVoyageur($numRes);
            $reservationf = $pdo->getReservation($id, $numRes);
            $voyageurf = $pdo->getVoyageur($numRes);
            $donneeRes = $pdo->getReservationPdf($id, $numRes);

            include("vues/v_pdf.php");
            creerPdf($reservationf);
            break;
        }

    case 'menuReservationsAVenir': {
            include("vues/v_headClient.php");
            include('vues/v_menuReservationsAVenir.php');

            $id = $_SESSION['mail'];
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
            $id = $_SESSION['mail'];
            include("vues/v_headClient.php");
            include('vues/v_menuReservationsAVenir.php');
            $lesRes = $pdo->getActiviteReservationAVenir($id);
            if (empty($lesRes)) {
                echo"Il n'y a aucune réservation à venir.";
            } else {
                $Cles = array_keys($lesRes);
                $resASelectionner = $Cles[0];
                include('vues/v_ActiviteReservationsAVenir.php');
            }
            break;
        }

    case 'voirHebergementLesResAVenir': {
            $id = $_SESSION['mail'];
            include("vues/v_headClient.php");
            include('vues/v_menuReservationsAVenir.php');
            $lesRes = $pdo->getHebergementReservationAVenir($id);
            if (empty($lesRes)) {
                echo"Il n'y a aucune réservation à venir.";
            } else {
                $Cles = array_keys($lesRes);
                $resASelectionner = $Cles[0];
                include('vues/v_hebergementsReservationsAVenir.php');
            }
            break;
        }

    case 'menuReservationsPassees': {
            $id = $_SESSION['mail'];
            include("vues/v_headClient.php");
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
            $id = $_SESSION['mail'];
            include("vues/v_headClient.php");
            include('vues/v_menuReservationsPassees.php');
            $lesRes = $pdo->getHebergementReservationPassees($id);
            if (empty($lesRes)) {
                echo"Il n'y a aucune réservation d'hebergement Passées.";
            } else {
                $Cles = array_keys($lesRes);
                $resASelectionner = $Cles[0];
                include('vues/v_hebergementsReservationsPassees.php');
            }
            break;
        }

    case 'voirActivitesPassees': {
            $id = $_SESSION['mail'];
            include("vues/v_headClient.php");
            include('vues/v_menuReservationsPassees.php');
            $lesRes = $pdo->getActiviteReservationPassees($id);
            if (empty($lesRes)) {
                echo"Il n'y a aucune reservation d'activité passée.";
            } else {
                $Cles = array_keys($lesRes);
                $resASelectionner = $Cles[0];
                include('vues/v_ActiviteReservationsPassees.php');
            }
            break;
        }

    case 'accueilEspaceClient': {
            $id = $_SESSION['mail'];
            include("vues/v_headClient.php");
            include ('vues/v_accueilClient.php');
            break;
        }
    case'deconnexion': {

            deconnecter();
            include("vues/v_navbar.php");
            include("vues/v_connexionClient.php");
            break;
        }
    default : {
            include("vues/v_connexionClient.php");
            break;
        }
}
include("vues/v_footer.php");
?>
