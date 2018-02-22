<?php
include ("connexion.php");
$action = $_request['action'];
$nom_mh = $_GET['nom_mh'];
$nomChambre=$_request['nomChambre'];
$id=1;
$fav=mettrefavoris($id,$nomChambre);
switch ($action) {
    case 'mettreFavnonExist':{
        
        $verifexis=getFavorisc(id,$nomChambre);
        include("select_room.php");

     break;
    } 
    
    case'enleverfavoris':{$enlever=enleverfavoris($id,$nomChambre);
        include("select_room.php");
        break;
    }case 'remettreenfavoris':{
        $remettreenfavoris=mettrefavorisExist($id,$nomChambre);
        break;
        }
        default:{echo"error";
        
    }
}


function enleverfavoris($id,$nomChambre){
    $sql="update favorisc set favoris=0 where num_client = $id
    AND nom_chambre = '$nom_chambre' AND favoris=1";
    $bdd->exec($sql);

}





function getFavorisc($id,$nomChambre){
    $sql = "select favoris from favorisc where num_client= $id AND nom_chambre= '$nomChambre'";
    $resultat = $bdd -> query($sql);
    $laligne = $resultat->fetch();
    return $laligne;

}


function mettrefavoris($id,$nomChambre){
    $sql="insert into favorisc(num_client,nom_chambre,favoris) values($id,$nomChambre,1";
    $bdd->exec($sql);

}

function mettrefavorisExist($id,$nomChambre){
    $sql="update favorisc set favoris=1 where num_client = $id
    AND nom_chambre = '$nom_chambre' AND favoris=0";
    $bdd->exec($sql);

}