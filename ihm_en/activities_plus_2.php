<head>
    <link rel="stylesheet" type="text/css" href="css/activities_plus.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="plugins/Remodal-master/dist/remodal.css">
	<link rel="stylesheet" href="plugins/Remodal-master/dist/remodal-default-theme.css">
	<link rel="stylesheet" href="plugins/calendar/css/dncalendar-skin.min.css">
	<link rel="stylesheet" href="plugins/timepicker-master/jquery.timepicker.css">
	<style>.ui-timepicker-standard {z-index:9999999999999999!important;}</style>
	<meta charset="utf-8" />

    <title>Activités</title>

</head>

<body>

<?php
    $nom_activite = $_GET['nom_activite'];
?>

    <div id="entete">
        <?php include 'navbar.php'; ?>
    </div>
    
    <br />
    <br />
    
    <div class="petit_titre">
    <h1><?php echo $nom_activite; ?></h1>
    </div>
    
    <br />

    <?php include 'connexion.php';?>
    
    <?php
        $reponse = $bdd->query('SELECT * FROM activites where nom_activite="' . $nom_activite . '"');
        while ($donnees = $reponse->fetch()) {
			$prix_activite=$donnees['prix_activite'];
			$id_activite=$donnees['id_activite'];
			$ville_activite=$donnees['ville'];
			$duree_activite=$donnees['duree'];
			$jours_dispo=$donnees['jours_dispo'];
            echo '<div class="grande_div">';
            echo '<div class="img_act adapt">';
            echo '<img src="img/activities/' . $donnees['id_activite'] . '.jpg" alt="...">';
            echo '</div>';
            echo '<div class="desc_act adapt">';
            echo '<div class="sous_div">';
            echo '<p class="description">' . $donnees['description_activite'] . '</p>';
            echo '<br />';
            echo '<div class="infos">';
            echo '<p><U>Timespan</U> : ' . $donnees['duree'] . ' Hrs</p>';
            echo '<p><U>Price</U> : ' . $donnees['prix_activite'] . '€</p>';
            echo '<br />';
            echo '<p><U>Available days</U> : ' . $donnees['jours_dispo'] . '</p>';
            echo '</div>';
            echo '<br />';
            echo '</div>';
            echo '</div>';
            echo '<div class="calendrier">';
            echo '<br />';
            echo '<h3 style="margin: 0 auto;width: 90%; color: white;">Choose a date in the following calendar :</h3>';
            //include 'calendar_activities.php';
	?>
	<div id="dncalendar-container"></div>
	<?php
            echo '<br />';
            echo '</div>';
            echo '&nbsp;';
            echo '</div>';
        }
        $reponse->closeCursor(); // Termine le traitement de la requête
################################################################################################################################"
################################################################################################################################"
################################################################################################################################"

if (!empty($_COOKIE["demandes_visit"])) {
	$demandes_visit =  (array) $_COOKIE["demandes_visit"];
	var_dump($demandes_visit);
} else var_dump(array());

################################################################################################################################"
################################################################################################################################"
################################################################################################################################"
?>
    
<?php include 'footer.php'; ?>


<div class="remodal" id="remodal" data-remodal-id="modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h1>Heure de la visite</h1>
	<p class="lead text-center">
		Veuillez confirmez l'heure de votre visite: <br/>
         de <input id="timepicker-1" class="timepicker"/> pour une durée de <input id="timepicker-2" class="timepicker" disabled="disabled"/>h
    </p>
  <br>
  <button class="remodal-confirm" id="confirm-visit">CONFIRMER</button>
  <button data-remodal-action="cancel" class="remodal-cancel">ANNULER</button>
</div>

	<input type="hidden" id="date-reservation" value="" />
	<input type="hidden" id="time-reservation" value="" />
</body>

<script src="plugins/calendar/js/dncalendar.min.js"></script>
<script src="plugins/Remodal-master/dist/remodal.min.js"></script>
<script src="plugins/timepicker-master/jquery.timepicker.js"></script>
<script src="plugins/jquery.cookie.js"></script>
<script type="text/javascript">
    redimensionner('div.adapt');
    
    function redimensionner(selecteur){
        var hauteur=0;
        $(selecteur).each(function(){
            if($(this).height()>hauteur) hauteur = $(this).height();
        });
        
        $(selecteur).each(function(){ 
            $(this).height(hauteur);
        });
    }

