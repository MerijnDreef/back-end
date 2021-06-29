<?php
include "function.php";
$show = getListId($_GET['list_id']);

function createList($list_id, $name) {
    if($list_id != null && $name == "DELETE") {
        $result = listRemover($list_id);
        header('Location: index.php');
    } else {
        echo "<p> Now hold up there buckaroo, looks like you are missing something </p> <br>";
    }
}

if(array_key_exists('submit', $_POST)) {
    createList($_POST['list_id'], $_POST['name']);
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
        <label for='name'>Type in DELETE to confirm you want to delete it </label><input type='text' name='name' id='name'> 
        <input type='hidden' name='list_id' value='<?php echo $show[0]['list_id'];?>'>
        <input type="submit" name="submit" value="Delete">
    </form>
</body>
</html>