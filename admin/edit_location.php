<?php
include './sidebar.php';
include_once './request.php';
$edit_location = new request();
$id            = $_GET['id'];
if (!isset($_SESSION["admin"])) {
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
<script>
    $(document).ready(function(){
        $("#distance").on("keyup",function(){
            distance=$("#distance").val();
            console.log(distance)
            if(isNaN(distance)){
                distance=distance.slice(0,-1);
                $("#distance").val(distance);
            }
        })
    })
</script>

<body>
    <form style='width:50%;margin-left:200px;' method="POST" action='formlocation.php'>
        <label for="name">Location</label>


        <input type="text" id="name" name="location" value='<?php
$location = $edit_location->get_location_to_edit($_GET["id"]);
echo $location;
?>' disabled>


        <label for="name">Distance</label>
        <input type="text" id="distance" name="distance" value='<?php
$distance = $edit_location->get_distance_to_edit($_GET["id"]);
echo $distance;
?>'>


        <label for="Available">Available</label>
        <select name='available'>
            <?php
$edit = $edit_location->available($_GET['id']);
foreach ($edit as $key => $value) {
 if ($value['is_available'] == '1') {
  echo "<option value=" . $value["is_available"] . ">Available</option><option value='0'>Unavailable</option>";
 } else {
  echo "<option value=" . $value["is_available"] . ">Unavailable</option><option value='1'>Available</option>";
 }
}
?>

        </select>
        <input type="submit" value="Submit">
        <input type="text" name="id" value='<?php echo $_GET['id'] ?>' hidden>
    </form>
    </div>
</body>

</html>