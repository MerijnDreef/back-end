<?php
include "taskController.php";

$show = getTaskId($_GET['task_id']);

function deleteTask($task_id, $name) {
    if($task_id != null && $name == "DELETE") {
        $result = taskRemover($task_id);
        header('Location: index.php');
    } else {
        echo "Now hold up there buckaroo";
    }
}

if(array_key_exists('submit', $_POST)) {
    deleteTask($_POST['task_id'], $_POST['name']);
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Create a task</title>
</head>
<body>
<a id="headerCreate" href='index.php'>Terug naar lists?</a>
    <form method='POST'> 
        <label for='name'>Type in DELETE to confirm you want to delete it </label><input type='text' name='name' id='name'>
        <input type='hidden' name='task_id' value='<?php echo $show[0]['task_id'];?>'>
        <input type="submit" name="submit" value="Delete">
    </form>
</body>
</html>