<?php
	function traiter_cookies_v($cookie_code) {
		$cookie_array= array();
		if (!empty($cookie_code)) @$cookie_code=explode('||', $cookie_code);
		if (!empty($cookie_code)) foreach ($cookie_code as $i=>$toinert) {
			if (!empty($toinert)) $cookie_array[]=json_decode($toinert);
		}
		return $cookie_array;
	}
?>
<link href="css/div_panier.css" rel="stylesheet">
<!--<link rel='stylesheet prefetch' href='https://cdn.rawgit.com/filamentgroup/fixed-sticky/master/fixedsticky.css'>-->
<script src='js/div_panier.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<?php 
    if (isset($_COOKIE['guesthouse']))
        $nb_guesthouse = count($_COOKIE['guesthouse']);
    else
        $nb_guesthouse = 0;
    if (isset($_COOKIE['demandes_visit']))
        $nb_activity = count(traiter_cookies_v($_COOKIE['demandes_visit']));
    else
        $nb_activity = 0;

   echo '<div class="panier" id="sticky" style=" position: fixed; bottom: 148px;"><a href="confirm.php" title="Check your reservation"><p><U><strong>Your Reservation :</strong></U> &nbsp;&nbsp;&nbsp; Guesthouses (' . $nb_guesthouse . ') | Activities (' . $nb_activity . ') | Guides (0)</p></a></div>';
?>