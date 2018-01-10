<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
include("vues/v_navbar.php");
switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexionClient.php");
		break;
	}
	case 'valideConnexion':{
		$mail = $_REQUEST['mail'];
		$mdp = $_REQUEST['mdp'];
                //Cryptage de mot de passe
                $mdp= md5($mdp);
      
		$client = $pdo->getInfosClient($mail,$mdp);
                var_dump($client);
		if(!is_array( $client)){
			ajouterErreur("Adresse mail ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexionClient.php");
		}
		else{
                        $num = $client['num_client'];
			$nom =  $client['nom_client'];
			$prenom = $client['prenom_client'];
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
include("vues/v_footer.php");
?>