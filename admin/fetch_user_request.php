<?php
include './sidebar.php';
include_once 'request.php';
$user = new request();
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
    <h1 style="text-align:center">User REQUESTS</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Date Of Signup</th>
                <th>isblock</th>
                <th>Permission</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php $row = $user->user_request();
foreach ($row as $key => $value) {
 echo "<tr><td>" . $value["user_id"] . "</td><td>" . $value["username"] . "</td><td>" . $value["name_user"] . "</td><td>" . $value["dateofsignup"] . "</td><td>" . $value["isblock"] . "</td><td><a href='grandacess.php?id=" . $value['user_id'] . "'style='color:red'>Unblock</a></td></tr>";
}

?>
            </tr>

        </tbody>
    </table>
</body>

</html>