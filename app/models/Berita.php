<?php
require 'app/libs/Database.php';

class Berita extends Database {
  public function __construct() {
    $this->connnection->query("
      create table if note exists berita (
        id integer primary key auto_increment,
        judul varchar(50) not null,
        isi text not null,
        tanggal now()
      )
    ");
  }

  public function tambahBerita() {

  }
}