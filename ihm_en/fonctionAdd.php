<?php
    $nb_gh = 1;
    $nb_act = 1;
    $gh = true;
    $act = true;

    $expire = 90*24*3600; //3mois
    if ($_GET['type'] == "gh"){
        while ($gh == true){
            if (isset($_COOKIE['guesthouse'][$nb_gh])){
                $nb_gh = $nb_gh + 1;
            }
            else
                $gh = false;
        }
        setcookie("guesthouse[" . $nb_gh . "][chambre]", $_GET['cookie_val'],  time()+$expire);
        setcookie("guesthouse[" . $nb_gh . "][date_debut]", $_GET['date_debut'],  time()+$expire);
        setcookie("guesthouse[" . $nb_gh . "][date_fin]", $_GET['date_fin'],  time()+$expire);
    }

    else if ($_GET['type'] == "act"){
        while ($act == true){
            if (isset($_COOKIE['activity'][$nb_act])){
                $nb_act = $nb_act + 1;
            }
            else
                $act = false;
        }
        setcookie("activity[" . $nb_act . "]", $_GET['cookie_val'],  time()+$expire);
    }

    header("Location: confirm.php");
?>