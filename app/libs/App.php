<?php

class App {
  protected $controller = 'Home';
  protected $method = 'index';
  protected $params = [];
  protected $query = [];

  public function __construct() {
    // var_dump($this->$controller);
    // var_dump($this->getController());

    if ($this->getController() !== '') {
      $this->controller = $this->getController();
    }
    if ($this->getMethod() !== '') {
      $this->method = $this->getMethod();
    }
    if (count($this->getParams()) > 0) {
      $this->params = $this->getParams();
    }
    if (count($this->getQuery()) > 0) {
      $this->query = $this->getQuery();
    }
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
    $controller = $this->getURL();
    return $controller[0];
  }

  public function getMethod() {
    $method = $this->getURL();
    return $method[1];
  }

  public function getParams() {
    $params = $this->getURL();
    $params = array_slice($params, 2);
    return $params;
  }

  public function getQuery() {
    return $_GET;
  }
}