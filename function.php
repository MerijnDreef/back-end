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

  function getTasks($statusTimeRequest) {
    $connection = DbConnect();
    $sql = "SELECT * FROM tasks ";
    if($statusTimeRequest == null || $statusTimeRequest['status'] == "all" ){
      if($statusTimeRequest == null) {
      } else if($statusTimeRequest['time'] == "high") {
        $sql .= "ORDER BY time_needed DESC";
      } else if($statusTimeRequest['time'] == "low"){
        $sql .= "ORDER BY time_needed ASC";
      }
    } else {
      if(isset($statusTimeRequest['status_and_time_shown'])) {
        $status_chosen = $statusTimeRequest['status'];
        $sql .= "WHERE status = '{$status_chosen}'";
      }

      if($statusTimeRequest['time'] == "high") {
        $sql .= "ORDER BY time_needed DESC";
      } else if($statusTimeRequest['time'] == "low") {
        $sql .= "ORDER BY time_needed ASC";
      } else {
        
      }
    }
    $stmt = $connection->prepare($sql);
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
  }

  function listCreater($name){
    $conn = DbConnect();
    $stmt = $conn->prepare("INSERT INTO Lists (name) VALUES (:name)");
    $stmt->execute([':name' => $name]);
    return $stmt->errorCode();
  }

  function TaskCreater($name, $description, $status, $time_needed, $list_id){
    $conn = DbConnect();
    $stmt = $conn->prepare("INSERT INTO Tasks (name, description, status, time_needed, list_id) VALUES (:name, :description, :status, :time_needed, :list_id)");
    $stmt->execute([':name' => $name, 'description' => $description, ':status' => $status, ':time_needed' => $time_needed, 'list_id' => $list_id]);
    return $stmt->errorCode();
  }

  function listUpdater($list_id, $name){
    $conn = DbConnect();
    $stmt = $conn->prepare("UPDATE lists set list_id = :list_id, name = :name WHERE list_id = :list_id");
    $stmt->execute([':list_id' => $list_id, ':name' => $name]);
    return $stmt->errorCode();
  }

  function taskUpdater($task_id, $name, $description, $list_id){
    $conn = DbConnect();
    $stmt = $conn->prepare("UPDATE tasks set task_id = :task_id, name = :name, description = :description, status = :status, time_needed = :time_needed, list_id = :list_id WHERE task_id = :task_id");
    $stmt->execute([':task_id' => $task_id, ':name' => $name, 'description' => $description, ':status' => $status, ':time_needed' => $time_needed, 'list_id' => $list_id]);
    return $stmt->errorCode();  
  }  

  function listRemover($list_id){  
    $conn = DbConnect();
    $stmt = $conn->prepare("DELETE FROM lists WHERE list_id = :list_id");
    $stmt->execute([':list_id'=> $list_id]);

    $stmt = $conn->prepare("DELETE FROM tasks WHERE list_id = :list_id");
    $stmt->execute([':list_id' => $list_id]);
    return $stmt->errorCode();
  }

  function taskRemover($task_id){
    $conn = DbConnect();
    $stmt = $conn->prepare("DELETE FROM tasks WHERE task_id = :task_id");
    $stmt->execute([':task_id'=> $task_id]);
    return $stmt->errorCode();
  }

  function getListId($list_id){
    $conn = DbConnect();
    $stmt = $conn->prepare("SELECT * FROM lists WHERE list_id = :list_id");
    $stmt->execute([':list_id'=> $list_id]);
    return $stmt->fetchAll();
  }

  function getTaskId($task_id){
    $conn = DbConnect();
    $stmt = $conn->prepare("SELECT * FROM tasks WHERE task_id = :task_id");
    $stmt->execute([':task_id'=> $task_id]);
    return $stmt->fetchAll();
  }
?>