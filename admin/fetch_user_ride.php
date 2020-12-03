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
    <script>
    $(document).ready(function(){
        $("#sort").on("click",function(ev){
            let riderequest = $("#sort :selected").val()
          console.log(riderequest)
            $.ajax({
                url: "admin_sort.php",
                type: "POST",
                data: {riderequest:riderequest},
                success: function(response) {
                    $("#show").html(response)
                }
            });
        })
    })
</script>
</head>
<body>
<label for="Sorting" style="margin-left:600px;margin-top:50px;">Sort By:</label>
  <select name="sort by" id="sort">
    <option value="date_asc">Date Ascending</option>
    <option value="date_desc">Date Decending</option>
  </select>
<table>
  <thead>
    <tr>
      <th>From</th>
      <th>To</th>
      <th>Date</th>
      <th>Luggage</th>
      <th>Total Fare</th>
      <th>Permission</th>
    </tr>
  </thead>
  <tbody id="show">
    <tr>
        <?php
$name = $ride->ride_request();
foreach ($name as $key => $value) {
 echo "<tr><td>" . $value["from_location"] . "</td><td>" . $value["to_location"] . "</td><td>" . $value['ride_date'] . "</td><td>" . $value["luggage"] . "</td><td>" . $value["total_fare"] . "</td><td><a href='accept_ride.php?id=" . $value['ride_id'] . "'>Confirm </a>|<a href='delete_ride_request.php?id=".$value['ride_id']."'> Cancel</a></td></tr>";
}
?>
    </tr>

  </tbody>
</table>
</body>
</html>
