<?php
    include './sidebar.php';
    include_once './request.php';
    $all=new request();
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
    <link rel="stylesheet" href="../assets/fetchuser1.css">
    <script>
    $(document).ready(function() {
        $("#sort").on("click", function(ev) {
            let selected = $("#sort :selected").val()
            console.log(selected);
            $.ajax({
                url: "admin_sort.php",
                type: "POST",
                data: {
                    selected: selected
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
    <label for="Sorting" style="margin-left:600px;margin-top:50px;">Sort By:</label>
    <select name="sort by" id="sort">
        <option value="fare_asc">Fare Ascending</option>
        <option value="fare_desc">Fare Decending</option>
    </select>
    <table>
        <thead>
            <tr>
                <th>From</th>
                <th>To</th>
                <th>Luggage</th>
                <th>Total Fare</th>
                <th>Permission</th>
            </tr>
        </thead>
        <tbody id="show">
            <tr>
                <?php 
        $row=$all->completedride();
       
        foreach($row as $key=>$value){
          echo "<tr><td>".$value["from_location"]."</td><td>".$value["to_location"]."</td><td>".$value["luggage"]."</td><td>".$value["total_fare"]."</td><td><a href='delete_completed.php?id=".$value["ride_id"]."'>Delete </a></td></tr>";
        }

        ?>
            </tr>

        </tbody>
    </table>
</body>

</html>