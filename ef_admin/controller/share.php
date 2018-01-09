<?php

function prixSelectRegister ($values, $entite) {
    global $db;

    if (!$entite) { httpError (500); }
    
    $stmt = $db->prepare ("DELETE FROM prixselect WHERE nom_" . $entite . " = ?");

    if ($stmt) {
        if ($stmt->execute (array ($values["nom_" . $entite])) !== FALSE) {
            // ok
        } else {
            dbError ();
        }
    }

    if (isset ($values["ps-titre"]) && count($values["ps-titre"]) > 1) {
        $stmt = $db->prepare ("INSERT INTO prixselect (nom_" . $entite . " , titre, prix) VALUES (?,?,?)");

        for ($i = 1; $i < count($values["ps-titre"]); $i++) {
            if (!invalid_varchar ($values["ps-titre"][$i]) &&
            !invalid_int ($values["ps-prix"][$i])) {
                if ($stmt->execute
                (array ($values["nom_" . $entite],
                $values["ps-titre"][$i],
                $values["ps-prix"][$i]))) {
                    // ok
                } else {
                    dbError ();
                }
            }
        }
    }
}        

function prixSelectDelete ($entite, $nom) {
    global $db;
    
    if (!$entite || !$nom) { httpError (500); }
    
    $stmt = $db->prepare ("DELETE FROM prixselect WHERE nom_" . $entite . " = ?");

    if ($stmt) {
        if ($stmt->execute (array ($nom)) !== FALSE) {
            // ok
        } else {
            dbError ();
        }
    }
}

function indispoSQLDate ($date) {
    if (preg_match ("|(\d+)/(\d+)/(\d+)|", $date, $matches)) {
        return "$matches[3]-$matches[2]-$matches[1]";
    }
    return "";
}

function indispoJSDate ($date) {
    if (preg_match ("|(\d+)-(\d+)-(\d+)|", $date, $matches)) {
        return "$matches[3]/$matches[2]/$matches[1]";
    }
    return "";
}

function indispoRegister ($values, $entite) {
    global $db;

    if (!$entite) { httpError (500); }
    
    $stmt = $db->prepare ("DELETE FROM indispo WHERE nom_" . $entite . " = ?");

    if ($stmt) {
        if ($stmt->execute (array ($values["nom_" . $entite])) !== FALSE) {
            // ok
        } else {
            dbError ();
        }
    }

    if (isset ($values["indispo-debut"]) && count($values["indispo-debut"]) > 1) {
        $stmt = $db->prepare ("INSERT INTO indispo (nom_" . $entite . " , date_debut, date_fin) VALUES (?,?,?)");

        for ($i = 1; $i < count($values["indispo-debut"]); $i++) {
            $debut = indispoSQLDate ($values["indispo-debut"][$i]);
            $fin = indispoSQLDate ($values["indispo-fin"][$i]);
            
            if (!invalid_date ($debut) &&
            !invalid_date ($fin)) {
                if ($stmt->execute
                (array ($values["nom_" . $entite],
                $debut,
                $fin))) {
                    // ok
                } else {
                    dbError ();
                }
            } else {
                addAlert ("danger", "Format de date invalide");
            }
        }
    }
}        

function indispoDelete ($entite, $nom) {
    global $db;
    
    if (!$entite || !$nom) { httpError (500); }
    
    $stmt = $db->prepare ("DELETE FROM indispo WHERE nom_" . $entite . " = ?");

    if ($stmt) {
        if ($stmt->execute (array ($nom)) !== FALSE) {
            // ok
        } else {
            dbError ();
        }
    }
}