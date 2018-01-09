<?php

global $db;


function db ($lang) {
    global $db, $conf;

    $db = null;

    if (!$lang) {
        $lang = "en";
    }
    
    try {
        $db = new PDO("mysql:host=localhost;dbname=ef_" . $lang, $conf["db_user"], $conf["db_password"],
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    } catch (PDOException $e) {
        addAlert ("danger",  $e->getMessage());
    }

    return $db;
}

function dbError ($e) {
    global $db;

    if (isset ($e)) {
        addALert ("danger", "erreur DB " . $e->errorInfo[2]);
    } else {
        addALert ("danger", "erreur DB " . $db->errorInfo()[2]);
    }
//    print_r ($db->errorInfo ());
}

function getMh($nom) {
    global $db;

    $stmt = $db->prepare ("SELECT * FROM maison_hote WHERE nom_mh = ?");
    if ($stmt->execute (array ($nom))) {
        return $stmt->fetch ();
    } else {
        dbError ();
    }
    
    return false;
}

function getMhPicture($nom) {
    global $db;

    $stmt = $db->prepare ("SELECT nom_img FROM img_mh WHERE nom_mh = ?");
    if ($stmt->execute (array ($nom))) {
        return $stmt->fetch ()[0];
    } else {
        dbError ();
    }
    
    return false;
}

function getMhRoom($nom) {
    global $db;

    $stmt = $db->prepare ("SELECT * FROM chambre WHERE nom_chambre = ?");
    if ($stmt->execute (array ($nom))) {
        return $stmt->fetch ();
    } else {
        dbError ();
    }
    
    return false;
}

function getMhRoomList($nom) {
    global $db;

    $rows = [];
    $stmt = $db->prepare ("SELECT * FROM chambre WHERE nom_mh = ?");
    
    if ($stmt->execute (array ($nom))) {
        while ($row = $stmt->fetch ()) {
            $rows[] = $row;
        }
    } else {
        dbError ();
    }

    return $rows;
}

function getMhList() {
    global $db;

    $rows = [];
    $stmt = $db->prepare ("SELECT * FROM maison_hote ORDER BY nom_mh");
    
    if ($stmt->execute (array ())) {
        while ($row = $stmt->fetch ()) {
            $rows[] = $row;
        }
    } else {
        dbError ();
    }

    return $rows;
}

function getActivite($nom) {
    global $db;

    $stmt = $db->prepare ("SELECT * FROM activites WHERE nom_activite = ?");
    if ($stmt->execute (array ($nom))) {
        return $stmt->fetch ();
    } else {
        dbError ();
    }
    
    return false;
}

function getActiviteList() {
    global $db;

    $rows = [];
    $stmt = $db->prepare ("SELECT * FROM activites ORDER BY nom_activite");
    
    if ($stmt->execute (array ())) {
        while ($row = $stmt->fetch ()) {
            $rows[] = $row;
        }
    } else {
        dbError ();
    }

    return $rows;
}

function getActiviteTypes() {
    global $db;

    $rows = [];
    $stmt = $db->prepare ("SELECT DISTINCT type_activite FROM activites ORDER BY type_activite ASC");
    
    if ($stmt->execute ()) {
        while ($row = $stmt->fetch ()) {
            $rows[] = $row[0];
        }
    } else {
        dbError ();
    }

    return $rows;
}

function getPrixSelect ($entite, $value) {
    global $db;

    $rows = [];
    $stmt = $db->prepare ("SELECT * FROM prixselect WHERE nom_" . $entite . " = ? ORDER BY id ASC");
    
    if ($stmt->execute (array ($value))) {
        while ($row = $stmt->fetch ()) {
            $rows[] = $row;
        }
    } else {
        dbError ();
    }

    return $rows;
    
}

function getVilleList() {
    global $db;

    $rows = [];
    $stmt = $db->prepare ("SELECT * FROM ville ORDER BY ville");
    
    if ($stmt->execute (array ())) {
        while ($row = $stmt->fetch ()) {
            $rows[] = $row;
        }
    } else {
        dbError ();
    }

    return $rows;
}

function getVille($nom) {
    global $db;

    $stmt = $db->prepare ("SELECT * FROM ville WHERE ville = ?");
    if ($stmt->execute (array ($nom))) {
        return $stmt->fetch ();
    } else {
        dbError ();
    }
    
    return false;
}

function getGenreList() {
    global $db;

    $rows = [];
    $stmt = $db->prepare ("SELECT DISTINCT genre FROM ville ORDER BY genre");
    
    if ($stmt->execute (array ())) {
        while ($row = $stmt->fetch ()) {
            $rows[] = $row[0];
        }
    } else {
        dbError ();
    }

    return $rows;
}

function getBlog($slug) {
    global $db;

    $stmt = $db->prepare ("SELECT * FROM blog WHERE slug = ?");
    if ($stmt->execute (array ($slug))) {
        return $stmt->fetch ();
    } else {
        dbError ();
    }
    
    return false;
}

function getBlogList() {
    global $db;

    $rows = [];
    $stmt = $db->prepare ("SELECT * FROM blog ORDER BY dateupdate DESC LIMIT 64");
    
    if ($stmt->execute (array ())) {
        while ($row = $stmt->fetch ()) {
            $rows[] = $row;
        }
    } else {
        dbError ();
    }

    return $rows;
}

function getCoffret($id) {
    global $db;

    $stmt = $db->prepare ("SELECT * FROM coffret WHERE id = ?");
    if ($stmt->execute (array ($id))) {
        return $stmt->fetch ();
    } else {
        dbError ();
    }
    
    return false;
}

function getCoffretList() {
    global $db;

    $rows = [];
    $stmt = $db->prepare ("SELECT * FROM coffret ORDER BY nom DESC LIMIT 64");
    
    if ($stmt->execute (array ())) {
        while ($row = $stmt->fetch ()) {
            $rows[] = $row;
        }
    } else {
        dbError ();
    }

    return $rows;
}

function getGuide($id) {
    global $db;

    $stmt = $db->prepare ("SELECT * FROM activity_guide WHERE id = ?");
    if ($stmt->execute (array ($id))) {
        return $stmt->fetch ();
    } else {
        dbError ();
    }
    
    return false;
}

function getGuideList() {
    global $db;

    $rows = [];
    $stmt = $db->prepare ("SELECT * FROM activity_guide ORDER BY nom LIMIT 64");
    
    if ($stmt->execute (array ())) {
        while ($row = $stmt->fetch ()) {
            $rows[] = $row;
        }
    } else {
        dbError ();
    }

    return $rows;
}

function getGuideActivities($guide) {
    global $db;

    $rows = [];
    $stmt = $db->prepare ("SELECT * FROM activity_guide_activities B, activites A WHERE B.activity = A.id_activite AND guide=?");
    
    if ($stmt->execute (array ($guide))) {
        while ($row = $stmt->fetch ()) {
            $rows[] = $row;
        }
    } else {
        dbError ();
    }

    return $rows;
}

function getLanguages () {
    global $db;

    $rows = [];
    $stmt = $db->prepare ("SELECT * FROM activity_langues");
    
    if ($stmt->execute (array ())) {
        while ($row = $stmt->fetch ()) {
            $rows[$row["id"]] = $row["langue"];
        }
    } else {
        dbError ();
    }

    return $rows;
}

function getGuideLanguagesHash ($guide) {
    global $db;

    $rows = [];
    $stmt = $db->prepare ("SELECT * FROM activity_guide_langue WHERE guide = ?");
    
    if ($stmt->execute (array ($guide))) {
        while ($row = $stmt->fetch ()) {
            $rows[$row["langue"]] = 1;
        }
    } else {
        dbError ();
    }

    return $rows;
}

function getGuideActivitiesHash ($guide) {
    global $db;

    $rows = [];
    $stmt = $db->prepare ("SELECT * FROM activity_guide_activities WHERE guide = ?");
    
    if ($stmt->execute (array ($guide))) {
        while ($row = $stmt->fetch ()) {
            $rows[$row["activity"]] = 1;
        }
    } else {
        dbError ();
    }

    return $rows;
}

function getGuideVilleHash ($guide) {
    global $db;

    $rows = [];
    $stmt = $db->prepare ("SELECT * FROM activity_guide_ville WHERE guide = ?");
    
    if ($stmt->execute (array ($guide))) {
        while ($row = $stmt->fetch ()) {
            $rows[$row["ville"]] = 1;
        }
    } else {
        dbError ();
    }

    return $rows;
}

function getActiviteListByType($type) {
    global $db;
    
    $rows = [];
    $stmt = $db->prepare ("SELECT * FROM activites WHERE type_activite = ? ORDER BY ville, nom_activite");

    if ($stmt->execute (array ($type))) {
        while ($row = $stmt->fetch ()) {
            $rows[] = $row;
        }
    } else {
        dbError ();
    }

    return $rows;
}

function getIndispo ($entite, $value) {
    global $db;

    $rows = [];
    $stmt = $db->prepare ("SELECT * FROM indispo WHERE nom_" . $entite . " = ? AND date_fin >= NOW() ORDER BY date_debut ASC");
    
    if ($stmt->execute (array ($value))) {
        while ($row = $stmt->fetch ()) {
            $rows[] = $row;
        }
    } else {
        dbError ();
    }

    return $rows;
    
}
