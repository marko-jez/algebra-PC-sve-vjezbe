<?php

class Jedinstveni {
    private static $instance = null;

    private function __construct()
    {
        echo "Stvaranje novog konstruktora";
    }

    private function __clone() {}
    public function __wakeup() {}

    public static function getInstancu() {
        if(self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    } 
}

$instanca1 = Jedinstveni::getInstancu();
echo "<br>". "<br>";

class Logger {
    private static $instanca = null;

    private function __construct() {
        echo "Uspješno stvaranje Singletona" . "<br>";
    }

    private function __clone() {}

    public function __wakeup() {
        throw new \Exception("Ne možes deserijalizirati singleton");
    }

    public static function getInstanca() {
        if(self::$instanca === null) {
            self::$instanca = new self();
        }
        return self::$instanca;
    }

    public function log($poruka) {
        echo "[LOG]: " . date('Y-m-d h:i:s') . $poruka;
    }
}

$logger = Logger::getInstanca();
$logger->log(": Stvarnje singletona");