<?php
namespace App\Controllers;


class Car {


    function car_info() {
        // creating instances of the object
        $car1 = new \App\Library\Car("Proton","X90","Red");
        $car2 = new \App\Library\Car("Perodua","Alza","Black");
       
        // Using methods of car1
        echo "<h2>Car : ". $car1->brand ." - ".$car1->model."</h2>";        
        $car1->start(); // Output: The Red Proton X90 is starting.
        $car1->drive(); // Output: Driving the Red Proton X90.
        $car1->brake(); // Output: Braking the Red Proton X90.


        // Using methods of car2
        echo "<h2>Car : ". $car2->brand ." - ".$car2->model."</h2>";        
        $car2->start(); // Output: The Black Perodua Alza is starting.
        $car2->drive(); // Output: Driving the Black Perodua Alza.
        $car2->brake(); // Output: Braking the Black Perodua Alza.        
    }
}

