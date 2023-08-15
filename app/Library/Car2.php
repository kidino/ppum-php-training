<?php
namespace App\Library;


class Car {
    // Properties
    public $brand;
    public $model;
    public $color;


    // Methods
    public function __construct( $brand, $model, $color ) {
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
    }


    public function start() {
        echo "The $this->color $this->brand $this->model is starting.<br>";
    }


    public function drive() {
        echo "Driving the $this->color $this->brand $this->model.<br>";
    }


    public function brake() {
        echo "Braking the $this->color $this->brand $this->model.<br>";
    }
}

