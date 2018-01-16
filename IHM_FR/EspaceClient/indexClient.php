<?php

require_once ("include/class.pdoef.inc.php");
require_once ("include/fct.inc.php");


session_start();
$pdo = PdoEf::getPdoEf();
$estConnecte = estConnecte();
if (!isset($_REQUEST['uc']) || !$estConnecte) {
    $_REQUEST['uc'] = 'connexion';
}
$uc = $_REQUEST['uc'];
switch ($uc) {
    case 'connexion': {
            include("controleur/c_connexionClient.php");
            break;
        }

    case 'espaceClient': {
            include("controleur/c_espaceClient.php");
            break;
        }
}
?>

