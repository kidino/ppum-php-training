<?php
namespace App\Library;

use App\Library\Vehicle;

class Car extends Vehicle {

    public function __construct( $brand, $model, $color ) {
        parent::__construct( $brand, $model, $color );
        $this->type = 'Car';
    }

    public function move() {
        echo "The $this->type is moving";
    }
}

