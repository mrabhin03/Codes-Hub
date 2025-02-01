<?php

//   ---Home Page of Login---


session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<h1>Hello <?=$_SESSION['User']?></h1>
</body>
</html>