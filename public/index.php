<?php 
require __DIR__ . '/../vendor/autoload.php';

use Mainardes\ProjetoCrud\Controller\InterfaceControllerRequest;

$path = $_SERVER['PATH_INFO'];
$routes = require __DIR__ . '/../config/routes.php';

if (!array_key_exists($path, $routes)) {
    http_response_code(404);
    exit();
}

$controllerClass = $routes[$path];
$controller = new $controllerClass();
$controller->processRequest();

?>