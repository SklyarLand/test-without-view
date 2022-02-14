<?php
use App\Controllers;
/**
 * @var $router \Bramus\Router\Router
 */
$router->get('/', Controllers\ClientsController::class.'@index');

$router->mount('/clients',function() use ($router) {
    $router->get('/', Controllers\ClientsController::class.'@all');
    $router->get('/create', Controllers\ClientsController::class.'@create');
    $router->get('/(\d+)/', Controllers\ClientsController::class.'@get');
    $router->get('/(\d+)/edit', Controllers\ClientsController::class.'@edit');
    $router->post('/', Controllers\ClientsController::class.'@store');
    $router->post('/(\d+)', Controllers\ClientsController::class.'@update');
    $router->post('/(\d+)/delete', Controllers\ClientsController::class.'@delete');
});