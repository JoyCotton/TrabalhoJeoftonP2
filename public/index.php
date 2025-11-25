<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

$uri = rtrim($uri, '/');

session_start();

$routes = [
  'GET' => [
    '' => ['HomeController', 'index'],
    '/login' => ['AuthController', 'showLogin'],
    '/logout' => ['AuthController', 'logout'],
    '/posts' => ['PostController', 'index'],
  ],
  'POST' => [
    '/login' => ['AuthController', 'login'],
    '/posts/create' => ['PostController', 'create'],
  ]
];

if (isset($routes[$method][$uri])) {
  [$controller, $action] = $routes[$method][$uri];
  $controllerFile = __DIR__ . "/../app/Controllers/{$controller}.php";
  if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $ctrl = new $controller();
    $ctrl->$action();
    exit;
  }
}
// 404
http_response_code(404);
echo "Página não encontrada.";
