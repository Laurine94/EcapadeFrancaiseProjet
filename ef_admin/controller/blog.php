<?php
/*
Manque le lien vers le blog du front
 */

function blogRegister () {
    global $db, $lang, $invalid;

    $update = isset ($_GET["slug"]) && $_GET["slug"] != "";

    if (isPOST()) {
        $invalid = validate (array ('titre' => 'varchar_not_empty', 'description' => 'text', 'auteur' => 'varchar'), $_POST, array ());
    
        if ($invalid) {
            return "blogRegister";
        }

        $slug = slug ($_POST["titre"]);
        
        if ($update) {
            $sql = "UPDATE blog SET titre=:titre, description=:description, auteur=:auteur, dateupdate=CURRENT_TIMESTAMP() WHERE slug=:slug";
        } else {
            $sql = "INSERT INTO blog (slug, titre,  description,  auteur) VALUES (:slug, :titre,  :description,  :auteur)";
        }

        $stmt = $db->prepare ($sql);

        if ($stmt) {
            try {
                if ($stmt->execute (array (':slug' => $slug, ':titre' => $_POST['titre'],':description' => $_POST['description'],':auteur' => $_POST['auteur']))) {
                    if (isset($_FILES["blog_file"]) && $_FILES["blog_file"]["name"] != "" && $slug != "") {
                        $dir = getBase () . "/ihm_$lang/img/blog";
                        
                        if (!file_exists ($dir)) {
                            mkdir ($dir);
                        }
                        
                        $filename = $dir . "/" . $slug . "_blog.jpg";
                        
                        if (move_uploaded_file ($_FILES['blog_file']['tmp_name'], $filename)) {
                            redirect ("?action=blogList");
                        } else {
                            httpError (500);
                        }
                    } else {
                        redirect ("?action=blogList");
                    }                    
                } else {
                    dbError ();
                }
            } catch (PDOException $e) {
                if ($e->errorInfo[1] == 1062) {
                    addAlert ("danger", "Ce blog existe déjà");
                } else {
                    dbError ($e);
                }
            } 
        } else {
            dbError ();
        }
    }

    return "blogRegister";
}

function blogDelete () {
    global $db, $lang;
    
    $blog = getBlog ($_GET["slug"]);
    if (!$blog) {
        httpError (404);
    }

    if (isPOST ()) {
        /*
        $images =  blogListPictures ($blog["slug"]);
        foreach ($images as $image) {
            unlink ($image);
        }
        */

        $filename = getBase () . "/ihm_$lang/img/blog/" . $blog["slug"] . "_blog.jpg";

        if (file_exists ($filename)) {
            unlink ($filename);
        }
        
        $stmt = $db->prepare ("DELETE FROM blog WHERE slug = ?");

        if ($stmt->execute (array ($blog["slug"])) !== FALSE) {           
            redirect ("?action=blogList");
        } else {
            dbError ();
        }
    }

    return "home";
}




