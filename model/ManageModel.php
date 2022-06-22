<?php
//
require_once './model/Repository.php';
require_once './entity/User.php';
require_once './entity/Article.php';
require_once './entity/Commentaire.php';
require_once './entity/Droit.php';
require_once './entity/Categorie.php';
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

  public function getAll($objet) {
    $sql = "SELECT * FROM ". $objet . ";";
    $request = $this->pdo->prepare($sql);
    $request->execute();

    switch ($objet) {
      case "utilisateurs":
        return $request->fetchAll(PDO::FETCH_CLASS, User::class);

      case "articles":
        return $request->fetchAll(PDO::FETCH_CLASS, Article::class);

      case "commentaires":
        return $request->fetchAll(PDO::FETCH_CLASS, Commentaire::class);

      case "droits":
        return $request->fetchAll(PDO::FETCH_CLASS, Droit::class);

      case "categories":
        return $request->fetchAll(PDO::FETCH_CLASS, Categorie::class);

      default: break;
    }
  }

}
