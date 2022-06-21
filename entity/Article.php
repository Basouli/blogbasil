<?php
//
require_once './model/HomeModel.php';
require_once './entity/Commentaire.php';
//
class Article implements JsonSerializable {

    private $id;
    private $article;
    private $id_utilisateur;
    private $id_categorie;
    private $date;
    private $commentaires;

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

        $model = new HomeModel();
        $filters = array('id_article' => $this->id);
        $this->commentaires = $model->findAllCommentairesWithFilter($filters);
    }

    public function getId() {
        return $this->id;
    }

    public function getArticle() {
        return $this->article;
    }

    public function getIdUtilisateur() {
        return $this->id_utilisateur;
    }

    public function getIdCategorie() {
        return $this->id_categorie;
    }

    public function getDate() {
        return $this->date;
    }

    public function getCommentaires() {
      return $this->commentaires;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
?>
