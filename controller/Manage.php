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

      $this->model->insertArticle($params['submitArticle'], $_SESSION['user']->getId(), $params['selectCategorie']);
      $this->redirectWithAlert('identification', 'Article ajouté avec succès.');

    } else {
      $this->redirectWithAlert('identification', 'Erreur, l\'article n\'a pas pu être créé.');
    }
  }

  public function modify($params) {
    if (isset($params['type']) && isset($params['id'])) {

        $element = $this->model->get($params['type'], $params['id']);

        if ($element != null) {
            $this->getModifyView($element, $params['type'], $params['id']);
        } else {
            $this->redirectWithAlert('run', 'Erreur lors de la requete');
        }

    } else {
      $this->redirectWithAlert('run', 'Erreur lors de la requete');
    }
  }

  public function updateGeneric($params) {
      switch ($params['type']) {
        case "User":
          $this->model->updateUser($params['submitlogin'], $params['submitpassword'], $params['submitemail'], $params['submitid_droits'], $params['submitid']);
          break;

        case "Article":
          $this->model->updateArticle($params['submitarticle'], $params['submitid_utilisateur'], $params['submitid_categorie'], $params['submitdate'], $params['submitid']);
          break;

        case "Commentaire":
          $this->model->updateCommentaire($params['submitcommentaire'], $params['submitid_article'], $params['submitid_utilisateur'], $params['submitdate'], $params['submitid']);
          break;

        case "Droit":
          $this->model->updateDroit($params['submitnom'], $params['submitid']);
          break;

        case "Categorie":
          $this->model->updateCategorie($params['submitnom'], $params['submitid']);
          break;

        default: break;
      }
      $this->redirectWithAlert('run', 'Modification réussie !');
  }

  public function delete($params) {
    if (isset($params['type']) && isset($params['id'])) {
      $this->model->deleteGeneric($params['type'], $params['id']);
      $this->redirectWithAlert('run', 'Suppression réussie !');
    } else {
      $this->redirectWithAlert('run', 'Erreur lors de la requete');
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

  function getModifyView($element, $type, $id) {
      $a = "modify";
      startHTML(array()); //"./script/element/ReloadScript.js"

      $pageTitle = APPNAME . " - Modifier";
      require_once './view/doc/DocumentStartBodyView.php';
      require_once './view/update/basicModifyView.php';
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
