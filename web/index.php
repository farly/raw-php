<?php

require __DIR__. DIRECTORY_SEPARATOR .".." . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "bootstrap.php";

use app\config\Routes;
use app\lib\HttpParameters;
use app\controllers;

$routes = new Routes();
$action = $routes->matchRoute(isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : '/' );

$parameters = new HttpParameters($_GET, $_POST);
// $request = new Request($paremeters, $_REQUEST, $_SERVER);
if (!is_null($action)) {
    $controller = new $action['controller']();
    $controller->$action['action']($parameters);
} else {
    die((new Exception('No Routes Found'))->getMessage());
}