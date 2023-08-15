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
$router->get('/departments2', 'App\Controllers\Department@index2');


$router->get('/student/{id}', 'App\Controllers\Student@details');

$router->get('/account1', 'App\Controllers\Account@account1');
$router->get('/account2', 'App\Controllers\Account@account2');
$router->get('/globals', function(){
    echo "<pre>";
    var_dump($_SERVER["HTTP_USER_AGENT"]);
    echo "</pre>";
});

$router->get('/ref', function(){

    $original = 0;
    $copy_var = &$original;

    $copy_var = 1;

    echo "ORI is $original<br>";
    echo "COPY is $copy_var<br>";

    unset($copy_var);

    echo "ORI is $original<br>";
    echo "COPY is $copy_var<br>";



});

$router->get('/json', function(){

    $data = file_get_contents('../data.json');
    echo "<h5>Unformatted JSON</h5>";
    echo "<pre>";
    var_dump($data);
    echo "</pre>";

    echo "<h5>Formatted JSON</h5>";
    echo "<pre>";
    $data = json_decode($data, true);
    var_dump($data);
    echo "</pre>";

    $data[0]['name'] = 'Azizan';

    file_put_contents('../data.json', json_encode($data));

    



});



// run router
$router->run();