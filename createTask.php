<?php
include "function.php";
$result = getLists();

function createTask($name, $description, $list_id) {
    if($name != null && $list_id != null) {
        $result = taskInserter($name, $description, $list_id);
        header('Location: index.php');
    } else {
        echo "Now hold up there buckaroo";
    }
}

if(array_key_exists('submit', $_POST)) {
    createTask($_POST['name'], $_POST['description'], $_POST['list_id']);
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
        <label for='name'>name </label><input type='text' name='name' id='name'>
        <br>
        <br>
        <label for='list_id'>Name of list:</label><select name="list_id" id="list_id-select">
            <?php
                foreach($result as $lists){
                    echo "<option value='" . htmlspecialchars($lists['list_id']) . "'>" . htmlspecialchars($lists['name']) . "</option>";
                } 
            ?>
        </select>
        <br>
        <br>
        <label for='description'>description </label><input type='text' name='description' id='description'>
        <input type="submit" name="submit" value="Create">
    </form>
</body>
</html>