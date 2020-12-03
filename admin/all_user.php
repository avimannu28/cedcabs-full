<?php
include 'sidebar.php';
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
    <script>
    $(document).ready(function() {
        $("#sort").on("click", function(ev) {
            let unblockuser = $("#sort :selected").val()
            console.log("ok");

            $.ajax({
                url: "admin_sort.php",
                type: "POST",
                data: {
                    unblockuser: unblockuser
                },
                success: function(response) {
                    $("#show").html(response)
                }
            });
        })
    })
    </script>
</head>

<body>
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
        <select name="sort by" id="sort" style="margin-left:300px;margin-top:50px">
            <option value="name_asc">UserName acending</option>
            <option value="name_desc">UserName Decending</option>
            <option value="date_asc">Date Ascending</option>
            <option value="date_desc">Date Decending</option>
        </select>
        <tbody id="show">
            <tr>
                <?php
$row                  = $user->alluser();
$_SESSION["all_user"] = count($row);
foreach ($row as $key => $value) {
 echo "<tr><td>" . $value["user_id"] . "</td><td>" . $value["username"] . "</td><td>" . $value["name_user"] . "</td><td>" . $value["dateofsignup"] . "</td><td>" . $value["isblock"] . "</td><td><a href='deleteuser.php?id=" . $value['user_id'] . "'>block</a></td></tr>";
}
?>
            </tr>

        </tbody>
    </table>
</body>

</html>