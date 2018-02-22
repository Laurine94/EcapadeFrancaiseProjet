<?php
    setcookie( $_GET['cookie_val'] . "[" . $_GET['cookie_name'] . "][chambre]");
    setcookie( $_GET['cookie_val'] . "[" . $_GET['cookie_name'] . "][date_debut]");
    setcookie( $_GET['cookie_val'] . "[" . $_GET['cookie_name'] . "][date_fin]");
    setcookie( $_GET['cookie_val'] . "[" . $_GET['cookie_name'] . "][nb_places]");  
    setcookie( $_GET['cookie_val'] . "[" . $_GET['cookie_name'] . "][prix]");
    setcookie( $_GET['cookie_val'] . "[" . $_GET['cookie_name'] . "][nb_jours]");
    setcookie( $_GET['cookie_val'] . "[" . $_GET['cookie_name'] . "][with_babies]");

   
    header("Location: confirm.php");
?>