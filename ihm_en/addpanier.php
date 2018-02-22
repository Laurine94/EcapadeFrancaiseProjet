
<?php
require '_header.php';
$json = array('error' => true);
if(isset($_GET['id'])){
	$coffret = $DB->query('SELECT id FROM coffret WHERE id=:id', array('id' => $_GET['id']));
	if(empty($coffret)){
		$json['message'] = "This box does not exist";
	}
	$panier->add($coffret[0]->id);
	$json['error'] = false;
	$json['total'] = number_format($panier->total(),2,',',' ');
	$json['count'] = $panier->count();
	$json['message'] = 'The product has been added to your cart';
}else{
	$json['message'] = "You have not selected a product to add to the cart";
}
echo json_encode($json);

?>
