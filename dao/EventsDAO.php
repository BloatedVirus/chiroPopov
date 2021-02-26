<?php

require_once( __DIR__ . '/DAO.php');

class EventsDAO extends DAO {

  public function selectAllEvents() {
    $sql = "SELECT * FROM `events`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectById($id) {
    $sql = "SELECT * FROM `events` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectByDateDesc() {
    $sql = "SELECT * FROM `events` ORDER BY `date` DESC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function sortByName() {
    $sql = "";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

}
