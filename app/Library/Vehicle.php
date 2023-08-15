<?php
namespace App\Library;

abstract class Vehicle {
    // Properties
    public $brand;
    public $model;
    public $color;
    public $type;

    abstract public function move();

    public function __construct( $brand, $model, $color ) {
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
    }

    public function start() {
        echo "The $this->color $this->brand $this->model is starting.<br>";
    }

}
