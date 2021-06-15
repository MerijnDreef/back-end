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
    <title>To-do list</title>
</head>
<body>
   <p>Hey hey</p> 
   <p>doe het zo, Te doen, bezig, klaar</p>
   <?php 
   foreach($lists as $list) {
    echo "<h1>" . $list['name'] . "</h1>";

    foreach($tasks as $task) {
        if($task['list_id'] == $list['list_id']) {
        echo "<p>" . $task['task_id'] . " " . $task['name'] . " " . $task['list_id'] . "</p>";
        }
    }
   }
   ?>
</body>
</html>
<!-- <span></span> bindparam();-->