<?php
//
require_once './model/HomeModel.php';
//
class Home {

  private $model;
  private $user;
  private $langs;

  public function __construct() {
      $this->model = new HomeModel;
      $this->user = $_SESSION['user'];
      $this->langs = $this->model->findAllLang();
  }

  public function run($params) {
    $this->getBasicView('home', 'Accueil', './view/HomeView.php', array());
  }

  public function allArticles($params) {
    $categorie = "";
    $start = 0;
    if (isset($params['start'])) {
      $start = $params['start'];
    }
    $filter = array();
    if (isset($params['categorie'])) {
      $categorie = $params['categorie'];
      $filter = array('id_categorie' => $categorie);
    }
    $articles = $this->model->findAllArticlesWithFilter($filter);

    $nombreDePages = (int)(count($articles) / 5);
    $pageActuelle = ($start == 0) ? 0 : $start / 5;

    startHTML(array());

    $pageTitle = APPNAME . " - Tous les Articles";
    require_once './view/doc/DocumentStartBodyView.php';
    require_once './view/AllArticlesView.php';
  }

  public function postCommentaire($params) {
    if (!empty($params['commentaireSubmit']) && !empty($params['articleId'])) {
      $this->model->insertCommentaire($params['commentaireSubmit'], $params['articleId'], $_SESSION['user']->getId());
      $this->redirectWithAlert('run', 'Commentaire ajouté avec succès.');
    } else {
      $this->redirect('run');
    }
  }

  public function manageAccount($params) {
      $langs = $this->model->findAllLang();

      startHTML(array("./script/ManageAccountScript.js"));
      $pageTitle = APPNAME . " - " . ACCOUNT;
      require_once './view/doc/DocumentStartBodyView.php';
      require_once './view/ManageAccountView.php';
  }

  public function deconnexion($params) {
      destroyAllCookies();
      destroyAllSession();
      session_destroy();

      header('Location: index.php?c=Connexion&a=identification');
  }

	public function __call($methode, $params) {
      $this->run($params);

      /*
      if (preg_match("#^findBy#", $methode)) {
          return $this->noAction($methode, array_values($params[0]));
      }
      */
  }

  function getBasicView($action, $actionTitle, $contentToShow, $navButtons) {
      $content = (substr($contentToShow, -4) == ".php") ? getContent($contentToShow) : $contentToShow;

      startHTML(array("./script/utils/ajax.js", "./script/element/LangScript.js")); //"./script/element/ReloadScript.js"
      $a = $action;
      $pageTitle = APPNAME . " - " . $actionTitle;
      require_once './view/doc/DocumentStartBodyView.php';
      require_once './view/basicView.php';
  }

  public function redirect($action) {
      header("Location: index.php?c=Connexion&a=" . $action);
  }

  public function redirectWithAlert($action, $msg) {
      addAlert($msg);
      $this->redirect($action);
  }

}
//
?>
