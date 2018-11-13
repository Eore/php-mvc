<?php

class Router {
  public $controller;
  public $method;
  public $params;
  public $query;

  public function __construct() {
    $this->getController();
    $this->getMethod();
    $this->getParams();
    $this->getQuery();
  }

  public function getURL() {
    $url = $_SERVER['REQUEST_URI'];
    $check = explode('?', $url);
    if (count($check) > 1) {
      $url = $check[0];
    } 
    $url = ltrim($url, '/');
    $url = rtrim($url, '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode('/', $url);
    return $url;
  }

  public function getController() {
    $this->controller = ucfirst($this->getURL()[0]);
  }

  public function getMethod() {
    $this->method = $this->getURL()[1];
  }

  public function getParams() {
    $params = $this->getURL();
    $this->params = array_slice($params, 2);
  }

  public function getQuery() {
    $this->query = $_GET;
  }
}