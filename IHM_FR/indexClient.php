<?php
require_once ("EspaceClient/include/class.pdoef.inc.php");
require_once ("EspaceClient/include/fct.inc.php");
include("navbar.php") ;
session_start();
$pdo = PdoEf::getPdoEf();
$estConnecte = estConnecte();
if(!isset($_REQUEST['uc']) || !$estConnecte){
     $_REQUEST['uc'] = 'connexion';
}	 
$uc = $_REQUEST['uc'];
switch($uc){
	case 'connexion':{
		include("EspaceClient/controleur/c_connexionClient.php");
                break;
	}
	
}
include("footer.php") ;
?>

