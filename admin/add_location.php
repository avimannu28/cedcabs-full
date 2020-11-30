<?php 
    include './sidebar.php';
    include_once './request.php';
    if(!isset($_SESSION["admin"]))
    {
      header("location:../Login.php");
    }
    if(isset($_POST['logout'])){
      session_destroy();
      header("location:../Login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/location.css">
</head>

<body>
    <form style='width:50%;margin-left:200px;' method="POST" action='add_new_location.php'>
        <label for="name">Location</label>
        <input type="text" id="name" name="location" placeholder="Location Name">
        <label for="name">Distance</label>
        <input type="text" id="name" name="distance" placeholder="distance">
        <label for="Available">Available</label>
        <select name='available'>
            <option value='1'>available</option>
            <option value='0'>unavailable</option>
        </select>
        <input type="submit" value="Submit">
    </form>
    </div>
</body>

</html>