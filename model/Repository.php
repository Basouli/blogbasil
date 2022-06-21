<?php
//
require_once './include/myPdo.php';
require_once './entity/Categorie.php';
require_once './entity/Droit.php';
//
class Repository {

    protected $pdo;

    function __construct() {
        $this->pdo = myPdo::getConnexion();
    }

    // FIND //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// FIND

    public function findAllLang() {
        $sql = "SELECT * FROM lang;";
        $request = $this->pdo->prepare($sql);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAllCategories() {
        $sql = "SELECT * FROM categories;";
        $request = $this->pdo->prepare($sql);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_CLASS, Categorie::class);
    }

    public function findAllDroits() {
        $sql = "SELECT * FROM droits;";
        $request = $this->pdo->prepare($sql);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_CLASS, Droit::class);
    }

    // UPDATE ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// UPDATE

    public function setLang($userId, $lang) {
        $sql = "UPDATE user SET lang=:Lang WHERE id=:Id;";
        $request = $this->pdo->prepare($sql);
        $request->bindValue(':Lang', $lang, PDO::PARAM_STR);
        $request->bindValue(':Id', $userId, PDO::PARAM_INT);
        $request->execute();
        return $request->rowCount();
    }

    // DELETE ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// DELETE

    public function delete($userId, $itemId, $type) {
        $sql = "DELETE FROM " . $type . " WHERE id=:Id AND FK_user_id=:UserId;";
        $request = $this->pdo->prepare($sql);
        $request->bindValue(':Id', $itemId, PDO::PARAM_INT);
        $request->bindValue(':UserId', $userId, PDO::PARAM_INT);
        $request->execute();
        return $request->rowCount();
    }

}
