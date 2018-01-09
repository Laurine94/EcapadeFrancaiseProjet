<?php

function mhRegister() {
    global $db, $invalid;

    if (isPOST ()) {
        if (!isset ($_POST["dist_aero"])) {
            $_POST["dist_aero"] = 0;
        }

        if (!isset ($_POST["note_mh"])) {
            $_POST["note_mh"] = "";
        }

        $invalid = validate (array ('nom' => 'varchar', 'prenom' => 'varchar', 'nom_mh' => 'varchar_not_empty', 'ville' => 'varchar', 'dist_aero' => 'int', 'description_mh' => 'text', 'adresse_mh' => 'text', 'note_mh' => 'text'), $_POST, array ());
        
        if ($invalid) {
            return "mhRegister";
        }
        
        if (isset ($_GET["nom_mh"]) && $_GET["nom_mh"] != "") {
            $sql = "UPDATE maison_hote SET nom=:nom, prenom=:prenom, nom_mh=:nom_mh, ville=:ville, dist_aero=:dist_aero, description_mh=:description_mh, adresse_mh=:adresse_mh, note_mh=:note_mh WHERE nom_mh=:nom_mh";
        } else {
            $sql = "INSERT INTO maison_hote ( nom,  prenom,  nom_mh,  ville,  dist_aero,  description_mh,  adresse_mh,  note_mh) VALUES ( :nom,  :prenom,  :nom_mh,  :ville,  :dist_aero,  :description_mh,  :adresse_mh,  :note_mh)";
        }

        $stmt = $db->prepare ($sql);

        if ($stmt) {
            try {
                
                if ($stmt->execute (array (':nom' => $_POST['nom'],':prenom' => $_POST['prenom'],':nom_mh' => $_POST['nom_mh'],':ville' => $_POST['ville'],':dist_aero' => $_POST['dist_aero'],':description_mh' => $_POST['description_mh'],':adresse_mh' => $_POST['adresse_mh'],':note_mh' => $_POST['note_mh'] ))) {
                    if (isset ($_GET["nom_mh"]) && $_GET["nom_mh"] != "") {
                        redirect ("?action=mhList");
                    } else {
                        redirect ("?action=mhRegisterPictures&nom_mh=" . urlencode ($_POST["nom_mh"]));
                    }
                } else {
                    dbError ();
                }
            } catch (PDOException $e) {
                if ($e->errorInfo[1] == 1062) {
                    addAlert ("danger", "Cette maison existe déjà");
                } else {
                    dbError ($e);
                }
            } 
        } else {
            dbError ();
        }
    }

    return "mhRegister";
}

function mhDelete () {
    global $db, $lang;
    
    $mh = getMh ($_GET["nom_mh"]);
    if (!$mh) {
        httpError (404);
    }

    if (isPOST ()) {
        $rooms = getMhRoomList ($mh["nom_mh"]);

        foreach ($rooms as $ch) {
            $_GET["nom_chambre"] = $ch["nom_chambre"];
            mhDeleteRoom (false);
        }

        $picture = getMhPicture ($mh["nom_mh"]);
        if ($picture) {
            $picture = mhImgPath ($lang, $mh["nom_mh"]) . "/" . $picture;
            if (file_exists ($picture)) {
                unlink ($picture);
            }
        }
        
        if ($picture) {
            $stmt = $db->prepare ("DELETE FROM img_mh WHERE nom_mh = ?");

            if ($stmt->execute (array ($mh["nom_mh"])) !== FALSE) {
                
            } else {
                dbError ();
            }
        }

        $dir = suppr_accents (getBase () . "/ihm_$lang/img/guesthouses/" . $mh["nom_mh"]);
        if (file_exists ($dir)) {
            rmdir ($dir);
        }
        
        if (alertCount () == 0) {
            $stmt = $db->prepare ("DELETE FROM maison_hote WHERE nom_mh = ?");

            if ($stmt->execute (array ($mh["nom_mh"])) !== FALSE) {           
                redirect ("?action=mhList");
            } else {
                dbError ();
            }
        }
    }

    return "home";
}

