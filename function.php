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

    function listController($name){
      $conn = DbConnect();
      $stnt = $conn->prepare("INSERT INTO Lists (name) VALUES (:name)");
      $stnt->execute([':name' => $name]);
      return $stnt->errorCode();
    }

    function TaskController($name, $description, $list_id){
      $conn = DbConnect();
      $stnt = $conn->prepare("INSERT INTO Tasks (name, description, list_id) VALUES (:name, :description, :list_id)");
      $stnt->execute([':name' => $name, 'description' => $description, 'list_id' => $list_id]);
      return $stnt->errorCode();
  }
?>