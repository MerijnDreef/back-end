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
    <script src="https://kit.fontawesome.com/ca88a28f8c.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Your lists and tasks</title>
</head>
<body>
   <a id="headerCreate" href="createList.php">Create a List</a>
   <a id="headerCreate" href="createTask.php">Create a Task</a>
   <br>
   <div class='container-fluid'>
    <div class='row-3'>
    <?php 
        foreach($lists as $list) {
            echo "<div class='col'>";
            echo "<h2>" . htmlspecialchars($list['name']) . "</h2>";
            echo "<a id='headerUpdate' href='updateList.php?list_id=" . htmlspecialchars(urlencode($list['list_id'])) . "'><i class='fas fa-edit'></i></a>";
            echo "<a id='headerDelete' href='deleteList.php?list_id=" . htmlspecialchars(urlencode($list['list_id'])) . "'><i class='fas fa-trash'></i></a>";

            foreach($tasks as $task) {
                if($task['list_id'] == $list['list_id']) {
                    echo "<p>" . htmlspecialchars($task['task_id']) . " " . htmlspecialchars($task['name']) . ", " . htmlspecialchars($task['description']) . " " . htmlspecialchars($task['list_id']) . " " . htmlspecialchars($task['status']) . " " . htmlspecialchars($task['time_needed']) . "</p>";
                    echo "<a id='headerUpdate' href='updateTask.php?task_id=" . htmlspecialchars(urlencode($task['task_id'])) . "'><i class='fas fa-edit'></i></a>";
                    echo "<a id='headerDelete' href='deleteTask.php?task_id=" . htmlspecialchars(urlencode($task['task_id'])) . "'><i class='fas fa-trash'></i></a>";
                }
            }
            echo "</div>";
        }
    ?>
    </div>
   </div>
</body>
</html>
<!-- <span></span> bindparam();-->