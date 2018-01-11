﻿<?php
include "../connexion.php";
require_once ("include/class.pdoef.inc.php");
require_once ("include/fct.inc.php");
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];

switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexionClient.php");
		break;
	}
	case 'valideConnexion':{
		$mail = $_POST['mail'];
		$mdp = $_POST['mdp'];
                //var_dump($mail);
                // var_dump($mdp);
                //Cryptage de mot de passe
                //$mdp= md5($mdp);
      
		$client = $pdo->getInfosClient($mail,$mdp); 
               // var_dump($client);
		if(!is_array( $client)){
			ajouterErreur("Adresse mail ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexionClient.php");
		}
		else{
                    //echo"blde";
                        $num = $client['num'];
			$nom =  $client['nom'];
			$prenom = $client['prenom'];
			connecter($num,$nom,$prenom);
			include("vues/v_accueilClient.php");
                    }
		
		break;
	}
	default :{
		include("vues/v_connexionClient.php");
		break;
	}
        
}

?>