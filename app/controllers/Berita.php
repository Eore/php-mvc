<?php
require 'app/models/Berita.php';
require 'app/libs/Controller.php';

class Berita extends Controller {
  public function index($test) {
    $this->view->render('app/views/Berita.php');
  }

  public function tambah() {

  }
}