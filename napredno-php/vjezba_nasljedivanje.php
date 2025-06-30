<?php

class Smartphone {
    private $brand;

    public function setBrand($_brand) {
        return $this->brand = $_brand;
    }

    public function getBrand() {
        return $this->brand;
    }
}

class GamingSmartphone extends Smartphone {
    private $gpu;

    public function setGpu($_gpu) {
        return $this->gpu = $_gpu;
    }

    public function getGpu() {
        return $this->gpu;
    }
}

$gphone = new GamingSmartphone();
$gphone->setBrand('Asus ROG Phone');
$gphone->setGpu('Adreno 740');

echo "Brand: " . $gphone->getBrand() . "<br>";
echo "Gpu: " . $gphone->getGpu();