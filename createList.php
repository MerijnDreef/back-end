<?php
include "function.php";

function createList($name) {
    if($name != null) {
    $name = $_POST['name'];
    $result = listInserter($name);
    header('Location: index.php');
    } else {
        echo "<p> Now hold up there buckaroo, looks like you are missing something </p> <br>";
    }
}

if(array_key_exists('submit', $_POST)) {
    createList($_POST['name']);
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Create a list</title>
</head>
<body>
<a id="headerCreate" href='index.php'>Terug naar lists?</a>
    <form method='POST'> 
        <label for='name'>name </label><input type='text' name='name' id='name'> 
        <input type="submit" name="submit" value="Create">
    </form>
</body>
</html>