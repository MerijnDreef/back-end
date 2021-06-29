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
    $stnt = $conn->prepare("UPDATE lists set list_id = :list_id, name = :name WHERE list_id = :list_id");
    $stnt->execute([':list_id' => $list_id, ':name' => $name]);
    return $stnt->errorCode();
  }

  function taskUpdater($task_id, $name, $description, $list_id){
    $conn = DbConnect();
    $stnt = $conn->prepare("UPDATE tasks set task_id = :task_id, name = :name, description = :description, status = :status, time_needed = :time_needed, list_id = :list_id WHERE task_id = :task_id");
    $stnt->execute([':task_id' => $task_id, ':name' => $name, 'description' => $description, ':status' => $status, ':time_needed' => $time_needed, 'list_id' => $list_id]);
    return $stnt->errorCode();  
  }  

  function listRemover($list_id){  
    $conn = DbConnect();
    $stnt = $conn->prepare("DELETE FROM lists WHERE list_id = :list_id");
    $stnt->execute([':list_id'=> $list_id]);
    return $stnt->errorCode();
  }

  function taskRemover($task_id){
    $conn = DbConnect();
    $stnt = $conn->prepare("DELETE FROM tasks WHERE task_id = :task_id");
    $stnt->execute([':task_id'=> $task_id]);
    return $stnt->errorCode();
  }

  function getListId($list_id){
    $conn = DbConnect();
    $stnt = $conn->prepare("SELECT * FROM lists where list_id = :list_id");
    $stnt->execute([':list_id'=> $list_id]);
    return $stnt->fetchAll();
  }

  function getTaskId($task_id){
    $conn = DbConnect();
    $stnt = $conn->prepare("SELECT * FROM tasks where task_id = :task_id");
    $stnt->execute([':task_id'=> $task_id]);
    return $stnt->fetchAll();
  }
?>