function mhRegisterRoom() {
    global $db, $invalid, $checkboxes;
    
    $checkboxes = array ("baignoire" ,"bureau" ,"coffre_fort" ,"cuisine" ,"douche" , "mini_bar" ,"seche_cheveux" ,"serviettes" ,"tel" ,"tv" ,"ventilateurs" ,"wifi");

    foreach ($checkboxes as $checkbox) {
        if (!isset ($_POST[$checkbox])) {
            $_POST[$checkbox] = 0;
        }
    }
    
    if (isPOST()) {
        foreach (array ("heure_dep_h", "heure_dep_m", "heure_arr_h", "heure_arr_m") as $field) {
            if ($_POST[$field] == "") {
                $_POST[$field] = 0;
            }
        }
        

        $_POST['heure_dep'] = $_POST['heure_dep_h'] . ":" . $_POST['heure_dep_m'] . ":00";
        $_POST['heure_arr'] = $_POST['heure_arr_h'] . ":" . $_POST['heure_arr_m'] . ":00";
        
        $invalid = validate (array ('nom_chambre' => 'varchar_not_empty', 'nb_places' => 'int', 'taille' => 'int', 'lits' => 'varchar', 'nom_mh' => 'varchar', 'prix_chambre' => 'int', 'heure_arr' => 'time', 'heure_dep' => 'time', 'description_chambre' => 'text', 'wifi' => 'tinyint', 'coffre_fort' => 'tinyint', 'douche' => 'tinyint', 'baignoire' => 'tinyint', 'tel' => 'tinyint', 'tv' => 'tinyint', 'serviettes' => 'tinyint', 'bureau' => 'tinyint', 'cuisine' => 'tinyint', 'mini_bar' => 'tinyint', 'ventilateurs' => 'tinyint', 'seche_cheveux' => 'tinyint'), $_POST, array ());

        if ($invalid) {
            return "mhRegisterRoom";
        }

        prixSelectRegister ($_POST, "chambre");
        
        if (isset ($_GET["nom_chambre"]) && $_GET["nom_chambre"] != "") {
            $sql = "UPDATE chambre SET nom_chambre=:nom_chambre, nb_places=:nb_places, taille=:taille, lits=:lits, nom_mh=:nom_mh, prix_chambre=:prix_chambre, heure_arr=:heure_arr, heure_dep=:heure_dep, description_chambre=:description_chambre, wifi=:wifi, coffre_fort=:coffre_fort, douche=:douche, baignoire=:baignoire, tel=:tel, tv=:tv, serviettes=:serviettes, bureau=:bureau, cuisine=:cuisine, mini_bar=:mini_bar, ventilateurs=:ventilateurs, seche_cheveux=:seche_cheveux WHERE nom_chambre=:nom_chambre";
        } else {
            $sql = "INSERT INTO chambre ( nom_chambre,  nb_places,  taille,  lits,  nom_mh,  prix_chambre,  heure_arr,  heure_dep,  description_chambre,  wifi,  coffre_fort,  douche,  baignoire,  tel,  tv,  serviettes,  bureau,  cuisine,  mini_bar,  ventilateurs,  seche_cheveux) VALUES ( :nom_chambre,  :nb_places,  :taille,  :lits,  :nom_mh,  :prix_chambre,  :heure_arr,  :heure_dep,  :description_chambre,  :wifi,  :coffre_fort,  :douche,  :baignoire,  :tel,  :tv,  :serviettes,  :bureau,  :cuisine,  :mini_bar,  :ventilateurs,  :seche_cheveux)";
        }

        $stmt = $db->prepare ($sql);

        if ($stmt) {
            try {
                
                if ($stmt->execute (array (':nom_chambre' => $_POST['nom_chambre'],':nb_places' => $_POST['nb_places'],':taille' => $_POST['taille'],':lits' => $_POST['lits'],':nom_mh' => $_POST['nom_mh'],':prix_chambre' => $_POST['prix_chambre'],':heure_arr' => $_POST['heure_arr'],':heure_dep' => $_POST['heure_dep'],':description_chambre' => $_POST['description_chambre'],':wifi' => $_POST['wifi'],':coffre_fort' => $_POST['coffre_fort'],':douche' => $_POST['douche'],':baignoire' => $_POST['baignoire'],':tel' => $_POST['tel'],':tv' => $_POST['tv'],':serviettes' => $_POST['serviettes'],':bureau' => $_POST['bureau'],':cuisine' => $_POST['cuisine'],':mini_bar' => $_POST['mini_bar'],':ventilateurs' => $_POST['ventilateurs'],':seche_cheveux' => $_POST['seche_cheveux']))) {
                    if (isset ($_GET["nom_chambre"]) && $_GET["nom_chambre"] != "") {
                        redirect ("?action=mhRegister&nom_mh=" . urlencode ($_POST["nom_mh"]));
                    } else {
                        redirect ("?action=mhRegisterRoomPictures&nom_mh=" . urlencode ($_POST["nom_mh"]) .
                        "&nom_chambre=" . urlencode ($_POST["nom_chambre"]));
                    }
                } else {
                    dbError ();
                }
            } catch (PDOException $e) {
                if ($e->errorInfo[1] == 1062) {
                    addAlert ("danger", "Cette chambre existe déjà");
                } else {
                    dbError ($e);
                }
            } 
        } else {
            dbError ();
        }
    }

    return "mhRegisterRoom";
}

