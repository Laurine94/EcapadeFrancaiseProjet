<?php
session_start();
?>
<?php
    $nb_gh = 1;
    $nb_act = 1;
    $nb_guide=1;
    $gh = true;
    $act = true;
    $guide=true;
  
if( isset($_GET['nom_mh'])){

    $nom_mh=$_GET['nom_mh'];
}
else{
    $nom_mh='';
}
?>

<?php
    $expire = 90*24*3600; //3mois
    
   /* if (isset($_GET['date_debut'])){
        $date_debut=$_GET['date_debut'];
    }
    else{
        $date_debut="";
    }
    if (isset($_GET['date_fin'])){
        $date_fin=$_GET['date_fin'];
    }
    else{
        $date_fin="";
    }
    if ($date_fin<$date_debut){
        /*Si la date de départ est inférieur à la date d'arriver alors 
        on revient sur la page précédente*/
       // header ("Location:select_room.php?nom_mh='$nom_mh'");
        //echo "Erreur !";*/
       
    
    if
         ($_GET['type'] == "gh"){
            while ($gh == true){
                if (isset($_COOKIE['guesthouse'][$nb_gh])){
                    $nb_gh = $nb_gh + 1;
                }
                else
                    $gh = false;
            }
            $date_debut=substr($_GET['date'],0,10);
            $date_fin=substr($_GET['date'],13,10);
            $datetime1 = new DateTime($date_debut);
            $datetime2 = new DateTime($date_fin);
            $interval = $datetime1->diff($datetime2);
            //le nombre de jours d'écarts
            $nb_nuits= $interval->format('%a');?>
            
<?php
            setcookie("guesthouse[" . $nb_gh . "][chambre]", $_GET['cookie_val'],  time()+$expire);
            setcookie("guesthouse[" . $nb_gh . "][date_debut]", $date_debut,  time()+$expire);
            setcookie("guesthouse[" . $nb_gh . "][date_fin]", $date_fin,  time()+$expire);
            if(!$_GET['with_babies']){
                setcookie("guesthouse[" . $nb_gh . "][with_babies]", "non",  time()+$expire);
             }
             else{
                setcookie("guesthouse[" . $nb_gh . "][with_babies]", "oui",  time()+$expire);
             }
            setcookie("guesthouse[" . $nb_gh . "][nb_places]", $_GET['nb_places'],  time()+$expire);
            setcookie("guesthouse[" . $nb_gh . "][nb_jours]", $nb_nuits,  time()+$expire);
        }
    
        else if ($_GET['type'] == "act"){
            while ($act == true){
                if (isset($_COOKIE['activity'][$nb_act])){
                    $nb_act = $nb_act + 1;
                }
                else
                    $act = false;
            }
           // $date_debut=substr($_GET['date'],0,10);
            setcookie("activity[" . $nb_act . "][nom_activite]", $_GET['cookie_val'],  time()+$expire);
            setcookie("activity[" . $nb_act . "][date]", $_GET['date'],  time()+$expire);
            setcookie("activity[" . $nb_act . "][with_babies]", $_GET['with_babies'],  time()+$expire);
            setcookie("activity[" . $nb_act . "][hours]", $_GET['hours'],  time()+$expire);
            setcookie("activity[" . $nb_act . "][nb_places]", $_GET['nb_places'],  time()+$expire);
            
        }
        else if ($_GET['type'] == "guide"){
            while ($guide == true){
                if (isset($_COOKIE['guides'][$nb_guide])){
                    $nb_guide = $nb_guide + 1;
                }
                else
                    $guide = false;
            }
           // $date_debut=substr($_GET['date'],0,10);
            setcookie("guides[" . $nb_guide . "][nom_activite]", $_GET['cookie_val'],  time()+$expire);
            setcookie("guides[" . $nb_guide . "][date]", $_GET['date'],  time()+$expire);
            setcookie("guides[" . $nb_guide . "][with_babies]", $_GET['with_babies'],  time()+$expire);
            setcookie("guides[" . $nb_guide . "][hours]", $_GET['hours'],  time()+$expire);
            setcookie("guides[" . $nb_guide . "][nb_places]", $_GET['nb_places'],  time()+$expire);
            setcookie("guides[" . $nb_guide . "][id]", $_GET['cookie_id'],  time()+$expire);
        }
    header("Location: confirm.php");
    
?>