<?php

require_once 'app/bootstrap.php';

$router = new Router;
$controller = $router->controller;


if ($router->method == null) {
  $method = 'index';
} else {
  $method = $router->method;
};

if (file_exists("app/controllers/$controller.php")) {
  require "app/controllers/$controller.php";
  if (method_exists(new $controller, $method)) {
    (new $controller)->$method($router->query);
  } else {
    $error = true;
  }
} else {
  $error = true;
}

if ($error) {
  require 'app/controllers/ErrorPage.php';
  new ErrorPage(404);

}

// echo '<pre>';
// var_dump($r);
// echo '</pre>';

// $app = new App;
// $controller = new Controller;
// $database = new Database;
// $router = new Router;