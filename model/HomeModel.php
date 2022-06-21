<?php
//
require_once './model/Repository.php';
//
class HomeModel extends Repository {

  // FIND //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// FIND

  public function findAllArticles() {
      $sql = "SELECT * FROM articles;";
      $request = $this->pdo->prepare($sql);
      $request->execute();
      return $request->fetchAll(PDO::FETCH_ASSOC);
  }

  public function findAllArticlesWithFilter($filters) {

    //

      $sql = "SELECT * FROM articles;";
      $request = $this->pdo->prepare($sql);
      $request->execute();
      return $request->fetchAll(PDO::FETCH_ASSOC);
  }

  public function findAllCommentaires() {
      $sql = "SELECT * FROM commentaires;";
      $request = $this->pdo->prepare($sql);
      $request->execute();
      return $request->fetchAll(PDO::FETCH_ASSOC);
  }

  public function findAllCommentairesWithFilter($filters) {

    //

      $sql = "SELECT * FROM commentaires;";
      $request = $this->pdo->prepare($sql);
      $request->execute();
      return $request->fetchAll(PDO::FETCH_ASSOC);
  }

}
