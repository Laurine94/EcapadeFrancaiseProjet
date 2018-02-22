<?php
include "../connexion.php";
require_once ("include/class.pdoef.inc.php");
require_once ("include/fct.inc.php");
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];


switch ($action) {
    case 'demandeConnexion': {
            include("vues/v_navbar.php");
            include("vues/v_connexionClient.php");
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


            var_dump($nom);
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
            $pdo->sauvegardeClient($nom, $prenom, $sexe, $mail, $tel, $adresse, $ville, $cp, $pays, $mdp, $key);

            //envoie d'un mail de confirmation
            $header = "MIME-Version: 1.0\r\n";
            $header .= 'From:"EscapadeFrancaise.com"<support@escapadefrancaise.com>' . "\n";
            $header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
            $header .= 'Content-Transfer-Encoding: 8bit';

            $message = '
            <html>
                <body>
                    <div align="center">
                    <a href="http://localhost/escapadefrancaisev3/IHM_en/EspaceClient/indexClient.php?mail=' . urlencode($mail) . '&key=' . $key . '&uc=connexion&action=confirmationMail">Confirmez votre compte.</a> 
                       We thank you for your registration on our site Escapade Française.<br/>
                        Please confirm your registration by clicking the link below.<br/>
                        <a href="localhost/escapadefrancaisev3/ihm_fr/EspaceClient/indexClient.php> back to the site</a>"
                       <br/>---------------<br/>
                        This is an automatic e-mail, Thank you for not answering it.

                    </div>
                </body>
            </html>
            ';
            mail($mail, "Confirmation of the account", $message, $header);

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
                        echo"<p>Your account was well confirmed!</p> ";
                    } else {
                        echo "Your account was already confirmed!";
                    }
                } else {
                    echo"The user does not exist.";
                    var_dump($userexist);
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
                                    <title>Recovery of password- Escapade Française</title>
                                </head>
                                    <body>
                                        <div align="center">
                                            Dear <b>' . $nomClient . ' ' . $prenomClient . '</b>,            </div><br/>
                                                Here is your code of récupératon: <b>' . $recup_code . '</b><br/>

                                               See you soon on our site escapade francaise!<br/>
                                                <br/><br/><br/><br/>


                                            This is an automatic e-mail, Thank you for not answering it.

                                    </body>
                                </html>
                                    ';
                            mail($recup_mail, "Récupération de mot de passe", $message, $header);
                            header("Location:http://localhost/escapadefrancaisev3/ihm_en/EspaceClient/indexClient.php?uc=connexion&action=valideEmailMdpOublie&section=code");
                        }
                        //si le mail n'existe pas dans la BDD
                        else {
                            echo "<span style='color:red'>You are not registered on our site.</span>";
                        }
                    }
                }
                //si le client n'a rien saisi
                else {
                    echo "<span style='color:red'>You did not seize e-mail.</span>";
                }
            }


            if (isset($_POST['verif_submit'], $_POST['verif_code'])) {
                if (!empty($_POST['verif_code'])) {
                    $verif_code = htmlspecialchars($_POST['verif_code']);
                    $verif_req = $pdo->recuperCode($_SESSION['recup_mail'], $verif_code);
                    var_dump($verif_req);
                    if ($verif_req == 1) {
                        $del_req = $pdo->deleteCode($_SESSION['recup_mail']);
                        header('Location:http://localhost/escapadefrancaisev3/ihm_fr/EspaceClient/indexClient.php?uc=connexion&action=valideEmailMdpOublie&section=changemdp');
                    } else {
                        echo"<span style='color:red'>Invalid code</span>";
                    }
                } else {
                    echo "<span style='color:red'>Please enter your code of confirmation..</span>";
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
                            header("Location:http://localhost/escapadefrancaisev3/ihm_fr/EspaceClient/indexClient.php");
                        } else {
                            echo"<span style='color:red'>Your passwords do not correspond.</span>";
                        }
                    } else {
                        echo"<span style='color:red'>Please fill all the fields</span>";
                    }
                } else {
                    echo"<span style='color:red'>Please fill all the fields</span>";
                }
            }


            include('vues/v_demandeDEmailMdpOublie.php');
            break;
        }
    case 'valideConnexion': {
//            $id = $_SESSION['client_submit'];
//            var_dump($id);
            $mail=$_REQUEST['mail'];
            $mdp=$pdo->getMdpClient($mail);
            require_once ("controleur/c_espaceClient.php");
            if ($_POST['mdp'] == sha1($mdp)) {
                header("Location:http://localhost/escapadefrancaisev3/ihm_fr/EspaceClient/indexClient.php?uc=espaceClient&action=valideConnexion&mail=" . $_SESSION['mail'] . "");
            }
            break;
        }
    case'deconnexion': {
            include("vues/v_navbar.php");
            deconnecter();
            header("Location:http://localhost/escapadefrancaisev3/ihm_fr/");
            break;
        }
    default : {
            include("vues/v_navbar.php");
            include("vues/v_connexionClient.php");
            break;
        }
}
include("vues/v_footer.php");
?>
