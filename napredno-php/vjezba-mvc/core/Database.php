<?php

namespace Core;

use PDO;
use PDOException;

class Database {
  private static $instance;
  private $connection;

  private function __construct() {
    try {
      $this->connection = new PDO( "mysql:host=localhost;dbname=blogdb", "root", "");
      $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      die("Greška kod povezivanja na bazu: " . $e->getMessage());
    }
  }

  public static function getInstance() {
    if(!self::$instance) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function getConnection() {
    return $this->connection;
  }
}