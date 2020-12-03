<?php
include './sidebar.php';
include_once './request.php';
if (!isset($_SESSION["admin"])) {
 header("location:../Login.php");
}
if (isset($_POST['logout'])) {
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
    <script>
        $(document).ready(function(){
            $("#distance").on("keyup",function(){
                distance=$("#distance").val()
                if(isNaN(distance)){
                    distance = distance.slice(0, -1);
                $("#distance").val(distance);
                }
            })
        })
    </script>
</head>

<body>
    <form style='width:50%;margin-left:200px;' method="POST" action='add_new_location.php'>
        <label for="name">Location</label>
        <input type="text" id="name" name="location" placeholder="Location Name" pattern="[a-zA-Z]+[a-zA-Z0-9\s]*" required>
        <label for="name">Distance</label>
        <input type="text" id="distance" name="distance" placeholder="distance">
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
