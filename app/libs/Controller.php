<?php

class Controller extends App {
  public function __construct() {
    require_once $_SERVER['DOCUMENT_ROOT'].'/app/controllers/'.$this->getController().'.php';
    
    // $exist = method_exists($this->controller, $this->method);
    $this->getController()::index();
    // var_dump($exist);
  }
}