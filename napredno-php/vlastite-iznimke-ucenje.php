<?php

/* class VlastitaIznimka extends Exception {
  public function __construct($poruka) {
    parent::__construct($poruka);   
  }

  public function __toString() {
    return "VlastitaIznimka: " . $this->getMessage();
  }
}

function registrirajKorisnika($ime, $godine) {
  if($godine < 18) {
    throw new VlastitaIznimka("Osoba $ime je maloljetnik, ima samo $godine godina");
  }
  echo "Korisnik $ime je uspješno registriran";
}

try {
  registrirajKorisnika("Marko", 22);
} catch(VlastitaIznimka $e) {
  echo $e;
} */

use function PHPSTORM_META\registerArgumentsSet;

echo "<br>" . "<br>";

class NedovoljanIznosException extends Exception {
  public function __construct($message) {
    parent::__construct($message);
  }

  public function __toString() {
    return "Nedovoljan iznos: " . $this->getMessage();
  }
}

function uplatiNaRacun($iznos) {
  if($iznos < 10) {
    throw new NedovoljanIznosException("Minimalni iznos za uplatu je $iznos €");
  }
  echo "Uplata od $iznos € je uspješno izvršena";
}

try {
  uplatiNaRacun(56);
} catch(NedovoljanIznosException $e) {
  echo $e;
}

echo "<br>" . "<br>";

class MaloljetanKorisnik extends Exception {
  public function __construct($poruka) {
    parent::__construct($poruka);
  }

  public function __toString() {
    return __CLASS__ . $this->getMessage();
  }

}

class PremaliIznosException extends Exception {
  public function __construct($poruka) {
    parent::__construct($poruka);
  }

  public function __toString() {
    return __CLASS__ . $this->getMessage();
  }
}

function registrirajKorisnika($ime, $godine, $iznos) {
  if($godine < 18) {
    throw new MaloljetanKorisnik(": Korisnik je maloljetan");
  } 

  if($iznos < 10) {
    throw new PremaliIznosException(": Iznos je nedovoljan");
  }
  return "Korisnik $ime je uspješno registriran i uplatio je iznos $iznos €";
}

try {
  echo registrirajKorisnika("Ivan", 45, 12);
} catch(MaloljetanKorisnik $m) {
  echo $m;
} catch(PremaliIznosException $p) {
  echo $p;
}

echo "<br>" . "<br>";

function provjeraBroja($broj) {
  if($broj > 5) {
    throw new Exception("Broj mora biti manji od 5");
  }
  return "Broj $broj je veći od 5";
}

try {
  echo provjeraBroja(8);
} catch(Exception $e) {
  echo "Greška: " . $e->getMessage();
}
echo "<br>" . "<br>";
// napravite vlastitu exception klasu koja nasljeduje Exception klasu i dodajte metodu errorMessage()
// ta metoda treba ispisivati podatke o liniji i datoteci gdje je greška nastala te mora ispisivati poruku
// hint: getLine(), getFile(), getMessage() su metode na Exception objektu kojima možete pristupiti

class ProvjeraBroja extends Exception {
  public function __construct($poruka) {
    parent::__construct($poruka); 
  }


}

function errorMessage($broj) {
    if($broj < 10) {
      throw new ProvjeraBroja("$broj Mora biti veći od 10");
    }
    return "Broj $broj je veći od 10";
  }

try {
  echo errorMessage(5);
} catch(ProvjeraBroja $p) {
  echo "Greška: " . $p->getMessage() . "<br>";
  echo "Linija greške: " . $p->getLine() . "<br>";
  echo "Putanja greške: " . $p->getFile();
}

