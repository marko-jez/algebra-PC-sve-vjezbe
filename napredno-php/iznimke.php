<?php

function izracunajDjeljivost() {
    $a = 10;
    $b = 0;
    return $a / $b;
}

try {
    izracunajDjeljivost();
    echo "rezultat";
} catch (DivisionByZeroError $e){
    echo "nije moguće dijeliti s nulom!";

}

function provjeriBroj($broj) {
    if($broj > 1)
    throw new Exception(" Greška nekakava ");
    return true;
} 

echo "<br>" . "<br>";


try {
    provjeriBroj(3);
} catch(Exception $e) {
    echo "Broj ne valja" . $e->getMessage();
}


class Database {
  private static $instance = null;
  private $connection;

  /*// privatni konstruktor sprječava direktno kreiranje objekta
  private function __construct() {
    $this->connection = new PDO('mysql:host=localhost;dbname=videoteka', 'user', 'pass');
  }

  // sprječava kloniranje objekta
  private function __clone() {}

  // sprječava deserijalizaciju
  private function __wakeup() {}

  // public metoda za kreiranje instance
  public static function getInstance() {
    // Database::$instance === null
    if (self::$instance === null) {
      self::$instance = new self(); // new Database();
    }
    return self::$instance;
  }

  public function getConnection() {
    return $this->connection;
  }
}

$baza = Database::getInstance();
$baza2 = Database::getInstance(); // isti objekt kao ovaj iznad
$baza->getConnection();
var_dump($baza === $baza2); // true         */

class Bazapodataka {
    private static $instanca = null;

    private function __construct()
    {
        echo "Nešto";
    }

    private function __clone() {}

    private function __wakeup() {}

    public static function dohvacanje() {
        if(self::$instanca === null) {
        self::$instanca = new self();
        } 
        return self::$instanca;
    }
}

$bazaPodataka = Bazapodataka::dohvacanje();
