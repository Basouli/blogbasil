<?php
//
require_once './model/Repository.php';
require_once './entity/Article.php';
require_once './entity/Commentaire.php';
//
class HomeModel extends Repository {

  // FIND //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// FIND

  public function findOneArticles($idArticle) {
      $sql = "SELECT * FROM articles WHERE id=:IdArticle;";
      $request = $this->pdo->prepare($sql);
      $request->bindValue(':IdArticle', $idArticle, PDO::PARAM_INT);
      $request->execute();
      return $request->fetchObject(Article::class);
  }

  public function findAllArticles() {
      $sql = "SELECT * FROM articles;";
      $request = $this->pdo->prepare($sql);
      $request->execute();
      return $request->fetchAll(PDO::FETCH_CLASS, Article::class);
  }

  public function findAllArticlesWithFilter($filters) {
      $wheres = "";
      if (count($filters) > 0) {
        $wheres = " WHERE ";
        foreach ($filters as $key => $value) {
            $wheres .= $key . "='" . $value . "' AND ";
        }
        $wheres = substr($wheres, 0, -5);
      }

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

  //Update ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// Update

  public function updateUser($submitLogin, $submitPassword, $submitMail, $selectDroits, $idUtilisateur) {
    $requestPrepare = "";
    if ($submitPassword != null) {
      $requestPrepare = $this->pdo->prepare(
          'UPDATE utilisateurs SET login=:Login, password=:Password, email=:Email, id_droits=:IdDroits WHERE id=:IdUtilisateur;'
      );
    } else {
      $requestPrepare = $this->pdo->prepare(
          'UPDATE utilisateurs SET login=:Login, email=:Email, id_droits=:IdDroits WHERE id=:IdUtilisateur;'
      );
    }
    $requestPrepare->bindParam(':Login', $submitLogin, PDO::PARAM_STR);
    $requestPrepare->bindParam(':Email', $submitMail, PDO::PARAM_STR);
    if ($submitPassword != null) {
      $requestPrepare->bindParam(':Password', password_hash($submitPassword, PASSWORD_DEFAULT), PDO::PARAM_STR);
    }
    $requestPrepare->bindParam(':IdDroits', $selectDroits, PDO::PARAM_INT);
    $requestPrepare->bindParam(':IdUtilisateur', $idUtilisateur, PDO::PARAM_INT);
    $requestPrepare->execute();
    return $requestPrepare;
  }

}
