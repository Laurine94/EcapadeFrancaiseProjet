<?php
include "../conf.php";

function customErrorHandler($errno, $errstr) {
  echo "<b>Error:</b> [$errno] $errstr<br>";
  die();
}

if ($conf["debug"]) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    error_reporting(E_ALL ^ E_NOTICE);

    set_error_handler("customErrorHandler",E_USER_WARNING);
} else {
    error_reporting(E_ALL ^ E_NOTICE);
}

global $errors, $lang, $modules;

include "../model/model.php";
include "validate.php";
include "share.php";
include "utils.php";

$modules = array ("activite", "blog", "coffret", "guide", "mh", "ville");

foreach ($modules as $module) {
    include "$module.php";
}

function isPOST () {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function addAlert ($type, $message) {
    global $errors, $conf;
    $errors[] = [ $type, $message ];    
    if ($conf["debug"]) {
        backTrace ();
    }
}

function alertCount () {
    global $errors;
    $count = 0;
    
    if (isset ($errors)) {
        foreach ($errors as $error) {
            if ($error[0] != 'success') {
                $count ++;
            }
        }
    }
    
    return $count;
}

function displayAlerts () {
    global $errors;

    if (isset ($errors)) {
        echo "<div class=container>";
        foreach ($errors as $error) {
            echo "<div class=\"alert alert-$error[0]\">$error[1]</div>";
        }
        echo "</div>";
        unset ($GLOBALS["errors"]); 
    }
}

function router () {
    global $modules, $lang, $db;
    
    if (isPOST ()) {
        // protection CSRF
        if (isset ($_SERVER['HTTP_REFERER']) &&
        preg_match ("|://" . $_SERVER['SERVER_NAME'] . "|", $_SERVER['HTTP_REFERER'])) {
            // ok
        } else {
            redirect ("http://www.google.com");
        }
    }

    if (isset ($_GET['action'])) {
        $action = preg_replace ("/[^\w]/", "", $_GET["action"]);
    } else {
        $action = "home";
    }

    if (isset ($_GET["lang"]) && !invalid_lang ($_GET["lang"])) {
        $lang = $_GET["lang"];
        setcookie ("lang", $lang);
    } elseif (isset ($_COOKIE["lang"]) && !invalid_lang ($_COOKIE["lang"])) {
        $lang = $_COOKIE["lang"];
    } else {
        $lang = "en";
    }

    db ($lang);

    if (preg_match ("/^(" . implode ("|", $modules) . ")([A-Z]\w+)$/", $action, $matches)) {
        if (function_exists ($action)) {
            $view = $action();
        } else {
            $view = $action;
        }
    }

    if (!isset ($view) || !file_exists ($view . ".php")) {
        $view = "home";
    }

    return $view;
}

function backTrace () {
    echo "<pre>";
    debug_print_backtrace ();
    echo "</pre>";
}

function httpError ($code) {
    global $conf;
    http_response_code ($code);
    displayAlerts ();
    if ($conf["debug"]) {
        backTrace ();
        error_log ("error " . $code);
    }
    exit (1);
}

function httpExit ($status = 0) {
    displayAlerts ();
    exit ($status);
}

function redirect ($url) {
    header ("Location: $url");
    exit (0);
}

function definedOrEmpty ($var) {
    return isset ($var) ? $var : "";
}
