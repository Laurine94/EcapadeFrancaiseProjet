<?php

function suppr_accents($str, $encoding='utf-8') {
    // transformer les caractères accentués en entités HTML
    $str = htmlentities($str, ENT_NOQUOTES, $encoding);

    // remplacer les entités HTML pour avoir juste le premier caractères non accentués
    // Exemple : "&ecute;" => "e", "&Ecute;" => "E", "Ã " => "a" ...
    $str = preg_replace('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $str);

    // Remplacer les ligatures tel que : Œ, Æ ...
    // Exemple "Å“" => "oe"
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str);
    // Supprimer les quotes
    $str = preg_replace('#"#', '', $str);
    // Supprimer tout le reste
    $str = preg_replace('#&[^;]+;#', '', $str);

    return $str;
}

function to_valid_filename ($string) {
    return suppr_accents (preg_replace ('/[^\w]/', '', $string));
}

function slug ($string) {
    return preg_replace ('/[^a-zA-Z0-9]+/', "-", $string);
}

function startsWith ($string, $query) {
    return substr($string, 0, strlen($query)) === $query;
}

function listFiles ($directory) {
    $files = array ();
    
    $dir = opendir ($directory);
    while ($file = readdir ($dir)) {
        if ($file != "." && $file != ".." && !is_dir ($file)) {
            $files[] = $file;
        }
    }
    closedir ($dir);

    return $files;
}

function resizeImage ($filename, $max_width, $max_height) {
    list($orig_width, $orig_height) = getimagesize($filename);

    $width = $orig_width;
    $height = $orig_height;

    if ($height > $max_height) {
        $width = ($max_height / $height) * $width;
        $height = $max_height;
    }

    if ($width > $max_width) {
        $height = ($max_width / $width) * $height;
        $width = $max_width;
    }

    $image_p = imagecreatetruecolor($width, $height);
    $image = imagecreatefromjpeg($filename);

    imagecopyresampled($image_p, $image, 0, 0, 0, 0,
    $width, $height, $orig_width, $orig_height);

    return $image_p;
}

function resizeImageSquare ($filename, $box=140) {
    return resizeImageCrop ($filename, $box, $box);
}

function resizeImageCrop ($filename, $w, $h) {
    list($width, $height) = getimagesize($filename);
    $src = imagecreatefromjpeg($filename);
    $ir = $width/$height;
    $fir = $w/$h;
    if($ir >= $fir){
        $newheight = $h; 
        $newwidth = $w * ($width / $height);
    }
    else {
        $newheight = $w / ($width/$height);
        $newwidth = $w;
    }   
    $xcor = 0 - ($newwidth - $w) / 2;
    $ycor = 0 - ($newheight - $h) / 2;


    $dst = imagecreatetruecolor($w, $h);
    imagecopyresampled($dst, $src, $xcor, $ycor, 0, 0, $newwidth, $newheight, 
    $width, $height);

    return $dst;
}

function buildThumbnail ($dir, $file, $width, $height = 0) {
    global $conf;
    
    if (!startsWith (realpath ($dir), realpath ($conf["base"]))) {
        httpError (500);
    }
    
    if (invalid_filename ($file)) {
        httpError (500);
    }
            
    // restriction nécessaires sur la taille de l'image
    if ($width < 0 || $width > 480) {
        httpError (500);
    }

    if ($height < 0 || $height > 480) {
        httpError (500);
    }
    
    $preview = null;
    $path = realpath ($dir . "/" . $file);

    if (preg_match ("/^(.*)\.(jpe?g)$/i", $path, $matches)) {
        header('Content-Type: image/jpeg');

        if (!file_exists ($path)) {
            httpError (404);                
        }

        if ($height) {
            imagejpeg (resizeImage ($path, $width, $height));
        } else {
            imagejpeg (resizeImageSquare ($path, $width));
        }
            
        $preview = $matches[1] . "_" . $box . "." . strtolower ($matches[2]);

        /* XXX pour le future on peut stoquer la preview sur le disque dur
           if (!file_exists ($preview)) {
           file_put_contents ($preview, resizeImage ($file, $box, $box));
           }
            
           if (!file_exists ($preview)) {
           httpError (404);
           }
            
           echo file_get_contents ($preview);
        */
    } else {
        httpError (500);
    }
}

function getBase () {
    global $conf;

    if (isset ($conf["base"])) {
        return $conf["base"];
    } else {
        return __DIR__ . "/..";
    }
}

