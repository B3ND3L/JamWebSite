<?php

  class databaseConnector{

      const USERNAME='jamdb';
      const PASSWORD = "jamdb";
      protected $database;

      public function databaseConnector(){

        $this->database = new PDO('mysql:host=localhost;dbname=jamdb;charset=utf8mb4', self::USERNAME, self::PASSWORD);
        $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->database->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

      }

      public function addUser($name, $email, $date){
        try {
            $stmt = $this->database->prepare('INSERT INTO users (`name`,`email`,`date`) VALUES (?,?,?)');
            $stmt->execute(array($name,$email,$date));

        } catch(PDOException $ex) {
            echo "An Error occured!"; //user friendly message
        }
      }

      public function addPssword($id, $passwd){

          $stmt = $this->database->prepare('INSERT INTO passwords VALUES(?,?)');
          $stmt->execute(array($id, $passwd));
      }

      public function getUserByName($name){
          $stmt = $this->database->prepare('SELECT id, name, email FROM users WHERE name=?');
          $stmt->execute(array($name));
          $result = $stmt->fetch();
          return $result;
      }

      public function getUserByEmail($email){
          $stmt = $this->database->prepare('SELECT id, name, email FROM users WHERE email=?');
          $stmt->execute(array($email));
          $result = $stmt->fetchColumn(0);
          return $result;
      }

      public function getIdByName($name){
          $stmt = $this->database->prepare('SELECT id FROM users WHERE name=?');
          $stmt->execute(array($name));
          $result = $stmt->fetchColumn(0);
          return $result;
      }

      public function getIdByEmail($email){
          $stmt = $this->database->prepare('SELECT id FROM users WHERE email=?');
          $stmt->execute(array($email));
          $result = $stmt->fetchColumn(0);
          return $result;
      }

      public function getPassword($id){
          $stmt = $this->database->prepare('SELECT password FROM passwords WHERE user_id=?');
          $stmt->execute(array($id));
          $result = $stmt->fetchColumn(0);
          return $result;
      }

      public function getDatabase()
      {
          return $this->database;
      }

      public function setDatabase($database)
      {
          $this->database = $database;
      }
  }

 ?>
