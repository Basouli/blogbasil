<?php
//
class User implements JsonSerializable {

    private $id;
    private $login;
    private $password;
    private $email;
    private $id_droits;
    private $lang;

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

        if ($this->lang == null) {
          $this->lang = "Fr";
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getMail() {
        return $this->email;
    }

    public function getDroits() {
      return $this->id_droits;
    }

    public function getLang() {
      return $this->lang;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
