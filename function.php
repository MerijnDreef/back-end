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

    function listInserter($name){
      $conn = DbConnect();
      $stmt = $conn->prepare("INSERT INTO Lists (name) VALUES (:name)");
      $stmt->execute([':name' => $name]);
      return $stmt->errorCode();
    }

    function TaskInserter($name, $description, $list_id){
      $conn = DbConnect();
      $stmt = $conn->prepare("INSERT INTO Tasks (name, description, list_id) VALUES (:name, :description, :list_id)");
      $stmt->execute([':name' => $name, 'description' => $description, 'list_id' => $list_id]);
      return $stmt->errorCode();
  }
?>