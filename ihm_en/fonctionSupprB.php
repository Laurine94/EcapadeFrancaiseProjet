<?php
	//cookie_name
    setcookie( $_GET['cookie_val'] . "[" . $_GET['cookie_name'] . "][date]");
    setcookie( $_GET['cookie_val'] . "[" . $_GET['cookie_name'] . "][hours]");
    setcookie( $_GET['cookie_val'] . "[" . $_GET['cookie_name'] . "][nb_places]");
    setcookie( $_GET['cookie_val'] . "[" . $_GET['cookie_name'] . "][nom_activite]");
    setcookie( $_GET['cookie_val'] . "[" . $_GET['cookie_name'] . "][with_babies]");



    header("Location: confirm.php");
?>