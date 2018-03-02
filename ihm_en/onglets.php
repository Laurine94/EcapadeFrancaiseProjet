<?php include 'connexion.php';?>
<!DOCTYPE html>
<html>
	<head>
             <meta charset="UTF-8"> 
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111755406-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111755406-1');
</script>
		<link type="text/css" rel="stylesheet" href="css/onglets.css"/>
        <style>.rederror input, .rederror textarea {border-color:#c00;}</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="js/onglets.js"></script>
        <title>A propos d'Escapade Française</title>
	</head>
	<body>
    	<?php include 'div_panier.php'; ?>
<!---------------------->
<div id="entete">
    <?php include 'navbar.php'; ?>
</div>
<br />
<div id="onglets">
	<ul id="onglets-menu">
		<li id="bas">Our concept</li>
		<li<?php echo (empty($_POST))?' class="menu-actif" ':'' ?> id="bas">Our members </li>
		<li id="bas">Our French Regions </li>
		<li<?php echo (!empty($_POST))?' class="menu-actif" ':'' ?> id="bas">Contact us </li>
	</ul>
    <br />
	<div id="onglets-contenu">
		<div><?php include ('onglet_propos.php'); ?></div>
		<div<?php echo (empty($_POST))?' class="contenu-actif" ':'' ?>><?php include ('members.php'); ?></div>
		<div><?php include ('regions_propos.php'); ?></div>
		<div<?php echo (!empty($_POST))?' class="contenu-actif" ':'' ?>><?php include ('contact_form.php'); ?></div>
	</div>
</div>
<!---->
        
    <?php include 'footer.php'; ?>
	</body>
</html>