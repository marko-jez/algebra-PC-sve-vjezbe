<?php

namespace App\Core;

use PDO;

class  Database {
  private static $instance = null;
  private $connection;

  private function __construct()  {
    try {
      $this->connection = new \PDO("mysql:host=localhost;dbname=trgovina", "root", "");
      $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    } catch(\PDOException $e) {
      die("Neuspješna konekcija na bazu: " . $e->getMessage());
    }
  }

  private function __clone() {}

  public function __wakeup() {}

  public static function getInstance() {
    if(self::$instance === null) {
      self::$instance = new self();
    }
    return self::$instance;
  } 

  public function getConnection() {
    return $this->connection;
  }
}