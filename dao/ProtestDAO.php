<?php

require_once( __DIR__ . '/DAO.php');

class ProtestDAO extends DAO {

  public function selectById($id) {
    $sql = "SELECT * FROM `protests` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectAllProtest() {
    $sql = "SELECT * FROM `protests`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function countAllProtest() {
    $sql = "SELECT COUNT(*) FROM `protests`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectByDateDesc() {
    $sql = "SELECT * FROM `protests` ORDER BY `date` DESC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllTags() {
    $sql = "SELECT * FROM `tags`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Filteren adhv action
  public function selectWithAction($movement){
    $sql = "SELECT * FROM `protests` WHERE `movement` = :movement";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':movement', $movement);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Filteren adhv time
public function selectWithTime($flow){
  $sql = "SELECT * FROM `protests` WHERE `flow` = :flow";
  $stmt = $this->pdo->prepare($sql);
  $stmt->bindValue(':flow', $flow);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Filteren adhv period
public function selectWithPeriod($stretch){
  $sql = "SELECT * FROM `protests` WHERE `stretch` = :stretch";
  $stmt = $this->pdo->prepare($sql);
  $stmt->bindValue(':stretch', $stretch);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



  public function insert($data) {
    $errors = $this->getValidationErrors($data);
    if (empty($errors)) {
      $sql = "INSERT INTO `protests` (`title`, `date`, `description`, `place`, `user_id`, `media`, `who`, `place_news`, `movement`, `flow`, `stretch`) VALUES (:title, :date, :description, :place, :user_id, :media, :who, :place_news, :movement, :flow, :stretch)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':title', $data['title']);
      $stmt->bindValue(':date', $data['date']);
      $stmt->bindValue(':description', $data['description']);
      $stmt->bindValue(':place', $data['place']);
      $stmt->bindValue(':user_id', $data['user_id']);
      $stmt->bindValue(':media', $data['media']);
      $stmt->bindValue(':who', $data['who']);
      $stmt->bindValue(':place_news', $data['place_news']);
      $stmt->bindValue(':movement', $data['movement']);
      $stmt->bindValue(':flow', $data['flow']);
      $stmt->bindValue(':stretch', $data['stretch']);
      if ($stmt->execute()) {
        $insertedId = $this->pdo->lastInsertId();
        return $this->selectById($insertedId);
      }
    }
    return false;
  }

  public function getValidationErrors($data) {
    $errors = array();
    if (empty($data['title'])) {
      $errors['title'] = 'vul een titel in';
    }
    if (empty($data['date'])) {
      $errors['date'] = 'Vul een datum in';
    }
    if (empty($data['description'])) {
      $errors['description'] = 'vul een beschrijving in';
    }
    if (empty($data['place'])) {
      $errors['place'] = 'vul een aantal plaats in';
    }
    if (empty($data['user_id'])) {
      $errors['user_id'] = 'vul een gebruikersnaam in';
    }
    if (empty($data['media'])) {
      $errors['media'] = 'Kies je media aandacht';
    }
    if (empty($data['who'])) {
      $errors['who'] = 'Kies wie je wilt bereiken';
    }
    if (empty($data['place_news'])) {
      $errors['place_news'] = 'Kies welke vorm van nieuws je wil bereiken';
    }
    if (empty($data['movement'])) {
      $errors['movement'] = 'Kies je actie';
    }
    if (empty($data['flow'])) {
      $errors['flow'] = 'Kies de tijd van je betoging';
    }
    if (empty($data['stretch'])) {
      $errors['stretch'] = 'Kies de periode van je betoging';
    }
    return $errors;
  }

}
