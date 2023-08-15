<?php
namespace App\Library;

use App\Library\Vehicle;

class Boat extends Vehicle {

    public function __construct( $brand, $model, $color ) {
        parent::__construct( $brand, $model, $color );
        $this->type = 'Boat';
    }

    public function move() {
        echo "The $this->type is sailing";
    }
    
}

