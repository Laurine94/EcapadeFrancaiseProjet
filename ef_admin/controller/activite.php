<?php

/*
TODO: il faudrait renommer les emplacements de "slide<n>" vers qqchose de plus explicite
 */

function activiteRegister() {
    global $db, $lang, $invalid, $images;

    if (isset ($_GET["nom_activite"]) && $_GET["nom_activite"] != "") {
        $activite = getActivite ($_GET["nom_activite"]);
        $images = activiteListPictures ($activite["id_activite"]);        
    } else {
        $images = array ();
    }
    
    if (isPOST ()) {
        if (!$activite) {
            // si nouvelle activité, on set son id
            $_POST["id_activite"] = to_valid_filename ($_POST["nom_activite"]);
        }
        
        $invalid = validate (array ('nom' => 'varchar', 'nom_activite' => 'varchar_not_empty', 'ville' => 'varchar', 'localisation' => 'text', 'prix_activite' => 'int', 'duree' => 'int', 'type_activite' => 'varchar', 'description_activite' => 'text', 'jours_dispo' => 'varchar', 'id_activite' => 'varchar'), $_POST, array ());
    
        if ($invalid) {
            return "activiteRegister";
        }

        if (isset ($_POST["type_activite"])) {
            $_POST["type_activite"] = to_valid_filename ($_POST["type_activite"]);
        }

        if (isset ($_POST["type_activite"]) && $_POST["type_activite"] != "") {
            if (isset($_FILES["type_file"]) && $_FILES["type_file"]["name"] != "") {
                $filename = getBase () . "/ihm_$lang/img/activities/" . $_POST["type_activite"] . "_activites-min-2.jpg";

                if (!move_uploaded_file ($_FILES['type_file']['tmp_name'], $filename)) {
                    httpError (500);
                }
            }
            
            if (isset($_FILES["fond_file"]) && $_FILES["fond_file"]["name"] != "") {
                $filename = getBase () . "/ihm_$lang/img/activitestype/" . $_POST["type_activite"] . "_fond.jpg";

                if (!move_uploaded_file ($_FILES['fond_file']['tmp_name'], $filename)) {
                    httpError (500);
                }
            }
        } else {
            if (isset ($_POST["type_activite_select"]) && $_POST["type_activite_select"] != "_new_") {
                $_POST["type_activite"] = $_POST["type_activite_select"];
            }
        }

        if (isset ($_POST["nom_activite"]) && isset($_FILES["act_file"]) && $_FILES["act_file"]["name"] != "" && $_POST["nom_activite"] != "") {
            $filename = getBase () . "/ihm_$lang/img/tousactivites/" . $_POST["id_activite"] . "_act.jpg";
            if (!move_uploaded_file ($_FILES['act_file']['tmp_name'], $filename)) {
                httpError (500);
            }
        }
       
        prixSelectRegister ($_POST, "activite");
        
        if (isset ($_GET["nom_activite"]) && $_GET["nom_activite"] != "") {
            $sql = "UPDATE activites SET nom=:nom, nom_activite=:nom_activite, ville=:ville, localisation=:localisation, prix_activite=:prix_activite, duree=:duree, type_activite=:type_activite, description_activite=:description_activite, jours_dispo=:jours_dispo, id_activite=:id_activite WHERE nom_activite=:nom_activite";
        } else {
            $sql = "INSERT INTO activites ( nom, nom_activite,  ville,  localisation,  prix_activite,  duree,  type_activite,  description_activite,  jours_dispo,  id_activite) VALUES ( :nom, :nom_activite,  :ville,  :localisation,  :prix_activite,  :duree,  :type_activite,  :description_activite,  :jours_dispo,  :id_activite)";
        }

        $stmt = $db->prepare ($sql);
        if ($stmt) {
            try {
                
                if ($stmt->execute (array (':nom' => $_POST['nom'],':nom_activite' => $_POST['nom_activite'],':ville' => $_POST['ville'],':localisation' => $_POST['localisation'],':prix_activite' => $_POST['prix_activite'],':duree' => $_POST['duree'],':type_activite' => $_POST['type_activite'],':description_activite' => $_POST['description_activite'],':jours_dispo' => $_POST['jours_dispo'],':id_activite' => $_POST['id_activite']))) {
                    redirect ("?action=activiteList");
                } else {
                    dbError ();
                }
            } catch (PDOException $e) {
                if ($e->errorInfo[1] == 1062) {
                    addAlert ("danger", "Cette activité existe déjà");
                } else {
                    dbError ($e);
                }
            } 
        } else {
            dbError ();
        }
    }
    
    return "activiteRegister";
}

