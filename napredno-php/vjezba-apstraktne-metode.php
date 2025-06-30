<?php

abstract class Osoba {
    public $godine;

    public function brojGodina($_godine) {
        $this->godine = $_godine;
    }

    public function prikaziGodine() {
        echo "Osoba ima: " . $this->godine . "godina" . "<br>";
    }

    public abstract function zaposlenje();
}

class Student extends Osoba {
    public function zaposlenje()
    {
        echo "Osoba pohađa faks";
    }
}

class Profesor extends Osoba {
    public function zaposlenje()
    {
        echo "Osoba predaje na faksu";
    }
}

$student = new Student();
$student->brojGodina(22);
$student->zaposlenje();
echo "<br>";
echo $student->prikaziGodine();

echo "<br>";

$profesor = new Profesor();
$profesor->brojGodina(56);
$profesor->zaposlenje();


