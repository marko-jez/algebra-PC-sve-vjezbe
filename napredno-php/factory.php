<?php

interface Vozilo {
    public function kreni();
    public function stani();
}

class Automobil implements Vozilo {
    public function kreni() {
        echo "Automobil kreće";
    }

    public function stani() {
        echo "Automobil je stao";
    }
}

class Bicikl implements Vozilo {
    public function kreni() {
        echo "Bicikl kreće";
    }

    public function stani() {
        echo "Bicikl staje";
    }
}

class Avion implements Vozilo {
     public function kreni() {
        echo "Avion uzlijeće";
    }

    public function stani() {
        echo "Avion slijeće";
    }
}

class VozilaFactory {
    public static function stvaranjeVozila($tipVozila) {
        switch($tipVozila) {
            case 'automobil': return new Automobil();
            case 'bicikl': return new Bicikl();
            case 'avion': return new Avion();
            default:
                throw new InvalidArgumentException("Nije unešen dobar argument");
        }
    }
}

$bicikl = VozilaFactory::stvaranjeVozila('bicikl');
echo $bicikl->kreni();
echo "<br>";
$avion = VozilaFactory::stvaranjeVozila('avion');
echo $avion->kreni();

echo "<br>" . "<br>";
echo "<hr>";
echo "<h2>Notifikacije</h2>";

interface Obavijest {
    public function posalji($poruka);
}

class EmailObavijest implements Obavijest {
    public function posalji($poruka) {
        echo "Šaljem email: $poruka";
    }
}

class SMSObavijest implements Obavijest {
    public function posalji($poruka) {
        echo "Šaljem SMS: $poruka";
    }
}

class PushObavijest implements Obavijest {
    public function posalji($poruka) {
        echo "Šaljem push notifikaciju: $poruka";
    }
}

/* class ObavijestFactory {
    public static function napravi($tip) {
        switch($tip) {
            case 'email': return new EmailObavijest();
            case 'sms': return new SMSObavijest();
            case 'push': return new PushObavijest();
            default:
                throw new Exception("Nepoznat tip");
        }
    }
} */

/* $obavijest = ObavijestFactory::napravi('sms');
echo $obavijest->posalji('Pozdrav, šaljem puno radosti putem ovog SMS'); */

class ObavijestFactory2 {
    public static function napravi($vrstaObavijesti) {
        if($vrstaObavijesti === 'email') {
            return new EmailObavijest();
        }

        if($vrstaObavijesti === 'sms') {
            return new SMSObavijest();
        }

        if($vrstaObavijesti === 'push') {
            return new PushObavijest();
        }
        throw new Exception("Nije proslijeđena točna vrsta obavijesti");
    }
}

/* $push = ObavijestFactory2::napravi('pismo');
$push->posalji('Bok, evo samo da se javim!'); */

try {
    $push = ObavijestFactory2::napravi('pismo');
    $push->posalji('Bok, evo samo da se javim!');
} catch(Exception $e) {
    echo "Greška: " . $e->getMessage() . "<br>";
    echo "Linija greške: " . $e->getLine() . "<br>";
    echo "Putanja greške: " . $e->getFile();
}

echo "<br>" . "<br>";
echo "<hr>";

class VoziloFactory {
    private static $instace = null;

    private function __construct() {}
    private function __clone() {}
    public function __wakeup() {
        throw new Exception("Ne možes deserijalizirati");
    }

    public static function getVozilo() {
        if(self::$instace == null) {
            self::$instace = new self();
        }
        return self::$instace;
    }

    public static function createTip($tip) {
        switch($tip) {
            case 'auto':
                return new Automobil();
            case 'avion':
                return new Avion();
            case 'bicikl':
                return new Bicikl();
            default:
                throw new InvalidArgumentException("Nepoznat tip: $tip");
        }
    }

    public function createVozilo($tip) {
        return VoziloFactory::createTip($tip);
    }

}

$tvornicaVozila = VoziloFactory::getVozilo();
$avion = $tvornicaVozila->createVozilo('avion');