function mhDeleteRoom ($redirect = true) {
    global $db, $lang;

    $room = $_GET["nom_chambre"];

    $ch = getMhRoom ($room);
    if (!$ch) {
        httpError (404);
    }

    if (isPOST ()) {
        prixSelectDelete ("chambre", $ch["nom_chambre"]);

        indispoDelete ("chambre", $ch["nom_chambre"]);
        
        $dest = mhRoomImgPath ($lang, $ch["nom_mh"], $ch["nom_chambre"]);                
        $images =  mhRoomListPictures ($dest);

        foreach ($images as $image) {
            $path = "$dest/$image";
            if (file_exists ($path)) {
                unlink ($path);
            }
        }

        if (file_exists ($dest)) {
            if (!rmdir ($dest)) {
                httpError (500);
            }
        }
        
        $stmt = $db->prepare ("DELETE FROM chambre WHERE nom_chambre = ?");

        if ($stmt->execute (array ($ch["nom_chambre"])) !== FALSE) {
            if ($redirect) {
                redirect ("?action=mhRegister&nom_mh=" . urlencode ($ch["nom_mh"]));
            }
        } else {
            dbError ();
        }
    }

    return "home";
}

function mhRegisterPictures() {
    global $db, $lang, $images;

    $mh = getMh ($_GET["nom_mh"]);
    if (!$mh) {
        httpError (404);
    }
    
    $dest = mhImgPath ($lang, $mh["nom_mh"]);

    if (!file_exists ($dest)) {
        if (!mkdir ($dest, 0777, true)) {
            httpError (500);
        }
    }

    $picture = getMhPicture ($mh["nom_mh"]);

    $images =  [ $picture ];

    if (isPOST()) {
        if (isset ($_FILES) && isset ($_FILES['file']) && isset ($_FILES['file']['tmp_name'])) {
            if (preg_match ("/\.(\w{2,4})$/", $_FILES['file']['name'], $matches)) {
                $extension = strtolower ($matches[1]);
            } else {
                $extension = "jpg";
            }

            $filename = suppr_accents ($mh["nom_mh"]) . "_pres." . $extension;

            if ($picture && file_exists ($picture)) {
                if (! unlink ($picture)) {
                    httpError (500);
                }
            }
            
            // www le nom de l'image est stockée dans la bdd pour des raisons non connues
            $stmt = $db->prepare ("DELETE FROM img_mh WHERE nom_mh=:nom_mh");
            if ($stmt) {
                if ($stmt->execute (array (":nom_mh" => $mh["nom_mh"])) !== FALSE) {
                    $stmt = $db->prepare ("INSERT INTO img_mh (nom_mh, nom_img) VALUES (:nom_mh, :nom_img)");
                    if ($stmt) {
                        if ($stmt->execute (array (":nom_mh" => $mh["nom_mh"], ":nom_img" => $filename))) {
                            if (!move_uploaded_file($_FILES['file']['tmp_name'], "$dest/$filename")) {
                                httpError (500);
                            }                    
                        } else {
                            dbError ();
                        }
                    } else {
                        dbError ();
                    }                                
                } else {
                    dbError ();
                }
            } else {
                dbError ();
            }                        
            
            httpExit (0);
        }
    }

    return "mhRegisterPictures";
}

