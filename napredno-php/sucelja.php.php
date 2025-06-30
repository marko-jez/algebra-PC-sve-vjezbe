<?php

interface Oblik {
    public function izracunaj();
}

class Krug implements Oblik {
    public $r = 2;

    public function izracunaj(){
        return $this->r * 5;
    }
}

class Pravokutnik implements Oblik {
    public $sirina = 10;
    public $visina = 20;

    public function izracunaj() {
        return $this->sirina + $this->visina;
    }
}

$krug = new Krug();
echo "Rezulata množenja je: " . $krug->izracunaj();
echo "<br>". "<br>";
$pravokutnik = new Pravokutnik();
echo "Rezultat zbrajanja je: " . $pravokutnik->izracunaj();

echo "<br>". "<br>";

interface Sabiranje {
    public function saberi($a, $b);
    public function pomnozi($a, $b);
}

class Kalkulator implements Sabiranje {
    public function saberi($a, $b) {
        return $a + $b;
    }

    public function pomnozi($a, $b)
    {
        return $a * $b;
    }
}

$kalkulator = new Kalkulator();
echo "Rezultat zbrajanja je: " . $kalkulator->saberi(5, 3) . "<br>";
echo "Rezultat množenja je: " . $kalkulator->pomnozi(5, 3) . "<br>";

echo "<br>". "<br>";

interface Zbrajanje {
    public function zbroji($a, $b);
}

interface Mnozenje {
    public function mnozenje($a, $b);
}

abstract class OsnovniKalkulator {
    abstract public function opis();
    
    public function pozdrav() {
        echo "Dobrodošli u kalkulator" . "<br>";
    }
}

class MojKalkulator extends OsnovniKalkulator implements Zbrajanje, Mnozenje {
    public function opis() {
        echo "Ovo je moj kalkulator";
    }

    public function zbroji($a, $b)
    {
        return $a + $b;
    }

    public function mnozenje($a, $b)
    {
        return $a * $b;
    }
}

$mojKalkulator = new MojKalkulator();
$mojKalkulator->pozdrav();
echo "Zbrajanje: " . $mojKalkulator->zbroji(10, 5) . "<br>";
echo "Množenje: " . $mojKalkulator->mnozenje(3, 9) . "<br>";
$mojKalkulator->opis();
