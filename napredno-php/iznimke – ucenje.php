<?php 

function unesiBrojeve() {
  $broj1 = 5;
  $broj2 = 0;

  if($broj2 == 0) {
    throw new Exception("Dijeljenje s nulom nije dozvoljeno");
  }

  return $broj1 / $broj2;
}

try {
  $rezultat = unesiBrojeve();
  echo "Rezultat dijeljenja je: " . $rezultat;
} catch (Exception $e) {
  echo "Greška: " . $e->getMessage();
}

echo "<br>" . "<br>";

function izracunProsjeka($zbroj, $brojOcjena) {
  if($brojOcjena == 0) {
    throw new Exception("Nije moguće izračunati prosjek jer je broj oscjena 0");
  }
  return $zbroj / $brojOcjena;
}

try {
  $prosjek = izracunProsjeka(28, 0);
  echo "Prosjek ocjena je: " . $prosjek;
} catch(Exception $e) {
  echo "Greška: " . $e->getMessage() . "<br>";
} finally {
  echo "Nema više ocjena";
}
echo "<br>" . "<br>";

function pogresanType(int $a, int $b) {
  return $a + $b;
}

try {
  pogresanType("Marko", 2);
} catch(TypeError $e) {
  echo "Pogrešan tip podatka: " . $e->getMessage();
}
echo "<br>" . "<br>";

try {
  echo "Rezultat je: " . $rezultat = 10 /0;
} catch(DivisionByZeroError $e) {
  echo "Greška: dijelio si s nulom! - " . $e->getMessage();
}
echo "<br>" . "<br>";

function laganiZbroj($a, $b) {
  return $a + $b;
}

try {
  laganiZbroj(4);
} catch(ArgumentCountError $e) {
  echo "Greška: " . $e->getMessage();
}