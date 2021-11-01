<?php
session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style>
    body
    {
        margin:0%;
        padding:0%;
        background-color: blanchedalmond;
    }
    h1
    {
        color:green;
    }
</style>
</head>
<body>
    <h1>Hello ,<?php echo $_SESSION['username']; ?></h1>
    <a href="logout.php">logout</a>
</body>
</html>




