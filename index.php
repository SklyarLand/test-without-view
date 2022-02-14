<?php
require 'vendor/autoload.php';

$router = new \Bramus\Router\Router();
$router->setBasePath('/');

require 'route.php';

$router->run();