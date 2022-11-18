<?php
include "taskController.php";
include "listController.php";

$lists = getLists();
$tasks = getTasks($_POST);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <script src="https://kit.fontawesome.com/ca88a28f8c.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Your lists and tasks</title>
</head>
<body>
   <a id="headerCreate" href="createList.php">Create a List</a>
   <a id="headerCreate" href="createTask.php">Create a Task</a>
   <form name="status_and_time_form" method="POST" action="index.php">
   <label for='status'>status of task </label><select name="status" id="status-select">
            <option value='all'>All</option>
            <option value='to do'>To do</option>
            <option value='busy'>Busy</option>
            <option value='done'>Done</option>
        </select>
        <label for='time'>time of task </label><select name="time" id="time-select">
            <option value='all'>All</option>
            <option value='high'>high to low</option>
            <option value='low'>low to high</option>
        </select>
        <input type="submit" name="status_and_time_shown" value="Show status and time">
    </form>
   <br>
    <?php 
        foreach($lists as $list) {
            echo "<div class='card bg-dark mb-3 d-inline-block' style='min-width: 20rem; max-width: 20rem; margin-left: 1rem; vertical-align: top;'>";
           
            echo "<div class='card-header'><h2>" . htmlspecialchars($list['name']) . "</h2></div>";
            echo "<a id='headerUpdate' href='updateList.php?list_id=" . htmlspecialchars(urlencode($list['list_id'])) . "' alt='Edit'> <i class='fas fa-edit'></i></a>";
            echo "<a id='headerDelete' href='deleteList.php?list_id=" . htmlspecialchars(urlencode($list['list_id'])) . "' alt='Delete'><i class='fas fa-trash'></i></a>";
            echo "<div class='card-body'>";

            foreach($tasks as $task) {
                if($task['list_id'] == $list['list_id']) {
                   
                    echo "<p class='card-text'>" . htmlspecialchars($task['name']) . "</p>";
                    echo "<p class='card-text'>" . htmlspecialchars($task['description']) . "</p>";
                    echo "<p class='card-text'>" . htmlspecialchars($task['status']) . "</p>";
                    echo "<p class='card-text'>" . htmlspecialchars($task['time_needed']) . "</p>";
                    echo "<a id='headerUpdate' href='updateTask.php?task_id=" . htmlspecialchars(urlencode($task['task_id'])) . "' alt='Edit'> <i class='fas fa-edit'></i></a>";
                    echo "<a id='headerDelete' href='deleteTask.php?task_id=" . htmlspecialchars(urlencode($task['task_id'])) . "' alt='Delete'><i class='fas fa-trash'></i></a>";
                }
            }
            echo "</div>";
            echo "</div>";
        }
    ?>
    </div>
   </div>
</body>
</html>
<!-- <span></span> bindparam();-->