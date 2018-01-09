<?php

function coffretRegister () {
    global $db, $lang, $invalid, $images;

    $update = isset ($_GET["id"]) && $_GET["id"] != "";

    if ($update) {
        $coffret = getCoffret ($_GET["id"]);
        $images = coffretListPictures ($coffret["id"]);
        if (!$coffret) {
            httpError (404);
        }
    } else {
        $images = array ();
    }
    
    if (isPOST()) {
        if (!$coffret) {
            $_POST["id"] = to_valid_filename ($_POST["nom"]);
        }

        if (!isset ($_POST["disponible"])) {
            $_POST["disponible"] = 0;
        }
        
        $invalid = validate (array ('id' => 'filename', 'nom' => 'varchar_not_empty', 'prix' => 'int', 'titre' => 'varchar', 'description' => 'text', 'conditions' => 'text','disponible' => 'tinyint'), $_POST, array ());
    
        if ($invalid) {
            return "coffretRegister";
        }
    
        if ($update) {
            $sql = "UPDATE coffret SET id=:id, nom=:nom, prix=:prix, titre=:titre, description=:description, conditions=:conditions, disponible=:disponible WHERE id=:id";
        } else {
            $sql = "INSERT INTO coffret ( id,  nom,  prix,  titre, description, conditions, disponible) VALUES ( :id,  :nom,  :prix,  :titre, :description, :conditions, :disponible)";
        }

        $stmt = $db->prepare ($sql);

        if ($stmt) {
            try {
                
                if ($stmt->execute (array (':id' => $_POST['id'],':nom' => $_POST['nom'],':prix' => $_POST['prix'], ':titre' => $_POST['titre'], 'description' => $_POST['description'], 'conditions' => $_POST['conditions'], ':disponible' => $_POST['disponible']))) {
                    if ($update) {
                        redirect ("?action=coffretList");
                    } else {
                        redirect ("?action=coffretRegisterPictures&id=" . urlencode ($_POST["id"]));
                    }
                } else {
                    dbError ();
                }
            } catch (PDOException $e) {
                if ($e->errorInfo[1] == 1062) {
                    addAlert ("danger", "Ce coffret existe déjà");
                } else {
                    dbError ($e);
                }
            } 
        } else {
            dbError ();
        }
    }

    return "coffretRegister";
}

function coffretDelete () {
    global $db, $lang;
    
    $coffret = getCoffret ($_GET["id"]);
    if (!$coffret) {
        httpError (404);
    }

    if (isPOST ()) {
        $dest = getCoffretPicturePath ($coffret["id"]);
        
        $images =  coffretListPictures ($coffret["id"]);

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
        
        /*
        $images =  coffretListPictures ($coffret["id"]);
        foreach ($images as $image) {
            unlink ($image);
        }

        $filename = getBase () . "/ihm_$lang/img/coffret/" . $coffret["id"] . "_coffret.jpg";

        if (file_exists ($filename)) {
            unlink ($filename);
        }
        
        */
        $stmt = $db->prepare ("DELETE FROM coffret WHERE id = ?");

        if ($stmt->execute (array ($coffret["id"])) !== FALSE) {           
            redirect ("?action=coffretList");
        } else {
            dbError ();
        }
    }

    return "home";
}


function getCoffretPicturePath ($id) {
    global $lang;
    return getBase () . "/ihm_$lang/img/coffret/" . to_valid_filename ($id);
}

function coffretRegisterPictures() {
    global $db, $lang, $images;

    $coffret = getCoffret ($_GET["id"]);
    if (!$coffret) {
        httpError (404);
    }
    
    $images =  coffretListPictures ($coffret["id"]);

    $dest = getCoffretPicturePath ($coffret["id"]);
    
    if (isPOST()) {
        if (!file_exists ($dest)) {
            if (!mkdir ($dest, 0777, true)) {
                httpError (500);
            }
        }

        if (isset ($_FILES) && isset ($_FILES['file']) && isset ($_FILES['file']['tmp_name'])) {

            $id = coffretLastPictureId ($coffret["id"], $images) + 1;

            $filename = $coffret["id"] . "_coffret-" . $id;

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

    return "coffretRegisterPictures";
}

function coffretListPictures ($id) {
    $base = getCoffretPicturePath ($id);

    if (file_exists ($base)) {
        return listFiles ($base);    
    } else {
        return [];
    }    
}

function coffretLastPictureId ($coffret, $images) {
    $max = 0;

    $coffret = preg_quote ($coffret, "/");
    
    foreach ($images as $image) {
        if (preg_match ("/$coffret" . "_coffret-(\d+)\.\w{2,4}$/", $image, $matches)) {
            if ($matches[1] > $max) {
                $max = $matches[1];
            }
        }
    }

    return $max;
}

function coffretPhotoPreview () {
    global $conf, $lang;

    $coffret = getCoffret ($_GET["id"]);
    if (!$coffret) {
        httpError (404);
    }
    
    $dirname = getCoffretPicturePath ($_GET["id"]);

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
