<?php
//
require_once './model/ManageModel.php';
//
class Manage {

  private $model;
  private $user;
  private $langs;

  public function __construct() {
      $this->model = new ManageModel;
      $this->user = $_SESSION['user'];
      $this->langs = $this->model->findAllLang();
  }

  public function admin($params) {
    if ($_SESSION['user']->getDroits() == "1337") {
      $a = "admin";
      $elements = null;
      if (isset($params['elements'])) {
        $elements = $this->model->getAll($params['elements']);
      }

      startHTML(array());

      $pageTitle = APPNAME . " - Administration";
      require_once './view/doc/DocumentStartBodyView.php';
      require_once './view/AdministrationView.php';

    } else {
      $this->redirectWithAlert('identification', 'Vous devez être connecté avec un compte administrateur pour accéder à cette page.');
    }
  }

  public function createArticle() {
    if ($_SESSION['user']->getDroits() == "42" || $_SESSION['user']->getDroits() == "1337") {
        $this->getBasicView('Créer article', CONNECT, './view/element/CreateArticle.php', array());
    } else {
      $this->redirectWithAlert('identification', 'Vous devez être connecté avec un compte moderateur ou administrateur pour accéder à cette page.');
    }
  }

  public function submitCreateArticle($params) {
    if (isset($params['submitArticle']) && isset($params['selectCategorie'])) {
      //$_SESSION['user']->getId();
      date_default_timezone_set('Europe/Paris');
      $today = date("Y/m/d");

      $this->model->insertArticle($params['submitArticle'], $_SESSION['user']->getId(), $params['selectCategorie']);
      $this->redirectWithAlert('identification', 'Article ajouté avec succès.');

    } else {
      $this->redirectWithAlert('identification', 'Erreur, l\'article n\'a pas pu être créé.');
    }
  }

  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  function getBasicView($action, $actionTitle, $contentToShow, $navButtons) {
      $content = (substr($contentToShow, -4) == ".php") ? getContent($contentToShow) : $contentToShow;
      $a = $action;
      startHTML(array("./script/utils/ajax.js", "./script/element/LangScript.js")); //"./script/element/ReloadScript.js"

      $pageTitle = APPNAME . " - " . $actionTitle;
      require_once './view/doc/DocumentStartBodyView.php';
      require_once './view/basicView.php';
  }

  // REDIRECT //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// REDIRECT

  public function redirect($action) {
      header("Location: index.php?c=Connexion&a=" . $action);
  }

  public function redirectWithAlert($action, $msg) {
      addAlert($msg);
      $this->redirect($action);
  }

  public function errorIdentification() {
      $this->redirectWithAlert('identification&connexionError=1', ERROR_CONNECT);
  }

}
//
?>
