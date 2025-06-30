<?php

class Kolac {
   public $okus;
   public $velicina;
   public $cijena; 

   public function prikazKolaca() {
    echo "Kolac je od " . $this->okus . " i veličine " . $this->velicina . " i košta €" . $this->cijena;
   }
}

$kolacCokoladni = new Kolac();

$kolacCokoladni->okus = "Čokolada";
$kolacCokoladni->velicina = "Veliki";
$kolacCokoladni->cijena = 50;

$kolacCokoladni->prikazKolaca();

echo "<br>";
echo "<br>";

class Ruksak {
    public $boja;
    public $kapacitet;
    public $cijena;

    public function prikaziRuksak() {
        echo "Ruksak boje $this->boja, kapaciteta $this->kapacitet L, košta $this->cijena €";
    }
}

$ruksak1 = new Ruksak();
$ruksak1->boja = "plava";
$ruksak1->kapacitet = 30;
$ruksak1->cijena = 60;

$ruksak1->prikaziRuksak();

echo "<br>";

class Knjiga {
    public $naslov;

    public function prikaziNaslov() {
        echo "Naslov knjige je: " . $this->naslov;
    }
}

$knjiga = new Knjiga();
$knjiga->naslov = "Snjeguljica";

$knjiga->prikaziNaslov();

echo "<br>";
echo "<br>";

class Osoba {
    public $ime;
    public $prezime;

    public function __construct($ime, $prezime) {
        $this->ime = $ime;
        $this->prezime = $prezime;
    }
}

$osoba = new Osoba("Ana", "Anić"); // automatski poziva konstruktor

echo "<br>";
echo "<br>";

class Glumac {
    public $ime;
    public $prezime;

    public function __construct($_ime, $_prezime) {
        $this->ime = $_ime;
        $this->prezime = $_prezime;
    }

    public function imeGlumca() {
        echo "Ime i prezime glumca je: $this->ime $this->prezime";
    }

}

$glumac1 = new Glumac("John", "Travolta");
$glumac1->imeGlumca();

echo "<br>";
echo "<br>";

class Gost {
    public $ime;
    public $godine;

    public function __construct($_ime, $_godine) {
        $this->ime = $_ime;
        $this->godine = $_godine;
    }

    public function predstaviSe() {
        echo "Bok! Ja sam $this->ime i imam $this->godine godina. <br>";
    }
}

$gost1 = new Gost("Jelena", 27);
$gost2 = new Gost("Karlo", 19);
$gost3 = new Gost("Marija", "malo");

$gost1->predstaviSe();
$gost2->predstaviSe();
$gost3->predstaviSe();

echo "<br>";
echo "<br>";

// class Auto {
//     public $naziv;
//     public $boja;

//     public function __construct($_naziv, $_boja)
//     {
//         $this->naziv = $_naziv;
//         $this->boja = $_boja;   
//     }

//     public function __destruct()
//     {
//         echo "Automobil $this->naziv više ne postoji u aplikaciji";
//     }
// }

// $auto1 = new Auto("Mercedes", "siva");

// echo "<br>";
// echo "<br>";

class Mobitel {
    private $model;

    public function setMobitel($model) {
        return $this->model = $model;
    }

    public function getMobitel() {
        return $this->model;
    }
}

$mobitel1 = new Mobitel();
// $mobitel1->model = "Samsung";

$mobitel1->setMobitel("Samsung");

echo $mobitel1->getMobitel();

echo "<br>";
echo "<br>";

class Laptop {
    private $model;

    public function setLaptop($_model) {
        return $this->model = $_model;
    }

    public function getLaptop() {
        return $this->model;
    }
}

$laptop1 = new Laptop();
$laptop2 = new Laptop();

$laptop1->setLaptop('Lenovo');
$laptop2->setLaptop('HP');

echo $laptop1->getLaptop();
echo "<br>";
echo $laptop2->getLaptop();