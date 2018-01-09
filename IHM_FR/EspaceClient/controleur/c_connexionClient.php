<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("EspaceClient/vues/v_connexionClient.php");
		break;
	}
	case 'valideConnexion':{
		$mail = $_REQUEST['mail'];
		$mdp = $_REQUEST['mdp'];
                //Cryptage de mot de passe
                $mdp= md5($mdp);
      
		$visiteur = $pdo->getInfosClient($mail,$mdp);
                $comptable = $visiteur['comptable'];
		if(!is_array( $visiteur)){
			//ajouterErreur("Login, mot ou de passe incorrect");
			//include("vues/v_erreurs.php");
			include("vues/v_connexionClient.php");
		}
		else{
                        $id = $visiteur['id'];
			$nom =  $visiteur['nom'];
			$prenom = $visiteur['prenom'];
			connecter($id,$nom,$prenom);
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