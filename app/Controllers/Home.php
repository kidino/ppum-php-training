<?php
namespace App\Controllers;


class Home {
    // homepage
    function index() {
        echo "<h1>Selamat Datang</h1>";
        echo "<p><a href='/login'>Login</a></p>";
    }


    // login page
    function login() {
        echo "<h1>Login Di Sini</h1>";
        echo "<p><a href='/'>Home</a></p>";
    }

    function vehicle() {

        $myboat = new \App\Library\Boat('Yamaha', 'Yacht', 'White');
        $mycar = new \App\Library\Car('Toyota', 'Innova', 'Black');

        echo "<h2> $mycar->type : $mycar->brand $mycar->model</h2>";        
        $mycar->start(); 
        $mycar->move(); 

        echo "<h2> $myboat->type : $myboat->brand $myboat->model</h2>";        
        $myboat->start(); 
        $myboat->move(); 

    }
}

