<?php
//
require_once './model/Repository.php';
require_once './entity/User.php';
//
class UserModel extends Repository {

  private function updateListIndexes($userId, $listIndexes) {
      $sql = "UPDATE user SET listIndexes=:listIndexes WHERE FK_user_id=:FK_user_id;";
      $request = $this->pdo->prepare($sql);
      $request->bindValue(':FK_user_id', $userId, PDO::PARAM_INT);
      $request->bindValue(':listIndexes', $listIndexes, PDO::PARAM_STR);
      $request->execute();
      return $request->rowCount();
  }
  
}
