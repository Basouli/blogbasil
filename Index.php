<?php
//
$controllers = array('Connexion', 'Home', 'Manage');
for ($i = 0; $i < count($controllers); $i++) {
    $iController = './controller/' . $controllers[$i] . '.php';
    require_once $iController;
}
require_once './model/ConnexionModel.php';
require_once './include/config.php';
require_once './include/functions.php';
//
$controllerName = filter_input(INPUT_GET, 'c', FILTER_SANITIZE_STRING);
$a = filter_input(INPUT_GET, 'a', FILTER_SANITIZE_STRING);

session_start();

//Coupe la route ici s'il s'agit de webservice
if ($controllerName == 'WebService') {
    $c = new $controllerName;
    $p = array(filterRequest());
    echo call_user_func_array(array($c, $a), $p);
    return;
}

connectInvite();

if (!isConnected()) {
    if (isset($_COOKIE['blog_idUser']) && isset($_COOKIE['blog_tokenUser'])) {
        $model = new ConnexionModel;
        $userCookie = $model->findUserById($_COOKIE['blog_idUser']);

        if (!empty($userCookie)) {
            if ($userCookie->getToken() == $_COOKIE['blog_tokenUser']) {
                connect($userCookie);

                $token = setConnexionCookies($userCookie);
                $model->setToken(intval($userCookie->getId()), $token);

                $controllerName = 'Home';
                if (!isset($a)) {
                    $a = 'run';
                }
            } else {
                destroyCookies();
            }
        } else {
            destroyCookies();
        }
    }
}

if (empty($controllerName) || !in_array($controllerName, $controllers)) {
    $controllerName = 'Home';
}

if (!isset($a)) {
    $a = "identification";
}

getLang();

$c = new $controllerName;
$p = array(filterRequest()); //Paramètres
call_user_func_array(array($c, $a), $p);

require_once './view/doc/DocumentEndView.php';

debugTrace($controllerName, $a);
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

function debugTrace($c, $a) {
    echo "<script>console.warn('controller : ');console.log('" . $c . "');</script>";
    echo "<script>console.warn('action : ');console.log('" . $a . "');</script>";
    echo "<script>console.warn('COOKIES : ');console.log(" . json_encode(getCookies()) . ");</script>";
    echo "<script>console.warn('SESSIONS : ');console.log(" . json_encode(getVariablesSession()) . ");</script>";
}

function cleanDatas() {
    destroyAllCookies();
    destroyAllSession();
    session_destroy();
}
?>