function mhRegisterRoomPictures() {
    global $db, $lang, $images;

    $ch = getMhRoom ($_GET["nom_chambre"]);
    if (!$ch) {
        httpError (404);
    }
    
    $dest = mhRoomImgPath ($lang, $ch["nom_mh"], $ch["nom_chambre"]);

    if (!file_exists ($dest)) {
        if (!mkdir ($dest, 0777, true)) {
            httpError (500);
        }
    }
                
    $images =  mhRoomListPictures ($dest);

    if (isPOST()) {
        if (isset ($_FILES) && isset ($_FILES['file']) && isset ($_FILES['file']['tmp_name'])) {
            $lastid = mhRoomLastPictureId ($ch["nom_mh"], $ch["nom_chambre"], $images);

            $filename = suppr_accents ($ch["nom_chambre"]) . ($lastid + 1);
            
            if (preg_match ("/\.(\w{2,4})$/", $_FILES['file']['name'], $matches)) {
                $extension = strtolower ($matches[1]);
            } else {
                $extension = "jpg";
            }

            if (!move_uploaded_file($_FILES['file']['tmp_name'], "$dest/$filename.$extension")) {
                httpError (500);
            }

            httpExit (0);
        }
    }

    return "mhRegisterRoomPictures";
}

function mhRegisterRoomIndispo () {
    global $db, $lang;

    $ch = getMhRoom ($_GET["nom_chambre"]);
    if (!$ch) {
        httpError (404);
    }

    if (isPOST ()) {
        indispoRegister ($_POST, "chambre");
        redirect ("?action=mhRegisterRoom&nom_mh=" . urlencode ($_GET["nom_mh"]) . "&nom_chambre=" . urlencode ($_GET["nom_chambre"]));
    }

    return "mhRegisterRoomIndispo";
}

function mhImgPath ($lang, $mh) {
    if (isset ($mh) && $mh != "") {
        return suppr_accents (getBase () . "/ihm_$lang/img/presentation_mh");
    } else {
        httpError (500);        
    }
}

function mhRoomImgPath ($lang, $mh, $room) {
    if (isset ($lang) && isset ($mh) && isset ($room) && $mh != "" && $room != "" && $lang != "") {
        return suppr_accents (getBase () . "/ihm_$lang/img/guesthouses/$mh/$room");
    } else {
        httpError (500);
    }
}


function mhRoomListPictures ($base) {

    if (file_exists ($base)) {
        return listFiles ($base);    
    } else {
        return [];
    }    
}

function mhRoomLastPictureId ($mh, $room, $images) {
    $max = 0;

    $room = preg_quote ($room, "/");
    
    foreach ($images as $image) {
        if (preg_match ("/$room(\d+)\.\w{2,4}$/", $image, $matches)) {
            if ($matches[1] > $max) {
                $max = $matches[1];
            }
        }
    }

    return $max;
}

function mhPhotoPreview () {
    global $conf, $lang;

    if (isset ($_GET["nom_chambre"])) {
        $ch = getMhRoom ($_GET["nom_chambre"]);
        if (!$ch) {
            httpError (404);
        }
        $dirname = mhRoomImgPath ($lang, $ch["nom_mh"], $ch["nom_chambre"]);
    } elseif (isset ($_GET["nom_mh"])) {
        $mh = getMh ($_GET["nom_mh"]);
        if (!$mh) {
            httpError (404);
        }

        $dirname = mhImgPath ($lang, $mh["nom_mh"]);
    } else {
        httpError (404);
    }

    if (isset ($_GET["filename"]) && isset ($_GET["box"])) {
        if ($_GET["filename"] != "" && $_GET["box"] != "") {
            buildThumbnail ($dirname, $_GET["filename"], $_GET["box"]);
        } else {
            httpError (500);
        }
    } else {
        httpError (500);
    }

    httpExit (0);
}