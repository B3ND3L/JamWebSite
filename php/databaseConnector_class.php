<?php

  class databaseConnector{

      const USERNAME = '';
      const PASSWORD = '';
      $database = null;

      function databaseConnector(){

        $database = new PDO('mysql:host=localhost;dbname=jamdb;charset=utf8mb4', USERNAME, PASSWORD);
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

      }

      function addUser(name, email, date){
        try {
            $stmt = $db->query('INSERT INTO users VALUES (?,?,?)');
            $stmt->execute(array($name,$email,$date));
        } catch(PDOException $ex) {
            echo "An Error occured!"; //user friendly message
            some_logging_function($ex->getMessage());
        }
      }
  }

 ?>
