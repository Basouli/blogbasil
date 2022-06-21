<?php
//
class Categorie implements JsonSerializable {

    private $id;
    private $nom;

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
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
?>
