<?php
require '_header.php';
$json = array('error' => true);
if(isset($_GET['id'])){
	$coffret = $DB->query('SELECT id FROM coffret WHERE id=:id', array('id' => $_GET['id']));
	if(empty($coffret)){
		$json['message'] = "Ce coffret n'existe pas";
	}
	$panier->add($coffret[0]->id);
	$json['error'] = false;
	$json['total'] = number_format($panier->total(),2,',',' ');
	$json['count'] = $panier->count();
	$json['message'] = 'Ce produit a été ajouté à votre panier';
}else{
	$json['message'] = "Vous n'avez pas sélectionné de produit à ajouter à votre panier";
}
echo json_encode($json);

?>
