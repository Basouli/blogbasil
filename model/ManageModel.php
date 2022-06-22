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

  public function get($type, $id) {
    $finalObjet = $this->getBDDClassName($type);
    $sql = "SELECT * FROM ". $finalObjet . " WHERE id=:Id;";
    $request = $this->pdo->prepare($sql);
    $request->bindParam(':Id', $id, PDO::PARAM_INT);
    $request->execute();

    switch ($type) {
      case "User":
        return $request->fetchObject(User::class);

      case "Article":
        return $request->fetchObject(Article::class);

      case "Commentaire":
        return $request->fetchObject(Commentaire::class);

      case "Droit":
        return $request->fetchObject(Droit::class);

      case "Categorie":
        return $request->fetchObject(Categorie::class);

      default: break;
    }
  }

  private function getBDDClassName($objet) {
    switch ($objet) {
      case "User":
        return "utilisateurs";

      case "Article":
        return "articles";

      case "Commentaire":
        return "commentaires";

      case "Droit":
        return "droits";

      case "Categorie":
        return "categories";

      default: break;
    }
  }

  public function updateUser($login, $password, $email, $iddroits, $idUser) {
    $sql = "UPDATE utilisateurs SET login=:Login, password=:Password, email=:Email, id_droits=:IdDroits WHERE id=:Id;";
    $request = $this->pdo->prepare($sql);
    $request->bindValue(':Login', $login, PDO::PARAM_STR);
    $request->bindValue(':Password', $password, PDO::PARAM_STR);
    $request->bindValue(':Email', $email, PDO::PARAM_STR);
    $request->bindValue(':IdDroits', $iddroits, PDO::PARAM_INT);
    $request->bindValue(':Id', $idUser, PDO::PARAM_INT);
    $request->execute();
  }

  public function updateArticle($article, $id_utilisateur, $id_categorie, $date, $id) {
    $sql = "UPDATE articles SET article=:Article, id_utilisateur=:IdUtilisateur, id_categorie=:IdCategorie, date=:Date WHERE id=:Id;";
    $request = $this->pdo->prepare($sql);
    $request->bindValue(':Article', $article, PDO::PARAM_STR);
    $request->bindValue(':IdUtilisateur', $id_utilisateur, PDO::PARAM_INT);
    $request->bindValue(':IdCategorie', $id_categorie, PDO::PARAM_INT);
    $request->bindValue(':Date', $date, PDO::PARAM_STR);
    $request->bindValue(':Id', $id, PDO::PARAM_INT);
    $request->execute();
  }

  public function updateCommentaire($commentaire, $id_article, $id_utilisateur, $date, $id) {
    $sql = "UPDATE commentaires SET commentaire=:Commentaire, id_article=:IdArticle, id_utilisateur=:IdUtilisateur, date=:Date WHERE id=:Id;";
    $request = $this->pdo->prepare($sql);
    $request->bindValue(':Commentaire', $commentaire, PDO::PARAM_STR);
    $request->bindValue(':IdArticle', $id_article, PDO::PARAM_INT);
    $request->bindValue(':IdUtilisateur', $id_utilisateur, PDO::PARAM_INT);
    $request->bindValue(':Date', $date, PDO::PARAM_STR);
    $request->bindValue(':Id', $id, PDO::PARAM_INT);
    $request->execute();
  }

  public function updateDroit($nom, $idUser) {
    $sql = "UPDATE droits SET nom=:Nom WHERE id=:Id;";
    $request = $this->pdo->prepare($sql);
    $request->bindValue(':Nom', $nom, PDO::PARAM_STR);
    $request->bindValue(':Id', $id, PDO::PARAM_INT);
    $request->execute();
  }

  public function updateCategorie($nom, $id) {
    $sql = "UPDATE categories SET nom=:Nom WHERE id=:Id;";
    $request = $this->pdo->prepare($sql);
    $request->bindValue(':Nom', $nom, PDO::PARAM_STR);
    $request->bindValue(':Id', $id, PDO::PARAM_INT);
    $request->execute();
  }

  public function deleteGeneric($type, $id) {
    $finalType = "";

    switch ($type) {
      case "User":
        $finalType = "utilisateurs";
        break;

      case "Article":
        $finalType = "articles";
        break;

      case "Commentaire":
        $finalType = "commentaires";
        break;

      case "Droit":
        $finalType = "droits";
        break;

      case "Categorie":
        $finalType = "categories";
        break;

      default: break;
    }

    $sql = "DELETE FROM " . $finalType . " WHERE id=:Id;";
    $request = $this->pdo->prepare($sql);
    $request->bindValue(':Id', $id, PDO::PARAM_INT);
    $request->execute();
  }

}
