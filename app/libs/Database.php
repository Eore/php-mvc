<?php

class Database {
  public $connection;
  protected $dbConfig;

  public function __construct() {
    $this->$dbConfig = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/app/configs/database.ini');
    $this->$connection = $this->connect();
  }

  public function connect() {
    $con = new PDO(
      $this->$dbConfig['driver'].':host='.$this->$dbConfig['host'],
      $this->$dbConfig['username'],
      $this->$dbConfig['password']
    );
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->exec('create database if not exists '.$this->$dbConfig['database']);
    $con->exec('use '.$this->$dbConfig['database']);
    return $con;
  }
}