<?php

session_start();
include'EspaceClient/include/class.pdoef.inc.php';
include 'connexion.php';
$pdo = PdoEf::getPdoEf();
$id = $_SESSION['id'];
$ville = $_GET['ville'];
$type_activite = $_GET['type_activite'];
$nom_activite = $_GET['nom_activite'];
$action = $_REQUEST['action'];
switch ($action) {
    case 'ajouterFavActivite': {
            $pdo->insertActiviteFavoris($id, $nom_activite);
            header("Location:http://localhost/escapadefrancaise/ihm_en/select_activites_final.php?nom_activite=$nom_activite&ville=$ville&type_activite=$type_activite");
            break;
        }

    case 'enleverFavActivite': {
            $pdo->majEnleverActiviteFavoris($id, $nom_activite);
            header("Location:http://localhost/escapadefrancaise/ihm_en/select_activites_final.php?nom_activite=$nom_activite&ville=$ville&type_activite=$type_activite");
            break;
        }

    case 'remettreFavActivite': {
            $pdo->majRemettreActiviteFavoris($id, $nom_activite);
            header("Location:http://localhost/escapadefrancaise/ihm_en/select_activites_final.php?nom_activite=$nom_activite&ville=$ville&type_activite=$type_activite");
            break;
        }
}
?>