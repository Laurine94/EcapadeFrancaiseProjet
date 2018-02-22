<?
include("connexion.php");

$mois=$_POST["mois"];
$annee=$_POST["annee"];

$txt="";
$req="SELECT * FROM calendrier WHERE mois='$mois' AND annee='$annee'";
$res=mysql_query($req);
while($obj=mysql_fetch_object($res)){
	$txt.="&textevent".$obj->jour."=".utf8_encode($obj->evenement);	
}

echo"?textevide=\"\"".$txt;

@mysql_free_result($res);
mysql_close();
?>

// Le code ActionScript pour la mise à jour :

<script>
onClipEvent(load) {
	var mlv:LoadVars = new LoadVars();
	mlv.mois=_root.mois;
	mlv.annee=_root.annee;
	mlv.sendAndLoad("req_agenda.php",mlv,"POST");
	
	mlv.onLoad = function () {
		for(var i=1; i<32; i++){
			_root["textevent"+i]=this["textevent"+i]
		}
		_root.gotoAndPlay(3);
	}
}
</script>
//PS : la fonction AffichageCalendrier() de l'image 2 vérifie les variables texteevent1, texteevent2, ... et positionne les boutons au besoin.


















































