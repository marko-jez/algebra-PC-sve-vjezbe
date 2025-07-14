<?php

namespace App\Models;

use Core\Database;

class Article {
  private $db;

  public function __construct() {
    $this->db = Database::getInstance()->getConnection();
  }

  public function getAll() {
    $stmt = $this->db->prepare("SELECT * FROM clanci");
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function getById($id) {
    $stmt = $this->db->prepare("SELECT * FROM clanci WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch();
  }

  public function create($naslov, $tijelo) {
    $stmt = $this->db->prepare("INSERT INTO clanci (korisnikId, naslov, tijelo) VALUES (1, :naslov, :tijelo)");
    $stmt->bindParam(':naslov', $naslov);
    $stmt->bindParam(':tijelo', $tijelo);
    $stmt->execute();
  }

  public function update($id, $naslov, $tijelo) {
    $stmt = $this->db->prepare("UPDATE clanci SET naslov = :naslov, tijelo = :tijelo WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':naslov', $naslov);
    $stmt->bindParam(':tijelo', $tijelo);
    $stmt->execute();
  }

  public function delete($id) {
    $stmt = $this->db->prepare("DELETE FROM clanci WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
}