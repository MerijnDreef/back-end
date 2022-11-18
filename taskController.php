<?php
require_once "dbConnect.php";

/* gets the tasks out of the database and filters if: all, high or low are selected but also how to order the gotten tasks */
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

/* gets a specific task out of the database */
function getTaskId($task_id){
    $conn = DbConnect();
    $stmt = $conn->prepare("SELECT * FROM tasks WHERE task_id = :task_id");
    $stmt->execute([':task_id'=> $task_id]);
    return $stmt->fetchAll();
}

/* creates a task to put in the database */
function TaskCreater($name, $description, $status, $time_needed, $list_id){
    $conn = DbConnect();
    $stmt = $conn->prepare("INSERT INTO Tasks (name, description, status, time_needed, list_id) VALUES (:name, :description, :status, :time_needed, :list_id)");
    $stmt->execute([':name' => $name, 'description' => $description, ':status' => $status, ':time_needed' => $time_needed, 'list_id' => $list_id]);
    return $stmt->errorCode();
}

/* updates a selected task */
function taskUpdater($task_id, $name, $description, $status, $time_needed, $list_id){
    $conn = DbConnect();
    $stmt = $conn->prepare("UPDATE tasks set task_id = :task_id, name = :name, description = :description, status = :status, time_needed = :time_needed, list_id = :list_id WHERE task_id = :task_id");
    $stmt->execute([':task_id' => $task_id, ':name' => $name, 'description' => $description, ':status' => $status, ':time_needed' => $time_needed, 'list_id' => $list_id]);
    return $stmt->errorCode();  
}  

/* removes a selected task from the database */
function taskRemover($task_id){
    $conn = DbConnect();
    $stmt = $conn->prepare("DELETE FROM tasks WHERE task_id = :task_id");
    $stmt->execute([':task_id'=> $task_id]);
    return $stmt->errorCode();
}