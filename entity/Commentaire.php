<?php
//
require_once './model/ConnexionModel.php';
require_once './entity/User.php';
//
class Commentaire implements JsonSerializable {

    private $id;
    private $commentaire;
    private $id_utilisateur;
    private $nomUtilisateur;
    private $id_article;
    private $date;

    public function __construct($params = null) {
        if (!is_null($params)) {
            foreach ($params as $cle => $valeur) {
                if (strlen($valeur) > 0) {
                    $this->$cle = $valeur;
                } else {
                    $this->$cle = null;
                }
            }
        }

        $userModel = new ConnexionModel();
        $this->nomUtilisateur = $userModel->findUserById($this->id_utilisateur)->getLogin();
    }

    public function getId() {
        return $this->id;
    }

    public function getCommentaire() {
        return $this->commentaire;
    }

    public function getIdUtilisateur() {
        return $this->id_utilisateur;
    }

    public function getNomUtilisateur() {
      return $this->nomUtilisateur;
    }

    public function getIdArticle() {
        return $this->id_article;
    }

    public function getDate() {
        return $this->date;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
?>
