<?php

class KolekcijaKnjiga implements Iterator {
    public $knjige = [];
    public $pozicija = 0;

    public function dodajKnjigu($knjiga) {
        $this->knjige[] = $knjiga;
    }

    public function current() {
        return $this->knjige[$this->pozicija];
    }

    public function key() {
        return $this->pozicija;
    }

    public function next() {
        $this->pozicija++;
    }

    public function valid() {
        return isset($this->knjige[$this->pozicija]);
    }

    public function rewind() {
        $this->pozicija = 0;
    }
}

$novaKolekcija = new KolekcijaKnjiga();
$novaKolekcija->dodajKnjigu('Vlak u snijegu');
$novaKolekcija->dodajKnjigu('Pipi duga čarapa');
$novaKolekcija->dodajKnjigu('Striborova šuma');

foreach($novaKolekcija as $key => $knjiga) {
    echo "$key: $knjiga" . "<br>";
}

echo "<hr>";


class Korpa implements Iterator {
    private $artikli = [];
    private $pozicija = 0;

    public function dodaj($artikl) {
        $this->artikli[] = $artikl;
    }

    public function current() {
        return $this->artikli[$this->pozicija];
    }

    public function key() {
        return $this->pozicija;
    }

    public function next() {
        $this->pozicija++;
    }

    public function valid() {
        return isset($this->artikli[$this->pozicija]);
    }

    public function rewind() {
        $this->pozicija = 0;
    }

}

$mojaKorpa = new Korpa();
$mojaKorpa->dodaj('Kruh');
$mojaKorpa->dodaj('Mlijeko');
$mojaKorpa->dodaj('Sir');

foreach ($mojaKorpa as $key => $item) {
    echo "$key: $item<br>";
}

echo "<hr>";

class Playlist implements Iterator {
    private $pjesme = [];
    private $pozicija = 0;

    public function dodajPjesmu($naziv) {
        $this->pjesme[] = $naziv;
    }

    public function current() {
        return $this->pjesme[$this->pozicija];
    }

    public function key() {
        return $this->pozicija;
    }

    public function next() {
        $this->pozicija++;
    }

    public function valid() {
        return isset($this->pjesme[$this->pozicija]);
    }

    public function rewind() {
        $this->pozicija = 0;
    }
}

$kolekcijaPjesama = new Playlist();
$kolekcijaPjesama->dodajPjesmu('Bohemian Rhapsody');
$kolekcijaPjesama->dodajPjesmu('Imagine');
$kolekcijaPjesama->dodajPjesmu('I kissed a girl');

foreach($kolekcijaPjesama as $key => $pjesma) {
    echo "$key: $pjesma<br>";
}
