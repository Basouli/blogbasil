<?php
//
require_once './model/Repository.php';
// CONNEXION _____________________________________________________________________________________________________________________________ CONNEXION
//Retourne true si une session existe
function isConnected() {
    if (!isset($_SESSION['user'])) return false;
    return $_SESSION['user']->getLogin() != null;
}

//Créer une session
function connect($user) {
    $_SESSION['user'] = $user;
}

function connectInvite() {
  if (!isset($_SESSION['user'])) {
      $_SESSION['user'] = new User(array('id_Droits' => 1, 'lang' => 'Fr'));
  }
}

//Détruit la session
function disconnect() {
    session_unset();
    session_destroy();
    destroyAllSession();
}

//Detruit une variable de session
function destroySession(String $variablesession) {
    if (isset($_SESSION[$variablesession])) {
        unset($_SESSION[$variablesession]);
    } else {
        return false;
    }
}

//Détruit toute les variables de session
function destroyAllSession() {
    if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        return false;
    } else {
        $helper = array_keys($_SESSION);
        foreach ($helper as $key){
            unset($_SESSION[$key]);
        }
    }
}

//Envois toute les variables de session
function getVariablesSession() {
    return $_SESSION;
}

function getCookies() {
    return $_COOKIE;
}

function destroyCookie($cookie) {
    $past = time() - 3600;
    setcookie($cookie, '', $past, '/blogbasil');
}

//Détruit tous les cookies
function destroyAllCookies() {
    $past = time() - 3600;
    foreach ($_COOKIE as $key => $value) {
        setcookie($key, $value, $past, '/blogbasil');
    }
}

function setConnexionCookies($user) {
    $token = random_int(10000, 99999);

    setcookie('blog_idUser', $user->getId(), time() + (+60*60*24*10), '/blogbasil'); //10 jours
    setcookie('blog_tokenUser', $token, time() + (+60*60*24*10), '/blogbasil');

    return $token;
}

// LANG _______________________________________________________________________________________________________________________________________// LANG

function getLang() {
    if (isConnected()) {
        require_once './include/variables/string/' . $_SESSION['user']->getLang() . '.php';
        return $_SESSION['user']->getLang();
    } else {
        if (!isset($_SESSION['lang'])) {
            $lang = array("id" => 0, "libelle" => "Français", "libelleShort" => "Fr");
            setlang($lang);
        }

        require_once './include/variables/string/' . $_SESSION['lang']['libelleShort'] . '.php';
        return $_SESSION['lang']['libelleShort'];
    }
}

function setlang($lang) {
    $_SESSION['lang'] = $lang;
}

// ______________________________________________________________________________________________________________________________________________

function getContent($adress) {

    ob_start();
      $model = new HomeModel();
      $params['categories'] = $model->findAllCategories();
      $params['droits'] = $model->findAllDroits();
      $articles = $model->findAllArticles();
      $params['commentaires'] = $model->findAllCommentaires();

      include_once($adress);
      $content = ob_get_clean();
    ob_end_clean();

    return $content;
}

function startHTML($includes) {
    require_once './view/doc/DocumentStartView.php';

    if ($includes != null) {
        foreach ($includes as $i) {
            $ext = substr($i, strlen($i) - 3);

            if ($ext == ".js") {
                echo '<script src="' . $i . '"></script>';
            } else if ($ext == "css") {
                echo '<link href="' . $i . '" rel="stylesheet">';
            }
        }
    }

    if (isset($_SESSION['alert'])) {
        require_once './view/doc/AlertView.php';
        unset($_SESSION['alert']);
    }
}

function getRedirectView($actionTitle, $contentToShow) {
    startHTML(array("./script/utils/ajax.js", "./script/element/LangScript.js", "./script/element/ReloadScript.js"));
    $pageTitle = APPNAME . " - " . $actionTitle;
    require_once './view/doc/DocumentStartBodyView.php';
    require_once './view/RedirectView.php';
}

function pluralize( $count, $text ) {
    return $count . ( ( $count == 1 ) ? ( " $text" ) : ( " ${text}s" ) );
}

function hasNecessaryIssets($issetNecessary, $params) {
    foreach ($issetNecessary as $isset) {
        if (!isset($params[$isset])) {
            return false;
        }
    }
    return true;
}

function hasNecessaryKeys($issetNecessary, $params) {
    foreach ($issetNecessary as $isset) {
        if (!array_key_exists($isset, $params)) {
            return false;
        }
    }
    return true;
}

// ALERTS ____________________________________________________________________________________________________________________________ ALERTS

function addAlert($msg) {
    $alerts = array();

    if (isset($_SESSION['alert'])) {
        foreach ($_SESSION['alert'] as $alert) {
            array_push($alerts, $alert);
        }
    }

    array_push($alerts, $msg);

    $_SESSION['alert'] = $alerts;
}

function isValidMailAdress($mail) {
    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
    if (preg_match($pattern, $mail)) {
        return true;
    } else {
        return false;
    }
}

//
?>
