<?php

session_start();
include'EspaceClient/include/class.pdoef.inc.php';
include 'connexion.php';
$pdo = PdoEf::getPdoEf();
$id = $_SESSION['id'];
$num_guide=$_GET['guide'];
$action = $_REQUEST['action'];
switch ($action) {
    case 'ajouterFavGuide': {
            $pdo->insertGuideFavoris($id, $num_guide);
            header("Location:http://localhost/escapadefrancaise/ihm_en/select_activities_guide_bis.php?guide=$num_guide");
            break;
        }

    case 'enleverFavGuide': {
            $pdo->majEnleverGuideFavoris($id, $num_guide);
            header("Location:http://localhost/escapadefrancaise/ihm_en/select_activities_guide_bis.php?guide=$num_guide");
            break;
        }

    case 'remettreFavGuide': {
            $pdo->majRemettreGuideFavoris($id, $num_guide);
            header("Location:http://localhost/escapadefrancaise/ihm_en/select_activities_guide_bis.php?guide=$num_guide");
            break;
        }
}
?>