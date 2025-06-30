<?php

interface Zivotinja {
    public function glasaSe();
}

class Macka implements Zivotinja {
    public $dlaka;

    public function glasaSe()
    {
        echo "mijau";
    }
}

$macka = new Macka();
$macka->glasaSe();