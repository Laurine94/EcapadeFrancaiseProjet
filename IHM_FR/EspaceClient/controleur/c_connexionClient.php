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
                $key =$key. mt_rand(0, 9);
             
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
                    <a href="http://localhost/escapadefrancaisev3/IHM_FR/EspaceClient/indexClient.php?mail=' . urlencode($mail) . '&key=' . $key . '&uc=connexion&action=confirmationMail">Confirmez votre compte.</a> 
                        Nous vous remercions pour votre inscription sur notre site Escapade Française.<br/>
                        Veuillez confirmer votre inscription en cliquant sur le lien ci-dessous.<br/>
                        <a href="localhost/escapadefrancaisev3/ihm_fr/EspaceClient/indexClient.php> retour vers le site </a>"
                       <br/>---------------<br/>
                        Ceci est un mail automatique, Merci de ne pas y répondre.
                    </div>
                </body>
            </html>
            ';
            mail($mail, "Confirmation du compte", $message, $header);

            include('vues/v_confirmationMail.php');

            break;
        }

    case 'confirmationMail': {
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
                        echo"<p>Votre compte a bien été confirmé!</p> ";
                    } else {
                        echo "Votre compte a déjà été confirmé!";
                    }
                } else {
                    echo"L'utilisateur n'existe pas.";
                    var_dump($userexist);
                }
            }
            break;
        }
        case 'valideEmailMdpOublie': {
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
                            } 
                            else {
                                $pdo->recupInsert($recup_mail, $recup_code);
                            }
                            $header = "MIME-Version: 1.0\r\n";
                            $header .= 'From:"EscapadeFrancaise.com"<support@escapadefrancaise.com>' . "\n";
                            $header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
                            $header .= 'Content-Transfer-Encoding: 8bit';

                            $message = '
                                <html>
                                <head>
                                    <title>Récupération de mot de passe- Escapade Française</title>
                                </head>
                                    <body>
                                        <div align="center">
                                            Bonjour <b>' . $nomClient . ' ' . $prenomClient . '</b>,            </div><br/>
                                                Voici  votre code de récupératon: <b>' . $recup_code . '</b><br/>

                                                A bientôt sur notre site d escapade francaise!<br/>
                                                <br/><br/><br/><br/>


                                            Ceci est un mail automatique, Merci de ne pas y répondre.

                                    </body>
                                </html>
                                    ';
                            mail($recup_mail, "Récupération de mot de passe", $message, $header);
                            header("Location:http://localhost/escapadefrancaisev3/ihm_fr/EspaceClient/indexClient.php?uc=connexion&action=valideEmailMdpOublie&section=code");
                        }
                        //si le mail n'existe pas dans la BDD
                        else {
                            echo "<span style='color:red'>Vous n'êtes pas inscrit sur notre site.</span>";
                        }
                        
                    }
                }
                //si le client n'a rien saisi
                else {
                    echo "<span style='color:red'>Vous n'avez pas saisi de mail.</span>";
                }
            }


            if (isset($_POST['verif_submit'], $_POST['verif_code'])) {
                if (!empty($_POST['verif_code'])) {
                    $verif_code= htmlspecialchars($_POST['verif_code']);
                    $verif_req=$pdo->recuperCode($_SESSION['recup_mail'], $verif_code);
                    var_dump($verif_req);
                    if($verif_req==1){
                        $del_req=$pdo->deleteCode($_SESSION['recup_mail']);
                        header('Location:http://localhost/escapadefrancaisev3/ihm_fr/EspaceClient/indexClient.php?uc=connexion&action=valideEmailMdpOublie&section=changemdp');
                    }
                    else{
                        echo"<span style='color:red'>Code invalide</span>";
                    }
                } else {
                    echo "<span style='color:red'>Veuillez entrer votre code de confirmation..</span>";
                }
            }
            
            if(isset($_POST['change_submit'])){
                if(isset($_POST['change_mdp'],$_POST['change_mdpc'])){
                    $mdp= htmlspecialchars($_POST['change_mdp']);
                    $mdpc= htmlspecialchars($_POST['change_mdpc']);
                    if(!empty($mdp)and !empty($mdpc)){
                        if($mdp==$mdpc){
                            $mdp=sha1($mdp);
                            $ins_mdp=$pdo->insertNouveauMdp($mdp,$_SESSION['recup_mail']);
                            header("Location:http://localhost/escapadefrancaisev3/ihm_fr/EspaceClient/indexClient.php");
                        }
                        else{
                             echo"<span style='color:red'>Vos mots de passe de correspondent pas.</span>";
                        }
                    }
                    else{
                        echo"<span style='color:red'>Veuillez remplir tous les champs</span>";
                    }
                }
                else{
                    echo"<span style='color:red'>Veuillez remplir tous les champs.</span>";
                }
            }


            include('vues/v_demandeDEmailMdpOublie.php');
            break;
        }
    case 'valideConnexion':{
        include ("controleur/c_espaceClient.php");
        header("Location:http://localhost/escapadefrancaisev3/ihm_fr/EspaceClient/indexClient.php?uc=espaceClient&action=valideConnexion&mail=".$_SESSION['mail']."");
        break;                
    }
    case'deconnexion': {
            deconnecter();
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