<?php if (!empty($_GET['nom_activite']) && $_GET['nom_activite']=="Medieval") {?>
	$(document).ready(function() {
		JSON.stringify = JSON.stringify || function (obj) {
			var t = typeof (obj);
			if (t != "object" || obj === null) {
				if (t == "string") obj = '"'+obj+'"';
				return String(obj);
			}
			else {
				var n, v, json = [], arr = (obj && obj.constructor == Array);
				for (n in obj) {
					v = obj[n]; t = typeof(v);
					if (t == "string") v = '"'+v+'"';
					else if (t == "object" && v !== null) v = JSON.stringify(v);
					json.push((arr ? "" : '"' + n + '":') + String(v));
				}
				return (arr ? "[" : "{") + String(json) + (arr ? "]" : "}");
			}
		};
		var inst = $('[data-remodal-id=modal]').remodal();
		var my_calendar = $("#dncalendar-container").dnCalendar({
			dataTitles: { defaultDate: 'default', today : 'Today' },
			showNotes: true,
			monthNames: [ "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Decembre" ],
			monthNamesShort: [ 'Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jui', 'Jui', 'Aoû', 'Sep', 'Oct', 'Nov', 'Dec' ],
			dayNames: [ 'Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
			dayNamesShort: [ 'Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam' ],
			dayUseShortName: false,
			monthUseShortName: false,
			showNotes: false,
			startWeek: 'Dimanche',
			dayClick: function(date, view) {
				var days=['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];
				var dt=date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear(), 
					chz_day=date.getDay();
			//=> jours dispo
				chz_day=days[chz_day];
				chz_day=chz_day.toString();
				act = new Date();
				var jours_dispo='<?php echo $jours_dispo;?>';
				var day_dispo=jours_dispo.indexOf(chz_day);
			//=> pour empecher la prise de rendez-vous au passé et au jour meme
				if (date.getDate()>act.getDate() && date.getMonth()>=act.getMonth() && date.getFullYear()>=act.getFullYear() && day_dispo>=0) {
					$('#date-reservation').val(dt);
					inst.open();
				}
			}
		});
		my_calendar.build();
		$('#timepicker-1').timepicker({
<?php
	$fin=18-$duree_activite;
	if ($fin<13) $fin_t=$fin.':00am'; else $fin_t=($fin-12).':00pm';
?>
			timeFormat: 'HH:mm',interval: 60,stepMinute: 60,minTime: '9:00am',maxTime: '<?php echo $fin_t;?>',defaultTime: '9',
			startTime: '10:00',dynamic: false,dropdown: true,scrollbar: true
		});
		$('#timepicker-2').timepicker({
			timeFormat: 'HH:mm',interval: 60,stepMinute: 60,
			minTime: '0:00am',maxTime: '7:00pm',defaultTime: '<?php echo $duree_activite;?>',startTime: '<?php echo $duree_activite;?>',dynamic: false,dropdown: true,scrollbar: true
		});
		
		$('#confirm-visit').click(function() {
			var date=$('#date-reservation').val(), 
				hr_1=$('#timepicker-1').val(), 
				hr_2=$('#timepicker-2').val();
			$('#timepicker-1, #timepicker-2').css({border:'1px solid #A9A9A9'});
			if (isNaN(parseInt(hr_1)) || parseInt(hr_1)<8 || parseInt(hr_1)>18) $('#timepicker-1').css({border:'1px solid #F50'});
			else {
				inst.close();

				var visites = $.cookie('demandes_visit');
				if (typeof(visites)==='undefined') {
					visites={'id':'<?php echo $id_activite; ?>', 'city':'<?php echo $ville_activite; ?>', 'activity':'<?php echo $nom_activite; ?>', 'price':'<?php echo $prix_activite; ?>', 'date':date, 'time_1':hr_1, 'timespan':<?php echo $duree_activite;?>};
					visites=JSON.stringify(visites);
				} else {
					var request={'id':'<?php echo $id_activite; ?>', 'city':'<?php echo $ville_activite; ?>', 'activity':'<?php echo $nom_activite; ?>', 'price':'<?php echo $prix_activite; ?>', 'date':date, 'time_1':hr_1, 'timespan':<?php echo $duree_activite;?>};
					//=> verification de duplication
					var visites_r = visites.split("||"), new_visits='';
					for (var i = 0; i < visites_r.length; i++) {
						var mystr=visites_r[i];mystr=mystr.toString();
						var pos=mystr.indexOf('<?php echo $id_activite; ?>');
						if (pos<0) {if (new_visits.length==0) new_visits=mystr; else new_visits+='||'+mystr;}
					}
					visites=new_visits;
					request=JSON.stringify(request);
					visites+='||'+request;
				}
				$.cookie('demandes_visit', visites, { expires: 7, path: '/' });
				console.log(visites);
			}
		});
		inst.close();
		setTimeout(function() {inst.close();},500);
		//$.cookie('demandes_visit', '', { expires: 0, path: '/' });
	}); 
<?php } ?>
</script>