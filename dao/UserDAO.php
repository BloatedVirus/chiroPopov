<?php

require_once( __DIR__ . '/DAO.php');

class UserDAO extends DAO {

  public function selectById($id)
  {
    $sql = "SELECT * FROM `users` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectByEmail($email){
    $sql = "SELECT * FROM `users` WHERE `email` = :email";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectJoinedProtests($user_id){
    $sql = "SELECT * FROM `protests` INNER JOIN `joined` WHERE `protests`.`id` = `joined`.`protest_id` AND `joined`.`user_id` = :user_id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllCreated($id){
    $sql = "SELECT * FROM `protests` WHERE `user_id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function insert($data)
  {
    $errors = $this->getValidationErrors($data);
    if (empty($errors)) {
      $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES (:username, :email, :password)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':username', $data['username']);
      $stmt->bindValue(':email', $data['email']);
      $stmt->bindValue(':password', $data['password']);
      if ($stmt->execute()) {
        $insertedId = $this->pdo->lastInsertId();
        return $this->selectById($insertedId);
      }
    }
    return false;
  }

  public function getValidationErrors($data)
  {
    $errors = array();
    if (empty($data['username'])) {
      $errors['username'] = 'vul een gebruikersnaam in';
    }
    if (empty($data['email'])) {
      $errors['email'] = 'Vul een email in';
    }
    if (empty($data['password'])) {
      $errors['password'] = 'vul een wachtwoord in';
    }
    return $errors;
  }

}
