<?php
require_once "dbConnect.php";

/* gets the lists from the database */
function getLists() {
    $connection = DbConnect();
    $stmt = $connection->prepare("SELECT list_id, name FROM lists");
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

/* gets a specific list from the database */
function getListId($list_id){
    $conn = DbConnect();
    $stmt = $conn->prepare("SELECT * FROM lists WHERE list_id = :list_id");
    $stmt->execute([':list_id'=> $list_id]);
    return $stmt->fetchAll();
}

/* creates a list to put in the database */
function listCreater($name){
    $conn = DbConnect();
    $stmt = $conn->prepare("INSERT INTO Lists (name) VALUES (:name)");
    $stmt->execute([':name' => $name]);
    return $stmt->errorCode();
}

/* updates a selected list */
function listUpdater($list_id, $name){
    $conn = DbConnect();
    $stmt = $conn->prepare("UPDATE lists set list_id = :list_id, name = :name WHERE list_id = :list_id");
    $stmt->execute([':list_id' => $list_id, ':name' => $name]);
    return $stmt->errorCode();
}

/* removes a selected list and its tasks from the database */
function listRemover($list_id){  
    $conn = DbConnect();
    $stmt = $conn->prepare("DELETE FROM lists WHERE list_id = :list_id");
    $stmt->execute([':list_id'=> $list_id]);

    $stmt = $conn->prepare("DELETE FROM tasks WHERE list_id = :list_id");
    $stmt->execute([':list_id' => $list_id]);
    return $stmt->errorCode();
}