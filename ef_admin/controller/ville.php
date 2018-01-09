<?php


function villeRegister () {
    global $db, $lang, $invalid, $images;

    if (isset ($_GET["ville"]) && $_GET["ville"] != "") {
        $ville = getVille ($_GET["ville"]);
        $images = villeListPictures ($ville["id"]);
    }
    
    if (isPOST()) {
        if (!$ville) {
            // si nouvelle ville on set son id
            $_POST["id"] = to_valid_filename ($_POST["ville"]);
        }
                
        $invalid = validate (array ('ville' => 'varchar_not_empty', 'genre' => 'varchar', 'description_ville' => 'text', 'id' => 'filename'), $_POST, array ());
    
        if ($invalid) {
            return "villeRegister";
        }
        
        if (isset ($_POST["genre"]) && $_POST["genre"] != "") {
            $_POST["genre"] = to_valid_filename ($_POST["genre"]);
            
            if (isset ($_FILES["maison_genre_file"]) && $_FILES["maison_genre_file"]["name"] != "") {
                $filename = getBase () . "/ihm_$lang/img/genre/" . $_POST["genre"] . ".jpg";

                if (!move_uploaded_file ($_FILES['maison_genre_file']['tmp_name'], $filename)) {
                    httpError (500);
                }                
            }
            
            if (isset ($_FILES["activite_genre_file"]) && $_FILES["activite_genre_file"]["name"] != "") {
                $filename = getBase () . "/ihm_$lang/img/genrebis/" . $_POST["genre"] . ".jpg";

                if (!move_uploaded_file ($_FILES['activite_genre_file']['tmp_name'], $filename)) {
                    httpError (500);
                }                
            }
        } else {
            if (isset ($_POST["genre_select"]) && $_POST["genre_select"] != "_new_") {
                $_POST["genre"] = $_POST["genre_select"];
            }
        }

        $filename = getVillePictureGuest ($_POST["id"]);
        if (isset($_POST["guest_checkbox"])) {
            if (isset($_FILES["guest"]) && $_FILES["guest"]["name"] != "") {
                if (!move_uploaded_file ($_FILES['guest']['tmp_name'], $filename)) {
                    httpError (500);
                }
            }
        } else {
            if (file_exists ($filename)) {
                unlink ($filename);
            }
        }

        $filename = getVillePictureGuide ($_POST["id"]);
        if (isset($_POST["guide_checkbox"])) {
            if (isset($_FILES["guide"]) && $_FILES["guide"]["name"] != "") {
                if (!move_uploaded_file ($_FILES['guide']['tmp_name'], $filename)) {
                    httpError (500);
                }
            }
        } else {
            if (file_exists ($filename)) {
                unlink ($filename);
            }
        }

        $filename = getVillePictureActi ($_POST["id"]);
        if (isset($_POST["acti_checkbox"])) {
            if (isset($_FILES["acti"]) && $_FILES["acti"]["name"] != "") {
                if (!move_uploaded_file ($_FILES['acti']['tmp_name'], $filename)) {
                    httpError (500);
                }
            }
        } else {
            if (file_exists ($filename)) {
                unlink ($filename);
            }
        }
        
        if (isset ($_GET["ville"]) && $_GET["ville"] != "") {
            $sql = "UPDATE ville SET ville=:ville, genre=:genre, description_ville=:description_ville, id=:id WHERE ville=:ville";
        } else {
            $sql = "INSERT INTO ville ( ville,  genre, description_ville,  id) VALUES ( :ville,  :genre, :description_ville,  :id)";
        }

        $stmt = $db->prepare ($sql);

        if ($stmt) {
            try {
                
                if ($stmt->execute (array (':ville' => $_POST['ville'],':genre' => $_POST['genre'],':description_ville' => $_POST['description_ville'],':id' => $_POST['id']))) {
                    if (isset ($_GET["ville"]) && $_GET["ville"] != "") {
                        redirect ("?action=villeList");
                    } else {
                        redirect ("?action=villeRegister&ville=" . urlencode ($_POST["ville"]));
                    }
                } else {
                    dbError ();
                }
            } catch (PDOException $e) {
                if ($e->errorInfo[1] == 1062) {
                    addAlert ("danger", "Cette ville existe déjà");
                } else {
                    dbError ($e);
                }
            } 
        } else {
            dbError ();
        }
    }
    
    return "villeRegister";
}

