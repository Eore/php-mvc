<?php

class ErrorPage {

  public function __construct($statusCode) {
    switch ($statusCode) {
      case 404:
        echo '404';
        break;
    }
  }
}