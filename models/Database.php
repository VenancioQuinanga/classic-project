<?php

class Database{

  public function getConnection(){

      try {

          $conn = new PDO("mysql:dbname=classic2;host=localhost","root","");

          return $conn;

      } catch (PDOException $e) {
          echo $e->getMessage();
      }
  }

}
  
?>