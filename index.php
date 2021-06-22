<?php
include "function.php";
$lists = getLists();
$tasks = getTasks();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Your lists and tasks</title>
</head>
<body>
   <p>Hey hey</p> 
   <p>doe het zo, Te doen, bezig, klaar</p>
   <a id="headerCreate" href="createList.php">Create a List</a>
   <a id="headerCreate" href="createTask.php">Create a Task</a>
   <?php 
   foreach($lists as $list) {
    echo "<h1>" . htmlspecialchars($list['name']) . "</h1>";

    foreach($tasks as $task) {
        if($task['list_id'] == $list['list_id']) {
        echo "<p>" . htmlspecialchars($task['task_id']) . " " . htmlspecialchars($task['name']) . " " . htmlspecialchars($task['list_id']) . "</p>";
        }
    }
   }
   ?>
</body>
</html>
<!-- <span></span> bindparam();-->