<?php
    function GetLists() {
      $connection = connect();
      $stmt = $connection->prepare("SELECT id, name FROM lists");
      $stmt->execute();
    
      // set the resulting array to associative
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
    }
?>