<?php
//
require_once './model/Repository.php';
require_once './entity/User.php';
//
class ConnexionModel extends Repository {

    // INSERT /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// INSERT

    public function insertUser($pseudo, $password, $mail, $droits) {
        $pass_hache = password_hash($password, PASSWORD_DEFAULT);

        $requestPrepare = $this->pdo->prepare(
            'INSERT INTO utilisateurs (login, password, email, id_droits) '
            . 'VALUES (:Login, :Password, :Mail, :Droits);'
        );
        $requestPrepare->bindParam(':Login', $pseudo, PDO::PARAM_STR);
        $requestPrepare->bindParam(':Password', $pass_hache, PDO::PARAM_STR);
        $requestPrepare->bindParam(':Mail', $mail, PDO::PARAM_STR);
        $requestPrepare->bindParam(':Droits', $droits, PDO::PARAM_INT);
        $requestPrepare->execute();
        return $requestPrepare;
    }

    // FIND ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// FIND

    public function findAllUser() {
        $sql = "SELECT * FROM utilisateurs;";
        $request = $this->pdo->query($sql);
        return $request->fetchAll(PDO::FETCH_CLASS, User::class);
    }

    public function findUserById($id) {
        $sql = "SELECT * "
              . "FROM utilisateurs "
              . "WHERE id=:id;";
        $request = $this->pdo->prepare($sql);
        $request->bindValue(':id', $id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchObject(User::class);
    }

    public function findUserByMail($mail) {
        $sql = "SELECT * "
              . "FROM utilisateurs "
              . "WHERE email=:Mail;";
        $request = $this->pdo->prepare($sql);
        $request->bindValue(':Mail', $mail, PDO::PARAM_STR);
        $request->execute();
        return $request->fetchObject(User::class);
    }

    public function findUserByLogin($login) {
        $sql = "SELECT * "
              . "FROM utilisateurs "
              . "WHERE login=:login;";
        $request = $this->pdo->prepare($sql);
        $request->bindValue(':login', $login, PDO::PARAM_STR);
        $request->execute();
        return $request->fetchObject(User::class);
    }

    // UPDATE /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// UPDATE

    public function updateUserPassword($id, $password) {
        $requestPrepare = $this->pdo->prepare(
            'UPDATE user SET password = :Password '
            . 'WHERE id=:Id;'
        );
        $requestPrepare->bindParam(':Id', $id, PDO::PARAM_INT);
        $requestPrepare->bindParam(':Password', $password, PDO::PARAM_STR);
        $requestPrepare->execute();
        return $requestPrepare;
    }

}
//
?>
