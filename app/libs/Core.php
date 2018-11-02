<?php

class Core {
  protected $controller = '';
  protected $method = '';
  protected $params = [];
  protected $query = [];

  public function __construct() {
    $this->controller = $this->getController();
    $this->method = $this->getMethod();
    $this->params = $this->getParams();
    $this->query = $this->getQuery();
    print_r($this->getController());
    echo '<br/>';
    print_r($this->getMethod());
    echo '<br/>';
    print_r($this->getParams());
    echo '<br/>';
    print_r($this->getQuery());
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