function villeDelete () {
    global $db, $lang;
    
    $ville = getVille ($_GET["ville"]);
    if (!$ville) {
        httpError (404);
    }

    if (isPOST ()) {
        $dest = getVillePicturePath ();
        $images =  listFiles ($dest);

        foreach ($images as $image) {
            if (preg_match ("/^" . preg_quote ($ville["ville"], "/") . "\_\w+/", $image, $matches)) {
                unlink ("$dest/$image");
            }
        }
        
        $stmt = $db->prepare ("DELETE FROM ville WHERE ville = ?");

        if ($stmt->execute (array ($ville["ville"])) !== FALSE) {           
            redirect ("?action=villeList");
        } else {
            dbError ();
        }
    }

    return "home";
}

function getVillePictureGuest ($id) {
    return getVillePicturePath () . "/" . $id . "_guest.jpg";
}

function getVillePictureGuide ($id) {
    return getVillePicturePath () . "/" . $id . "_guide.jpg";
}

function getVillePictureActi ($id) {
    return getVillePicturePath () . "/" . $id . "_acti.jpg";
}

function getVillePicturePath () {
    global $lang;
    return getBase () . "/ihm_$lang/img/villes_activites";
}

function villeRegisterPictures() {
    global $db, $lang, $images;

    $ville = getVille ($_GET["ville"]);
    if (!$ville) {
        httpError (404);
    }
    
    $images =  villeListPictures ($ville["id"]);

    $dest = getVillePicturePath ();
    
    if (isPOST()) {
        if (isset ($_FILES) && isset ($_FILES['file']) && isset ($_FILES['file']['tmp_name'])) {
            $id = villeLastPictureId ($ville["id"], $images) + 1;

            $filename = $ville["id"] . "_activites-" . $id;
            
            if (preg_match ("/\.(\w{2,4})$/", $_FILES['file']['name'], $matches)) {
                $extension = strtolower ($matches[1]);
            } else {
                $extension = "jpg";
            }

            if (!move_uploaded_file($_FILES['file']['tmp_name'], "$dest/$filename.$extension")) {
                httpError (500);
            }

            // création de la preview -min-d.jpg
            imagejpeg (resizeImageCrop ("$dest/$filename.$extension", 310, 175), "$dest/" . $ville["ville"] . "_activites-min-" . $id . ".jpg");
            
            
            // création de l'image _act.jpg
            $first = $ville["id"] . "_activites-1.jpg";

            if (file_exists ("$dest/$first")) {
                imagejpeg (resizeImageCrop ("$dest/$first", 310, 175), "$dest/" . $ville["id"] . "_acti.jpg");
            }

            httpExit (0);
        }
    }

    return "villeRegisterPictures";
}

function villeListPictures ($ville) {
    $dir = getVillePicturePath ();

    $ville = preg_quote ($ville, "/");

    if (file_exists ($dir)) {
        $images = array ();
        
        foreach (listFiles ($dir) as $file) {
            if (preg_match ("/$ville" . "_activites-\d+\.(jpg|png)$/i", $file)) {
                $images[] = $file;
            }
        }

        return $images;
    } else {
        return [];
    }    
}

function villeLastPictureId ($ville, $images) {
    $max = 0;

    $ville = preg_quote ($ville, "/");
    
    foreach ($images as $image) {
        if (preg_match ("/$ville" . "_activites-(\d+)\.(jpg|png)$/i", $image, $matches)) {
            if ($matches[1] > $max) {
                $max = $matches[1];
            }
        }
    }

    return $max;
}

function villePhotoPreview () {
    global $conf, $lang;

    $ville = getVille ($_GET["ville"]);
    if (!$ville) {
        httpError (404);
    }
    
    $dirname = getVillePicturePath ();

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