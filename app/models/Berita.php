<?php

class Database {
  public $connection;

  public function __construct() {
    $this->connection = $this->connect();
  }

  public function connect() {
    $dbConfig = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/app/configs/database.ini');

    $con = new PDO(
      $dbConfig['driver'].':host='.$dbConfig['host'].';dbname='.$dbConfig['database'], 
      $dbConfig['username'], 
      $dbConfig['password']
    );

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $con;
  }
}