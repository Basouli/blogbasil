<?php
//
class myPdo {

  	private static $connexion = null;
    private static $connexionInstance = null;

    private function __construct() {
        try {
            require_once './include/variables/' . ENV . 'PdoVariables.php';
          	$options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
          	self::$connexion = new PDO($server . ';dbname=' .  $db, $user, $password, $options);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function getConnexion() {
        if (is_null(self::$connexionInstance)) {
            self::$connexionInstance = new myPdo();
        }
        return self::$connexion;
    }

    public function __destruct() {
        myPdo::$connexionInstance = null;
    }

    /*
    public function createUser($pseudo, $password, $mail) {
        $pass_hache = password_hash($password, PASSWORD_DEFAULT);
        date_default_timezone_set('Europe/Paris');
        $today = date("Y/m/d");

        $requestPrepare = self::$connexion->prepare(
            'INSERT INTO user (pseudo, password, mail, date_inscription) '
            . 'VALUES (":vPseudo", ":vPassword", ":vMail", ":vDate");'
        );
        $requestPrepare->bindParam(':vPseudo', $pseudo, PDO::PARAM_STR);
        $requestPrepare->bindParam(':vPassword', $pass_hache, PDO::PARAM_STR);
        $requestPrepare->bindParam(':vMail', $mail, PDO::PARAM_STR);
        $requestPrepare->bindParam(':vDate', date($today), PDO::PARAM_STR);
        $requestPrepare->execute();
    }

    public function getUserById($id) {
        $requestPrepare = self::$connexion->prepare(
            'SELECT id, pseudo, password, token, mail, type '
            . 'FROM user '
            . 'WHERE id = :vId;'
        );
        $requestPrepare->bindParam(':vId', $id, PDO::PARAM_STR);
        $requestPrepare->execute();
        return $requestPrepare->fetch();
    }

    public function setToken($token, $id) {
        $requestPrepare = self::$connexion->prepare(
            'UPDATE user SET token=":vToken" '
            . 'WHERE id=":vId";'
        );
        $requestPrepare->bindParam(':vToken', $token, PDO::PARAM_STR);
        $requestPrepare->bindParam(':vId', $id, PDO::PARAM_STR);
        $requestPrepare->execute();
    }
    */

}
//
?>
