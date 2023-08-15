<?php
// load the router
$router = new \Bramus\Router\Router();


// routing rules
$router->get('/design', 'App\Controllers\Home@index');
$router->get('/login', 'App\Controllers\Home@login');

$router->get('/darah', 'App\Ujian\Darah@buat_ujian');

$router->get('/saya', function(){
    echo "<h1>Nama saya Iszuddin Ismail aka Dino</h1>";
});

$router->get('/dia(/\w+)?', function( $nama = null){
    $nama = ($nama == null) ? "entah" : $nama;
    echo "<h1>Nama dia $nama</h1>";
});

$router->get('/', 'App\Design\Home@index');

$router->get('/cars', 'App\Controllers\Car@car_info');
$router->get('/vehicle', 'App\Controllers\Home@vehicle');

$router->get('/users', 'App\Controllers\Users@index');
$router->get('/user/{id}', 'App\Controllers\Users@details');


$router->get('/departments', 'App\Controllers\Department@index');

// run router
$router->run();