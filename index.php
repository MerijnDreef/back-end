<?php
include "function.php";
$lists = getLists();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do list</title>
</head>
<body>
   <p>Hey hey</p> 
   <p>doe het zo, Te doen, bezig, klaar</p>
   <?php 
   foreach($lists as $list) {
    echo "<h1>" . $list['name'] . "</h1>";

   }
   ?>
</body>
</html>
<!-- <span></span> bindparam();-->