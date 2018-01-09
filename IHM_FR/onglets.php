<?php include 'connexion.php';?>
<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="css/onglets.css"/>
        <style>.rederror input, .rederror textarea {border-color:#c00;}</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="js/onglets.js"></script>
        <title>A propos d'Escapade Française</title>
	</head>
	<body>
    	<?php include 'div_panier.php'; ?>
<!--------------------->
<div id="entete">
    <?php include 'navbar.php'; ?>
</div>
<br />
<div id="onglets">
	<ul id="onglets-menu">
		<li id="bas">Notre concept</li>
		<li<?php echo (empty($_POST))?' class="menu-actif" ':'' ?> id="bas">Nos membres </li>
		<li id="bas">Régions de France</li>
		<li<?php echo (!empty($_POST))?' class="menu-actif" ':'' ?> id="bas">Contactez nous </li>
	</ul>
    <br />
	<div id="onglets-contenu">
		<div><?php include ('onglet_propos.php'); ?></div>
		<div<?php echo (empty($_POST))?' class="contenu-actif" ':'' ?>><?php include ('members.php'); ?></div>
		<div><?php include ('regions_propos.php'); ?></div>
		<div<?php echo (!empty($_POST))?' class="contenu-actif" ':'' ?>><?php include ('contact_form.php'); ?></div>
	</div>
</div>
<!--------------------->
        
    <?php include 'footer.php'; ?>
	</body>
</html>