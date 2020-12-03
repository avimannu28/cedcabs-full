<?php
include './sidebar.php';
include_once './request.php';
$ride = new request();
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
    <link rel="stylesheet" href="../assets/fetchuser1.css">
</head>

<body>
    <h1 style="text-align:center">Manage Locations</h1>
    <table>
        <thead>
            <tr>
                <th>Location Name</th>
                <th>Location Distance</th>
                <th>Availablilty</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
$row = $ride->location();
foreach ($row as $key => $value) {
 if ($value["is_available"] == 0) {
  echo "<tr><td>$value[location_name]</td><td>$value[distance]</td><td>Unavailable</td><td><a href='edit_location.php?id=" . $value['id'] . "'>Edit</a></td><td><a href='delete_location.php?id=" . $value['id'] . "'>DELETE</a></td></td></tr>";
 } else {
  echo "<tr><td>$value[location_name]</td><td>$value[distance]</td><td>Available</td><td><a href='edit_location.php?id=" . $value['id'] . "'>Edit</a></td><td><a href='delete_location.php?id=" . $value['id'] . "'>DELETE</a></td></td></tr>";
 }
}
?>
            </tr>

        </tbody>
    </table>
</body>

</html>