<?php

require_once( __DIR__ . '/DAO.php');

class LeadersDAO extends DAO {

  public function selectAllLeaders() {
    $sql = "SELECT * FROM `leaders`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectById($id) {
    $sql = "SELECT * FROM `leaders` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function countAllLeaders() {
    $sql = "SELECT COUNT(*) FROM `leaders`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // Filteren adhv action
  public function selectWithGroup($group){
    $sql = "SELECT * FROM `leaders` WHERE `group` = :group";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':group', $group);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
