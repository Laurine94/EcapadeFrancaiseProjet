<style>
.success { color: green; }
.failure { color: red; }
</style>

<?php

/*
  Tests automatisés du back office et du lien avec le front office

TODO:
- tests sur les images
- test autres langues
 */

include "vendor/autoload.php";
use Goutte\Client;

if ($_SERVER['REMOTE_ADDR'] != '127.0.0.1') {
    echo "Access denied";
    exit (0);
}

function setTestInfos ($url, $id) {
    global $testUrl, $testId;
    
    $testUrl = $url;
    $testId = $id;       
}

function getFrontPage ($url, $id) {
    global $backBase, $frontBase, $client, $crawler, $testCount;

    setTestInfos ("$frontBase/$url", $id);
    
    $crawler = $client->request('GET', $frontBase . "/" . $url);
}

function getBackPage ($url, $id) {
    global $backBase, $client, $crawler, $testCount;

    setTestInfos ("$backBase/$url", $id);
    
    $crawler = $client->request('GET', $backBase . "/" . $url);
}

function getBackFormById ($url, $id) {
    global $crawler;
    getBackPage ($url, $id);
    return $crawler->filter('#' . $id)->first()->form();
}

function testSuccess ($type, $isSuccess) {
    global $testUrl, $testId, $testCount;
    
    echo "<a href=\"" . $testUrl . "\" class=" . ($isSuccess ? "success" : "failure") . ">Test " . (++ $testCount) . " $type</a>  ";
    if ($isSuccess) {
        echo "<b class=success>Success</b>";
    } else {
        echo "<b class=failure>Failure</b>";
    }

    echo "<br/>";
    
    if (!$isSuccess) { exit (1); }
}

global $lang, $backBase, $client, $crawler, $entity, $frontBase, $testUrl, $testId, $testCount;

if ($_SERVER['REQUEST_METHOD'] != 'POST'): ?>
<center>
<br/><br/><br/>
<form method=POST action="">
    <input type="submit" value="Lancer les tests" />
</form>
</center>
<?php exit (0); endif;

$client = new Client();

$lang = "en";
$testCount = 0;
$backBase = "http://localhost/ef/escapadefrancaise/ef_admin/views";
$frontBase = "http://localhost/ef/escapadefrancaise";

$time = time ();    
   
    /********************************/
    /*** Test des maisons d'hôtes ***/
    /********************************/

$mhId = "#mh" . $time;

// Test ajout mh
$form = getBackFormById ("?action=mhRegister", "mhRegister");

$crawler = $client->submit
    ($form, array(
        'nom_mh' => $mhId,
        'ville' => 'Paris',
        'adresse_mh' => $mhId . "-adresse",
        'description_mh' => $mhId . "-description",
    ));


testSuccess ("Back Register MH", strpos ($crawler->text (), $mhId));

getFrontPage ("ihm_$lang/select_room.php?nom_mh=" . urlencode ($mhId), "mhRegister");

testSuccess ("Front Register MH", strpos ($crawler->text (), $mhId));

// Todo: Test affichage dans le contenu de la ville


    /*************************/
    /*** Test des chambres ***/
    /*************************/


$chId = "#ch" . $time;

$form = getBackFormById ("?action=mhRegisterRoom&" . "nom_mh=" . urlencode ($mhId), "mhRegister");

$crawler = $client->submit
    ($form, array(
        'nom_mh' => $mhId,
        'nom_chambre' => $chId,
        'nb_places' => 1,
        'taille' => 1,
        'prix_chambre' => 200,
    ));


testSuccess ("Back Register Room", strpos ($crawler->text (), $chId));

getFrontPage ("ihm_$lang/select_room.php?nom_mh=" . urlencode ($mhId), "chRegister");

testSuccess ("Front Register Room", strpos ($crawler->text (), $mhId));

    /*************************/
    /*** Test suppressions ***/
    /*************************/

// Test suppression chambre
$form = getBackFormById ("?action=mhRegisterRoom&nom_mh=" . urlencode ($mhId) . "&nom_chambre=" . urlencode ($chId), "mhDelete");

$crawler = $client->submit
    ($form, array(
    ));

testSuccess ("Delete Room", !strpos ($crawler->text (), $chId));

// Test suppression mh
$form = getBackFormById ("?action=mhRegister&nom_mh=" . urlencode ($mhId) , "mhDelete");

$crawler = $client->submit
    ($form, array(
    ));

testSuccess ("Delete MH", !strpos ($crawler->text (), $mhId));

    /**************************/
    /*** Test des activités ***/
    /**************************/

$acId = "#ac" . $time;

// Test ajout ac
$form = getBackFormById ("?action=activiteRegister", "activites");

$crawler = $client->submit
    ($form, array(
        'nom_activite' => $acId,
        'ville' => 'Paris',
        'prix_activite' => 100,
        'duree' => 1,
    ));


testSuccess ("Back Register Activite", strpos ($crawler->text (), $acId));

getFrontPage ("ihm_$lang/select_activites_final.php?ville=Paris&nom_activite=" . urlencode ($acId), "acRegister");

testSuccess ("Front Register Activite", strpos ($crawler->html (), $acId));

// Test suppression activite
$form = getBackFormById ("?action=activiteRegister&nom_activite=" . urlencode ($acId), "acDelete");


$crawler = $client->submit
    ($form, array(
    ));

testSuccess ("Delete Activite", !strpos ($crawler->text (), $acId));

    /***********************/
    /*** Test des guides ***/
    /***********************/

$guideId = "#guide" . $time;

// Test ajout guide
$form = getBackFormById ("?action=guideRegister", "guideRegister");

$crawler = $client->submit
    ($form, array(
        'nom' => $guideId,
        'tarif_heure' => 1,
    ));


testSuccess ("Back Register Guide", strpos ($crawler->text (), $guideId));

if (preg_match ('/id=(\d+).*' . preg_quote ($guideId) . '/', $crawler->html (), $matches)) {
    $id = $matches[1];
} else {
    $id = 0;
}

getFrontPage ("ihm_$lang/select_activities_guide_bis.php?guide=" . urlencode ($id), "guideRegister");

testSuccess ("Front Register Guide", strpos ($crawler->text (), $guideId));

// Test suppression guide
$form = getBackFormById ("?action=guideRegister&id=" . urlencode ($id), "guideDelete");

$crawler = $client->submit
    ($form, array(
    ));

testSuccess ("Delete Guide", !strpos ($crawler->text (), $guideId));

    /**************************/
    /*** Test des blogs ***/
    /**************************/

$blogId = "#blog" . $time;

// Test ajout ac
$form = getBackFormById ("?action=blogRegister", "blogRegister");

$crawler = $client->submit
    ($form, array(
        'titre' => $blogId,
        'description' => $blogId . '-description',
        'auteur' => $blogId . '-auteur',
    ));


testSuccess ("Back Register Blog", strpos ($crawler->text (), $blogId));

/* Pas de front pour l'instant 
getFrontPage ("ihm_$lang/select_blog_final.php?ville=Paris&nom_activite=" . urlencode ($blogId), "blogRegister");

testSuccess ("Front Register Blog", strpos ($crawler->html (), $blogId));

// Test suppression blog
$form = getBackFormById ("?action=blogRegister&nom_activite=" . urlencode ($blogId), "blogDelete");


$crawler = $client->submit
    ($form, array(
    ));

testSuccess ("Delete Activite", !strpos ($crawler->text (), $blogId));
*/

echo "<b>OK. Tous les tests ont étés effectués</b>";
