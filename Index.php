<?php
//
require_once './include/functions.php';
require_once './controller/HomeController.php';
require_once './include/config.php';
//
$controllerName = filter_input(INPUT_GET, 'c', FILTER_SANITIZE_STRING);
$a = filter_input(INPUT_GET, 'a', FILTER_SANITIZE_STRING);

session_start();

if ($controllerName != 'HomeController') {
    $controllerName = 'HomeController';
}
$c = new $controllerName;

if (empty($a) || !in_array($a, array("home", "play", "simulation", "explain", "contact"))) {
    $a = 'home';
}

//$p = array(array_filter($_REQUEST));
$p = array(filterRequest());

call_user_func_array(array($c, $a), $p);

require_once './view/doc/DocumentEndView.php';

//debugTrace();
//cleanDatas();

// FONCTIONS ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// FONCTIONS

function filterRequest() {
    $finalArray = array();

    foreach($_POST as $key => $value) {
        if (is_string($value)) {
            $finalArray[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
        } else if (is_int($value)) {
            $finalArray[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_NUMBER_INT);
        } else if ($value == null) {
            $finalArray[$key] = "";
        } else {
            $finalArray[$key] = "error";
        }
    }

    foreach($_GET as $key => $value) {
        if (is_string($value)) {
            $finalArray[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_STRING);
        } else if (is_int($value)) {
            $finalArray[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_NUMBER_INT);
        } else if ($value == null) {
            $finalArray[$key] = "";
        } else {
            $finalArray[$key] = "error";
        }
    }

    return $finalArray;
}

function debugTrace() {
    echo '';
    echo 'COOKIES :';
    var_dump(getCookies());
    echo '';
    echo 'SESSIONS :';
    var_dump(getVariablesSession());
}

function cleanDatas() {
    destroyAllCookies();
    destroyAllSession();
    session_destroy();
}
?>
