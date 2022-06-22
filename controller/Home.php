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

  public function detailsArticle($params) {
    $a = "detailsArticle";
    if (isset($params['id'])) {
      $selectedArticle = $this->model->findOneArticles($params['id']);

      startHTML(array());

      $pageTitle = APPNAME . " - Détails Article";
      require_once './view/doc/DocumentStartBodyView.php';
      require_once './view/DetailArticleView.php';
    } else {
      $this->redirect('run');
    }
  }

  public function allArticles($params) {
    $a = "allArticles";
    $params['categories'] = $this->model->findAllCategories();

    $start = 0;
    if (isset($params['start'])) {
      $start = $params['start'];
    }

    $filter = array();
    $categorie = (!isset($params['categorie']) || $params['categorie'] == "null") ? "null" : $params['categorie'];
    if ($categorie != "null") {
      $filter = array('id_categorie' => $categorie);
    }
    $articles = $this->model->findAllArticlesWithFilter($filter);

    $nombreDePages = ceil((count($articles) / 5));

    $pageActuelle = ($start == 0) ? 1 : (int)($start / 5)+1;

    $articles = array_slice($articles, $start, 5);

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

  public function profil($params) {
    $this->getBasicView('profil', 'Profil', './view/update/ProfilView.php', array());
  }

  public function updateProfil($params) {
    if (isset($params['submitLogin']) && isset($params['submitMail']) && isset($params['selectDroits'])) {
      $this->model->updateUser($params['submitLogin'], $params['submitPassword'], $params['submitMail'], $params['selectDroits'], $_SESSION['user']->getId());
      $this->redirectWithAlert('run', 'Profil mit à jour !');
    } else {
      $this->redirectWithAlert('run', 'Error lors de la mise à jour du profil. Profil inchangé');
    }
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
