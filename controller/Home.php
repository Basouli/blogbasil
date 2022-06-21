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
    $this->getBasicView('identification', CONNECT, './view/HomeView.php', array());
  }

  public function move($params) {
      if (isset($params['moveListId'])) {
          $moveListId = (int)$params['moveListId'];
          $l = $this->model->findListById($this->user->getId(), $moveListId);
          $blocks = $this->model->findAllBlocksByListId($this->user->getId(), $l->getId());
          if ($l->getBlockIndexes() != '' && $l->getBlockIndexes() != null) {
              foreach ($blocks as $block) {
                  $l->addBlock($block);
              }
          }

          startHTML(array("./script/utils/ajax.js", "./script/MoveScript.js"));
          $pageTitle = APPNAME . " - " . MOVE_BLOCK_TITLE;
          require_once 'view/doc/DocumentStartBodyView.php';
          require_once 'view/MoveView.php';
      } else {
          //addAlert();
          $this->run($params);
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

}
//
?>
