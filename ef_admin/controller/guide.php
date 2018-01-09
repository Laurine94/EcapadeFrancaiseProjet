<?php

function guideRegister () {
    global $db, $lang, $invalid;

    $id = isset ($_POST["id"]) && $_POST["id"] != "" ? $_POST["id"] : null;
    
    $update = isset ($_GET["id"]) && $_GET["id"] != "";

    if ($update) {
        $guide = getGuide ($_GET["id"]);
        if (!$guide) {
            httpError (404);
        }
    } 
    
    if (isPOST()) {
        $invalid = validate (array ('nom' => 'varchar_not_empty', 'prenom' => 'varchar', 'description' => 'text', 'ville' => 'varchar', 'tarif_heure' => 'float'), $_POST, array ());
    
        if ($invalid) {
            return "guideRegister";
        }
        
        if ($update) {
            $sql = "UPDATE activity_guide SET id=:id, nom=:nom, prenom=:prenom, description=:description, ville=:ville, tarif_heure=:tarif_heure WHERE id=:id";
        } else {
            $sql = "INSERT INTO activity_guide ( id, nom,  prenom,  description,  ville,  tarif_heure) VALUES (:id, :nom,  :prenom,  :description,  :ville,  :tarif_heure)";
        }

        $stmt = $db->prepare ($sql);

        if ($stmt) {
            try {
                
                if ($stmt->execute (array (':id' => $id, ':nom' => $_POST['nom'],':prenom' => $_POST['prenom'],':description' => $_POST['description'],':ville' => $_POST['ville'],':tarif_heure' => $_POST['tarif_heure']))) {
                    if ($guide) {
                        $id = $guide["id"];
                    } else {
                        $id = $db->lastInsertId ();
                    }
                    
                    registerLanguages ($id);

                    registerVilles ($id);
                    
                    if (isset($_FILES["photo_file"]) && $_FILES["photo_file"]["name"] != "") {
                        $filename = getBase () . "/ihm_$lang/img/guides_filters/$id.png";
                        if (!move_uploaded_file ($_FILES['photo_file']['tmp_name'], $filename)) {
                            httpError (500);
                        }
                    }
        
                    redirect ("?action=guideList");
                } else {
                    dbError ();
                }
            } catch (PDOException $e) {
                if ($e->errorInfo[1] == 1062) {
                    addAlert ("danger", "Ce guide existe déjà");
                } else {
                    dbError ($e);
                }
            } 
        } else {
            dbError ();
        }
    }

    return "guideRegister";
}

function guideActivitiesRegister () {
    if (isPOST ()) {
        if (isset ($_GET["id"]) && $_GET["id"] != "") {
            registerActivities ($_GET["id"]);
        }
    }

    return "guideActivitiesRegister";
}

function guideRegisterIndispo () {
    global $db, $lang;

    if (isPOST ()) {
        indispoRegister ($_POST, "guide");
        redirect ("?action=guideRegister&id=" . urlencode ($_GET["nom_guide"]));
    }

    return "guideRegisterIndispo";
}

function registerLanguages ($guide) {
    global $db, $lang, $invalid;

    $guide_languages = getGuideLanguagesHash ($guide);

    for ($id = 0; $id < 16; $id++) {
        if (isset ($_POST["lang_" . $id]) && !isset ($guide_languages[$id])) {
            $sql = "INSERT INTO activity_guide_langue (guide, langue) VALUES (?,?)";
            
            $stmt = $db->prepare ($sql);

            if ($stmt) {
                if ($stmt->execute (array ($guide, $id))) {
                    // ok
                } else {
                    dbError ();
                }
            } else {
                dbError ();
            }
        }

        if (!isset ($_POST["lang_" . $id]) && isset ($guide_languages[$id])) {
            $sql = "DELETE FROM activity_guide_langue WHERE guide=? AND langue=?";
            
            $stmt = $db->prepare ($sql);

            if ($stmt) {
                if ($stmt->execute (array ($guide, $id)) !== FALSE) {
                    // ok
                } else {
                    dbError ();
                }
            } else {
                dbError ();
            }
        }
        
    }
}

function registerActivities ($guide) {
    global $db, $lang, $invalid;

    $guide_activities = getGuideActivitiesHash ($guide);

    foreach ($_POST as $key => $value) {
        if (preg_match ("/^activity_(\S+)/", $key, $matches)) {
            $activity = str_replace ("_", " ", $matches[1]);
                
            if (!isset ($guide_activities[$activity])) {
                $sql = "INSERT INTO activity_guide_activities (guide, activity, nom_activite) VALUES (?,?,?)";
            
                $stmt = $db->prepare ($sql);

                if ($stmt) {
                    if ($stmt->execute (array ($guide, $activity, $activity))) {
                        // ok
                    } else {
                        dbError ();
                    }
                } else {
                    dbError ();
                }                
            }
        }
    }

    foreach ($guide_activities as $key => $value) {
        if (!isset ($_POST["activity_" . str_replace (" ", "_", $key)])) {
            $sql = "DELETE FROM activity_guide_activities WHERE guide=? AND activity=?";

            $stmt = $db->prepare ($sql);

            if ($stmt) {
                if ($stmt->execute (array ($guide, $key)) !== FALSE) {
                    // ok
                } else {
                    dbError ();
                }
            } else {
                dbError ();
            }                
        }
    }
}

function registerVilles ($guide) {
    global $db, $lang, $invalid;

    $guide_villes = getGuideVilleHash ($guide);

    foreach ($_POST as $key => $value) {
        if (preg_match ("/^ville_(\S+)/", $key, $matches)) {
            if (!isset ($guide_villes[$matches[1]])) {
                $sql = "INSERT INTO activity_guide_ville (guide, ville) VALUES (?,?)";
            
                $stmt = $db->prepare ($sql);

                if ($stmt) {
                    if ($stmt->execute (array ($guide, $matches[1]))) {
                        // ok
                    } else {
                        dbError ();
                    }
                } else {
                    dbError ();
                }                
            }
        }
    }

    foreach ($guide_villes as $key => $value) {
        if (!isset ($_POST["ville_$key"])) {
            $sql = "DELETE FROM activity_guide_ville WHERE guide=? AND ville=?";

            $stmt = $db->prepare ($sql);

            if ($stmt) {
                if ($stmt->execute (array ($guide, $key)) !== FALSE) {
                    // ok
                } else {
                    dbError ();
                }
            } else {
                dbError ();
            }                
        }
    }
}

function guideDelete () {
    global $db, $lang;
    
    $guide = getGuide ($_GET["id"]);
    if (!$guide) {
        httpError (404);
    }

    if (isPOST ()) {
        $filename = getBase () . "/ihm_$lang/img/guides_filters/" . $guide["id"] . ".png";

        if (file_exists ($filename)) {
            unlink ($filename);
        }

        indispoDelete ("guide", $guide["id"]);
        
        $stmt = $db->prepare ("DELETE FROM activity_guide WHERE id = ?");

        if ($stmt->execute (array ($guide["id"])) !== FALSE) {
            $stmt = $db->prepare ("DELETE FROM activity_guide_activities WHERE guide = ?");            
            if ($stmt->execute (array ($guide["id"])) !== FALSE) {
                $stmt = $db->prepare ("DELETE FROM activity_guide_langue WHERE guide = ?");            
                if ($stmt->execute (array ($guide["id"])) !== FALSE) {
                    $stmt = $db->prepare ("DELETE FROM activity_guide_ville WHERE guide = ?");            
                    if ($stmt->execute (array ($guide["id"])) !== FALSE) {
                        redirect ("?action=guideList");
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
    }

    return "home";
}

