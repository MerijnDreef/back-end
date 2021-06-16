<?php
include "function.php";

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
<h1><a href='index.php'>Terug naar lists?</a></h1>
    <form action='createconfirmed.php' method='POST'>    <!-- vergeet niet de goede locaties te doen -->
        <label for='hostName'>Host name</label><input type='text' name='hostName' id='hostName'> 
        <input type="submit" value="Create">
    </form>
</body>
</html>