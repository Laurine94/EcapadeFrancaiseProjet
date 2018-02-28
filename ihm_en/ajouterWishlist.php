<?php

session_start();
include'EspaceClient/include/class.pdoef.inc.php';
include 'connexion.php';
$pdo = PdoEf::getPdoEf();
$nom_mh = $_GET['nom_mh'];
$id = $_SESSION['id'];
$nom_chambre = $_GET['nom_chambre'];
$action = $_REQUEST['action'];
switch ($action) {
    case 'ajouterFav': {
            $pdo->insertChambreFavoris($id, $nom_chambre);
            header("Location:http://localhost/escapadefrancaise/ihm_en/select_room.php?nom_mh=$nom_mh");
            break;
        }
    case 'enleverFav': {
            $pdo->majEnleverChambreFavoris($id, $nom_chambre);
            header("Location:http://localhost/escapadefrancaise/ihm_en/select_room.php?nom_mh=$nom_mh");
            break;
        }
    case 'remettreFav': {
            $pdo->majRemettreChambreFavoris($id, $nom_chambre);
            header("Location:http://localhost/escapadefrancaise/ihm_en/select_room.php?nom_mh=$nom_mh");
            break;
        }

   
}
?>