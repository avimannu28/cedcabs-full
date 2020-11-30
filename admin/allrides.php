<?php 
    include_once './request.php';
    include './sidebar.php';
    $allride=new request();
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
            let selectedforall = $("#sort :selected").val()
            console.log(selectedforall)
            $.ajax({
                url: "admin_sort.php",
                type: "POST",
                data: {
                    selectedforall: selectedforall
                },
                success: function(response) {
                    $("#show").html(response)
                }
            });
        })

        $("#week").on("change", function(ev) {
            let weeksort = $("#week").val()
            $.ajax({
                url: "admin_sort.php",
                type: "POST",
                data: {
                    weeksort: weeksort
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
        <option value="date_asc">Date Ascending</option>
        <option value="date_desc">Date Decending</option>
    </select>
    <input type="week" id="week">
    <table>
        <thead>
            <tr>
                <th>From</th>
                <th>To</th>
                <th>Date</th>
                <th>Luggage</th>
                <th>Total Fare</th>

            </tr>
        </thead>
        <tbody id="show">
            <tr>
                <?php 
         $ride=$allride->allrides();
         $_SESSION["rides"]=count($ride);
        foreach($ride as $key=>$value){
          echo "<tr><td>".$value["from_location"]."</td><td>".$value["to_location"]."</td><td>".$value["ride_date"]."</td><td>".$value["luggage"]."</td><td>".$value["total_fare"]."</td></tr>";
        }

        ?>
            </tr>

        </tbody>
    </table>
</body>

</html>