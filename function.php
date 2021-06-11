<?php
require "dbConnect.php";

    function getLists() {
      $connection = DbConnect();
      $stmt = $connection->prepare("SELECT list_id, name FROM lists");
      $stmt->execute();
    
      // set the resulting array to associative
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
    }

    function getTasks() {
      $connection = DbConnect();
      $stmt = $connection->prepare("SELECT * FROM tasks");
      $stmt->execute();
    
      // set the resulting array to associative
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
    }

    function getToDo() {
      $connection = DbConnect();
      $stmt = $connection->prepare("SELECT * FROM tasks WHERE list_id = 1");
      $stmt->execute();
    
      // set the resulting array to associative
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      return $stmt->fetchAll();

    }

    function getBusy() {
      $connection = DbConnect();
      $stmt = $connection->prepare("SELECT * FROM tasks WHERE list_id = 2");
      $stmt->execute();
    
      // set the resulting array to associative
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      return $stmt->fetchAll();

    }

    function getDone() {
      $connection = DbConnect();
      $stmt = $connection->prepare("SELECT * FROM tasks WHERE list_id = 3");
      $stmt->execute();
    
      // set the resulting array to associative
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      return $stmt->fetchAll();

    }
?>