<?php

require_once( __DIR__ . '/DAO.php');

class JoinDAO extends DAO {

  public function selectById($id)
  {
    $sql = "SELECT * FROM `joined` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function countAllJoined($id)
  {
    $sql = "SELECT COUNT(*) FROM `joined` WHERE `protest_id` =  :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function insert($data)
  {
    $errors = $this->getValidationErrors($data);
    if (empty($errors)) {
      $sql = "INSERT INTO `joined` (`protest_id`, `user_id`) VALUES (:protest_id, :user_id);";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':protest_id', $data['protest_id']);
      $stmt->bindValue(':user_id', $data['user_id']);
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
    if (empty($data['protest_id'])) {
      $errors['protest_id'] = 'vul een protest_id in';
    }
    if (empty($data['user_id'])) {
      $errors['user_id'] = 'Vul een user_id in';
    }
    return $errors;
  }

}
