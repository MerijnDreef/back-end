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
?>