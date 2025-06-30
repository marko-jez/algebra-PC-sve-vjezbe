<?php

namespace Math\Geometry;

class Circle {
    public $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function getDiameter() {
        return $this->radius * 2;
    }

    public function getArea() {
        return $this->radius ** 2 * \Math\Constants::PI;
    }

    public function getCircumference() {
        return $this->radius * 2 * \Math\Constants::PI;
    }

}