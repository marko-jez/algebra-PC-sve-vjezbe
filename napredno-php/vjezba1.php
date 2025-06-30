<?php

abstract class Zivotinja {
    public $ime;

    public function spavaj() {
        echo "ZZzzzZz";
    }

    abstract public function glasajSe();
}

class Pas extends Zivotinja {
    public function glasajSe()
    {
        echo "Vau Vau";
    }

    public function spavaj()
    {
        echo "ZZzZzZ";
    }
}



$pas = new Pas();
$pas->ime = "Rex";
$pas->spavaj();
$pas->glasajSe();

echo "<br>" . "<br>";

abstract class Vozilo {
    public $naziv;
    public $brojKotaca;

    public function info() { 
        echo "Naziv vozila je: " . $this->naziv . "<br>";
        echo "Broj kotača na vozilu: " . $this->brojKotaca . "<br>";
    }

    abstract public function pokreni();
}

class Automobil extends Vozilo {
    public function pokreni() {
        echo "Automobil pali motor i kreće";
    }
}

class Bicikl extends Vozilo {
    public function pokreni() {
      echo "Bicikl se pokreće pedaliranjem";  
    }
}

$automobil = new Automobil();
$automobil->naziv = "Mečka";
$automobil->brojKotaca = 4;

$bicikl = new Bicikl();
$bicikl->naziv = "Capriolo";
$bicikl->brojKotaca = 2;

$automobil->info();
$automobil->pokreni();

$bicikl->info();
$bicikl->pokreni();