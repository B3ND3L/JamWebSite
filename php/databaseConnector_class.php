<?php

  class databaseConnector{

      const USERNAME = "jamdb";
      const PASSWORD = "jamdb";
      protected $database = null;

      public function databaseConnector(){

        $database = new PDO('mysql:host=localhost;dbname=jamdb;charset=utf8mb4', USERNAME, PASSWORD);
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

      }

      public function addUser($name, $email, $date){
        try {
            $stmt = self::$database->query('INSERT INTO users VALUES (?,?,?)');
            $stmt->execute(array($name,$email,$date));

        } catch(PDOException $ex) {
            echo "An Error occured!"; //user friendly message
        }
      }

      public function addPssword($id, $passwd){

          $stmt = self::$database->query('InSERT INTO passwords VALUES(?,?)');
          $stmt->execute(array($id, $passwd));
      }

      public function getUserByName($name){
          $stmt = self::$database->query('SELECT id, name, email FROM users WHERE name=?');
          $stmt->execute(array($name));
      }

      public function getUserByEmail($email){
          $stmt = self::$database->query('SELECT id, name, email FROM users WHERE email=?');
          $stmt->execute(array($email));
      }

      public function getIdByName($name){
          $stmt = self::$database->query('SELECT id FROM users WHERE name=?');
          $stmt->execute(array($name));
      }

      public function getIdByEmail($email){
          $stmt = self::$database->query('SELECT id FROM users WHERE email=?');
          $stmt->execute(array($email));
      }

      public function getPassword($id){
          $stmt = self::$database->query('SELECT password FROM passwords WHERE user_id=?');
          $stmt->execute(array($id));
      }
  }

 ?>
