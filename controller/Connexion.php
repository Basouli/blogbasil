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

                  if (array_key_exists('keepConnect', $params)) {
                      $token = setConnexionCookies($user);
                      $this->model->updateUserToken(intval($user->getId()), $token);

                  } else {
                      //
                  }

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

// CONNECT HELPER //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// CONNECT HELPER

  public function cannotConnect($params) {
      $this->getBasicView('cannotConnect', CANNOTCONNECTTITLE, './view/element/CannotConnectView.php', array('contact', 'connexion'));
  }

  public function resendConfirmationMail($params) {
      $_SESSION['basicview-actionUrl'] = "?c=Connexion&a=resendConfirmationMailResend";
      $_SESSION['basicview-msg'] = CONFIRMATION_MAIL_INDICATOR_TXT;
      $this->getBasicView('resendConfirmationMail', RESEND_CONFIRMATION_MAIL, './view/element/inputMailView.php', array('rgpd', 'connexion'));
  }

  public function changePassword($params) {
      $_SESSION['basicview-actionUrl'] = "?c=Connexion&a=changePasswordSend";
      $_SESSION['basicview-msg'] = CHANGE_PASSWORD_INDICATOR_TXT;
      $this->getBasicView('changePassword', CHANGE_PASSWORD, './view/element/inputMailView.php', array('rgpd', 'connexion'));
  }

  public function sendLogin($params) {
      $_SESSION['basicview-actionUrl'] = "?c=Connexion&a=sendLogintest";
      $_SESSION['basicview-msg'] = SEND_LOGIN_INDICATOR_TXT;
      $this->getBasicView('sendLogin', SEND_LOGIN, './view/element/inputMailView.php', array('rgpd', 'connexion'));
  }

  // PASSWORD

  public function changePasswordSend($params) {
      if (isset($params['submitMail'])) {
          if (isValidMailAdress($params['submitMail'])) {
              $user = $this->model->findUserByMail($params['submitMail']);

              if ($user != null) {
                  $token = random_int(100000, 999999);

                  $this->model->updateUserToken($user->getId(), $token);

                  $mailParameters = array("MAIL" => $params['submitMail'],
                                          "TOKEN" => $token,
                                          "MSG" => CHANGEPASSWORD_MAIL_MSG,
                                          "VALID-CHANGE-PASSWORD-BTN" => CHANGEPASSWORD_MAIL_BTN
                                        );
                  sendTemplateMail($params['submitMail'], CHANGE_PASSWORD, './view/element/mail/changePasswordMailHTML.php', $mailParameters);
              }

              $this->redirectWithAlert('identification', CHANGEPASSWORD_MAIL_SENT);
          } else {
              $this->redirectWithAlert('identification', ERROR_INVALID_MAIL);
          }
      } else {
          $this->redirectWithAlert('identification', ERROR_MISSING_PARAMETERS);
      }
  }

  public function changePasswordView($params) {
      if (isset($params['mail']) && isset($params['token'])) {

          $user = $this->model->findTempUserByMail($params['mail']);
          if ($user == null) {
              $user = $this->model->findUserByMail($params['mail']);
          }
          if ($user != null && $user->getToken() == $params['token']) {

              $_SESSION['changePassword-userId'] = $user->getId();
              $this->getBasicView('changePassword', CHANGE_PASSWORD, './view/element/changePasswordView.php', array('rgpd', 'connexion'));

          } else {
              $this->redirectWithAlert('identification', ERROR_INVALID_LINK);
          }
      } else {
          $this->redirectWithAlert('identification', ERROR_MISSING_PARAMETERS);
      }
  }

  public function changePasswordTest($params) {
      if (isset($params['submitPassword']) && isset($params['submitPasswordBis']) && isset($_SESSION['changePassword-userId'])) {
          if ($params['submitPassword'] == $params['submitPasswordBis']) {
              $user = $this->model->findUserById($_SESSION['changePassword-userId']);
              unset($_SESSION['changePassword-userId']);
              $password_hache = password_hash($params['submitPassword'], PASSWORD_DEFAULT);
              $this->model->updateUserPassword($user->getId(), $password_hache);
              $now = new DateTime();
              $now->format('Y\-m\-d\ h:i:s');
              sendTemplateMail($user->getMail(), CHANGE_PASSWORD, './view/element/mail/confirmationUpdatedPassword.php', array("MSG" => UPDATED_PASSWORD_MAIL_MSG, "DATE" => $now));
              $this->redirectWithAlert('identification', CONFIRMATION_UPDATED_PASSWORD);
          } else {
              $this->redirectWithAlert('register', ERROR_PWD_UNSAME);
          }
      } else {
          $this->redirectWithAlert('register', ERROR_MISSING_PARAMETERS);
      }
  }

  // LOGIN

  public function sendLoginTest($params) {
      if (isset($params['mail'])) {
          if (isValidMailAdress($params['submitMail'])) {

          } else {
              $this->redirectWithAlert('identification', ERROR_INVALID_MAIL);
          }
      } else {
          $this->redirectWithAlert('identification', ERROR_MISSING_PARAMETERS);
      }
  }

