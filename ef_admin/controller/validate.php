<?php

function invalid_text ($string) {
    if (preg_match ('/<\/textarea/i', $string)) {
        return "Champ text non valide";
        /* désactivation js requise. Voir html purifier
    } elseif (preg_match ('/<\w[^>]+\son/i', $string)) {
        return "Javascript non authorisé";
        */
    } else {
        return false;
    }
}

function invalid_varchar ($string) {
    if (preg_match ('/[<>\"\\\\]/', $string)) {
        return "Les charactères spéciaux ne sont pas authorisés";
    } else {
        return false;
    }
}

function invalid_varchar_not_empty ($string) {
    $error = invalid_varchar ($string);
    
    if ($error) { return $error; }
    
    if (strlen ($string) == 0) {
        return "Chaîne de caractères vide";
    }
    
    return false;
}

function invalid_int ($int) {
    if (preg_match ('/^\d+$/', $int)) {
        return false;
    } else {
        return "Nombre entier non valide";
    }
}

function invalid_float ($float) {
    if (preg_match ('/^\d*(\.\d+)?$/', $float)) {
        return false;
    } else {
        return "Nombre floatant non valide";
    }
}

function invalid_tinyint ($int) {
    if (preg_match ('/^[01]$/', $int)) {
        return false;
    } else {
        return "Booléen non valide";
    }
}

function invalid_filename ($filename) {
    if (strstr ($filename, "..") || strstr ($filename, "/") || strstr ($filename, "\\")) {
        return "Nom de fichier non valide";
    } else {
        return false;
    }
}

function invalid_date ($date) {
    if (preg_match ('|^\d+[/-]\d+[/-]\d+$|', $date)) {
        return false;
    } else {
        return "Temps non valide";
    }
}

function invalid_time ($time) {
    if (preg_match ('/^\d+:\d+:\d+$/', $time)) {
        return false;
    } else {
        return "Temps non valide";
    }
}

function invalid_lang ($lang) {
    if (preg_match ('/^\w{2}$/', $lang)) {
        return false;
    } else {
        return "Langage non supporté";
    }
}

function validate ($fields, $values, $options = []) {
    global $conf;
    
    $errors = array ();
    
    foreach ($fields as $field => $validate) {
        $error = null;
        if (gettype ($validate) == "string") {
            $function = "invalid_" . $validate;
            if (function_exists ($function)) {
                $error = $function($values[$field]);
            } else {
                if ($conf["debug"]) {
                    addAlert ("warning", "Pas de validation disponible pour $validate");
                }
            }
        } else {
            $error = $validate($field);
        }

        if ($error) {
            $errors[$field] = $error;
        }
    }

    return $errors;
}