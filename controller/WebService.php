<?php
//
require_once './entity/User.php';
//
class WebService {

  private $model;
  private $response;
  private $user;

  public function __construct() {
      $this->user = $_SESSION['user'];
      $this->response = array();

      getLang();
  }

  public function __call($methode, $params) {
      $methodFunction = $this->getFunction($methode);

      if ($methodFunction != "error") {

          return call_user_func_array([$this, $methodFunction], $params);

      } else {
          return $this->setResponse(0, "Method doesn't exists", null);
      }

      /*
      if (!in_array($method, array_keys($this->functions))) {
          throw new BadMethodCallException();
      }

      if (preg_match("#^findBy#", $methode)) {
          return $this->noAction($methode, array_values($params[0]));
      }
      */

  }


}
//
?>