// REGISTER PART ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// REGISTER PART

  public function register($params) {
      $this->getBasicView('identification', 'Inscription', './view/element/register.php', array());
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

  public function resendConfirmationMailResend($params) {
      if (isset($params['submitMail'])) {
          $tempUser = $this->model->findTempUserByMail($params['submitMail']);
          if ($tempUser != null) {
              sendConfirmationMail($params['submitMail'], $tempUser->getToken());
          }
      }

      $msg = MAIL_RESEND;
      addAlert($msg);

      header("Location: ?c=Connexion&a=identification");
  }

  public function mailConfirmation($params) {
      if (isset($params['mail']) && isset($params['token'])) {

          $tempUser = $this->model->findTempUserByMail($params['mail']);

          if ($tempUser != null && $tempUser->getToken() == $params['token']) {

              $loginExists = $this->model->loginExists($tempUser->getLogin());

              if ($loginExists == '0') {
                  $this->model->finaliseUserRegister($tempUser->getId());
                  $this->model->deleteTempUser($tempUser->getId());
                  $this->model->updateUserToken($tempUser->getId(), "");
                  $contentToShow = '<div class="relative w-full flex flex-col items-center space-y-16 lg:space-y-2 p-12 lg:p-8 text-center text-4xl lg:text-sm">
                      <div class="w-8 h-8">' . SVGALERT . '</div>
                      <p>' . MAIL_CONFIRM_SUCCESS . '</p>
                      <p>' . REDIRECT_MANUALY . '</p>
                    </div>';

                  getRedirectView(MAIL_CONFIRM, $contentToShow);

              } else {
                  $contentToShow = '<div class="relative w-full lg:w-1/4 flex flex-col items-center space-y-16 lg:space-y-2 p-12 lg:p-8 text-center text-4xl lg:text-sm">
                      <div class="w-8 h-8">' . SVGALERT . '</div>
                      <p>' . MAIL_CONFIRM_FAILURE . '</p>
                      <br/><br>
                      <p>' . ERROR_LOGIN_USED . '</p>
                    </div>';

                  $this->getBasicView('mailConfirmation', MAIL_CONFIRM, $contentToShow, array('contact', 'connexion'));
              }

          } else {
              $contentToShow = '<div class="relative w-full lg:w-1/4 flex flex-col items-center space-y-16 lg:space-y-2 p-12 lg:p-8 text-center text-4xl lg:text-sm">
                  <div class="w-8 h-8">' . SVGALERT . '</div>
                  <p>' . MAIL_CONFIRM_FAILURE . '</p>
                </div>';

              $this->getBasicView('mailConfirmation', MAIL_CONFIRM, $contentToShow, array('contact', 'connexion'));
          }
      } else {
          $this->redirectWithAlert('identification', ERROR_MISSING_PARAMETERS);
      }
  }

  public function insertUser($login, $password, $mail) {
      $insertresult = $this->model->insertUser($login, $password, $mail);
      if ($insertresult) {
          $this->redirectWithAlert('identification', CREATED_ACCOUNT);
      } else {
          $this->redirectWithAlert('register', ERROR_ACCOUNT_CREATING);
      }
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
