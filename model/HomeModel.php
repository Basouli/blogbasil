<?php
//
require_once './model/Repository.php';
require_once './entity/Article.php';
require_once './entity/Commentaire.php';
//
class HomeModel extends Repository {

  // FIND //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// FIND

  public function findAllArticles() {
      $sql = "SELECT * FROM articles;";
      $request = $this->pdo->prepare($sql);
      $request->execute();
      return $request->fetchAll(PDO::FETCH_CLASS, Article::class);
  }

  public function findAllArticlesWithFilter($filters) {
      $wheres = " WHERE ";
      foreach ($filters as $key => $value) {
          $wheres .= $key . "='" . $value . "' AND ";
      }
      $wheres = substr($wheres, 0, -5);

      $sql = "SELECT * FROM articles " . $wheres . ";";
      $request = $this->pdo->prepare($sql);
      $request->execute();
      return $request->fetchAll(PDO::FETCH_CLASS, Article::class);
  }

  public function findAllCommentaires() {
      $sql = "SELECT * FROM commentaires;";
      $request = $this->pdo->prepare($sql);
      $request->execute();
      return $request->fetchAll(PDO::FETCH_CLASS, Commentaire::class);
  }

  public function findAllCommentairesWithFilter($filters) {
      $wheres = " WHERE ";
      foreach ($filters as $key => $value) {
          $wheres .= $key . "='" . $value . "' AND ";
      }
      $wheres = substr($wheres, 0, -5);

      $sql = "SELECT * FROM commentaires " . $wheres . ";";
      $request = $this->pdo->prepare($sql);
      $request->execute();
      return $request->fetchAll(PDO::FETCH_CLASS, Commentaire::class);
  }

  // INSERT ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// dba_insert

  public function insertCommentaire($commentaireSubmit, $articleId, $id_utilisateur) {
    $requestPrepare = $this->pdo->prepare(
        'INSERT INTO commentaires (commentaire, id_article, id_utilisateur, date) '
        . 'VALUES (:Commentaire, :Id_article, :Id_utilisateur, now());'
    );
    $requestPrepare->bindParam(':Commentaire', $commentaireSubmit, PDO::PARAM_STR);
    $requestPrepare->bindParam(':Id_article', $articleId, PDO::PARAM_INT);
    $requestPrepare->bindParam(':Id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
    $requestPrepare->execute();
    return $requestPrepare;
  }

}