function activiteDelete () {
    global $db, $lang;
    
    $activite = getActivite ($_GET["nom_activite"]);
    if (!$activite) {
        httpError (404);
    }

    if (isPOST ()) {
        prixSelectDelete ("activite", $activite["nom_activite"]);
        
        indispoDelete ("activite", $activite["nom_activite"]);
        
        $images =  activiteListPictures ($activite["id_activite"]);
        foreach ($images as $image) {
            unlink ($image);
        }
        
        unlink (getBase () . "/ihm_$lang/img/tousactivites/" . $activite["id_activite"] . "_act.jpg");
        
        $stmt = $db->prepare ("DELETE FROM activites WHERE nom_activite = ?");

        if ($stmt->execute (array ($activite["nom_activite"])) !== FALSE) {           
            redirect ("?action=activiteList");
        } else {
            dbError ();
        }
    }

    return "home";
}

function activiteRegisterPictures() {
    global $db, $lang, $images;

    $activite = getActivite ($_GET["nom_activite"]);
    if (!$activite) {
        httpError (404);
    }
    
    $imagespath =  activiteListPictures ($activite["id_activite"]);
    $images = array ();
    
    foreach ($imagespath as $image) {
        $images[] = basename ($image);
    }
    
    $imgdir = getBase () . "/ihm_$lang/img";

    if (isPOST()) {
        if (isset ($_FILES) && isset ($_FILES['file']) && isset ($_FILES['file']['tmp_name'])) {
            $id = activiteLastPictureId ($activite["id_activite"], $images) + 1;

            if (!file_exists ("$imgdir/slide$id")) {
                mkdir ("$imgdir/slide$id");
            }
            
            $destfile = "$imgdir/slide$id/" . $activite["id_activite"] . "_slide$id.jpg";
            
            if (preg_match ("/\.(\w{2,4})$/", $_FILES['file']['name'], $matches)) {
                $extension = strtolower ($matches[1]);
            } else {
                $extension = "jpg";
            }

            if (!move_uploaded_file($_FILES['file']['tmp_name'], $destfile)) {
                httpError (500);
            }

            httpExit (0);
        }
    }

    return "activiteRegisterPictures";
}

function activiteRegisterIndispo () {
    global $db, $lang;

    $ch = getActivite ($_GET["nom_activite"]);
    if (!$ch) {
        httpError (404);
    }

    if (isPOST ()) {
        indispoRegister ($_POST, "activite");
        redirect ("?action=activiteRegister&nom_activite=" . urlencode ($_GET["nom_activite"]));
    }

    return "activiteRegisterIndispo";
}

function activiteListPictures ($activite) {
    global $lang;
    
    $imgdir = getBase () . "/ihm_$lang/img";

    $images = array ();
    for ($i = 1; $i < 16; $i++) {
        $file = "$imgdir/slide$i/" . $activite . "_slide$i.jpg";
        if (file_exists ($file)) {
            $images[] = $file;
        } else {
            break;
        }           
    }

    return $images;
}

function activiteLastPictureId ($activite, $images) {
    global $lang;
    
    $max = 0;

    $imgdir = getBase () . "/ihm_$lang/img";

    for ($i = 1; $i < 16; $i++) {
        $file = "$imgdir/slide$i/$activite" . "_slide$i.jpg";
        if (file_exists ($file)) {
            $max = $i;
        } else {
            break;
        }
    }

    return $max;
}

function activitePhotoPreview () {
    global $conf, $lang;

    $imgdir = getBase () . "/ihm_$lang/img";

    $activite = getActivite ($_GET["nom_activite"]);
    if (!$activite) {
        httpError (404);
    }
        
    if (isset ($_GET["filename"]) && isset ($_GET["box"])) {
        if ($_GET["filename"] != "" && $_GET["box"] != "") {
            if (preg_match ("/_slide(\d+)/", $_GET["filename"], $matches)) {
                $filename = "$imgdir/slide" . $matches[1] . "/". $_GET["filename"];
                buildThumbnail (dirname($filename), basename ($filename), $_GET["box"]);
            }
        } else {
            httpError (500);
        }
    } else {
        httpError (500);
    }

    httpExit (0);
}
