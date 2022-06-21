<?php
//
require_once './model/Repository.php';
//
class ManageModel extends Repository {

  // INSERT /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// INSERT

  public function insertArticle($article, $id_utilisateur, $id_categorie) {
      $pass_hache = password_hash($password, PASSWORD_DEFAULT);

      $requestPrepare = $this->pdo->prepare(
          'INSERT INTO articles (article, id_utilisateur, id_categorie, date) '
          . 'VALUES (:Article, :Id_utilisateur, :Id_categorie, now());'
      );
      $requestPrepare->bindParam(':Article', $article, PDO::PARAM_STR);
      $requestPrepare->bindParam(':Id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
      $requestPrepare->bindParam(':Id_categorie', $id_categorie, PDO::PARAM_INT);
      $requestPrepare->execute();
      return $requestPrepare;
  }

}
