<?php

class Bazapodataka {
    private static $instanca = null;

    private function __construct()
    {
        echo "Nešto";
    }

    private function __clone() {}

    public function __wakeup() {}

    public static function dohvacanje() {
        if(self::$instanca === null) {
        self::$instanca = new self();
        } 
        return self::$instanca;
    }
}

$bazaPodataka = Bazapodataka::dohvacanje();