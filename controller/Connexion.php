<?php
//
class Connexion {

  private $model;
  private $langs;

  public function __construct() {
      $this->model = new ConnexionModel;
      $this->langs = $this->model->findAllLang();
  }

  public function identification($params) {
      $this->getBasicView('identification', CONNECT, './view/element/connect.php', array());
  }

  public function connect($params) {
      if (!empty($params['submitLogin']) && !empty($params['submitPassword'])) {
          $user = $this->model->findUserByLogin($params['submitLogin']);

          if ($user != null) {
              $pwd = $user->getPassword();
              if (password_verify($params['submitPassword'], $pwd)) {

                  connect($user);

                  header("Location: ?c=Home&a=run");

              } else {//Password not Ok
                  $this->errorIdentification();
              }
          } else { //Login not existing
              $this->errorIdentification();
          }

      } else { //Missing $_POST Parameters
          $this->identification($params);
      }

  }

// REGISTER PART ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// REGISTER PART

  public function register($params) {
      $this->getBasicView('identification', 'Inscription', './view/element/register.php', array());
  }

  // REDIRECT //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// REDIRECT

  public function redirect($action) {
      header("Location: index.php?c=Connexion&a=" . $action);
  }

  public function tempRegister($params) {
      if (isset($params['submitLogin']) && isset($params['submitPassword']) && isset($params['submitPasswordBis']) && isset($params['submitMail']) && isset($params['selectDroits'])) {
        	if ($params['submitPassword'] == $params['submitPasswordBis']) {
              if (isValidMailAdress($params['submitMail'])) {
                  $this->model->insertUser($params['submitLogin'], $params['submitPassword'], $params['submitMail'], $params['selectDroits']);
                  $this->redirectWithAlert('identification', 'Inscription Réussie');
              } else {
                  $this->redirectWithAlert('register', ERROR_INVALID_MAIL);
              }
          } else {
              $this->redirectWithAlert('register', ERROR_PWD_UNSAME);
          }
      } else {
          $this->redirectWithAlert('register', ERROR_MISSING_PARAMETERS);
      }

  }

  public function redirectWithAlert($action, $msg) {
      addAlert($msg);
      $this->redirect($action);
  }

  public function errorIdentification() {
      $this->redirectWithAlert('identification&connexionError=1', ERROR_CONNECT);
  }

  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  function getBasicView($action, $actionTitle, $contentToShow, $navButtons) {
      $content = (substr($contentToShow, -4) == ".php") ? getContent($contentToShow) : $contentToShow;

      startHTML(array("./script/utils/ajax.js", "./script/element/LangScript.js")); //"./script/element/ReloadScript.js"
      $a = $action;
      $pageTitle = APPNAME . " - " . $actionTitle;
      require_once './view/doc/DocumentStartBodyView.php';
      require_once './view/basicView.php';
  }

  // _CALL ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// _CALL

  public function __call($methode, $params) {
      $this->identification($params);
      /*
      if (preg_match("#^findBy#", $methode)) {
          return $this->noAction($methode, array_values($params[0]));
      }
      */
  }

}
//
?>
