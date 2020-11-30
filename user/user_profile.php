<?php

include_once './fetch.php';
$profile=new Fetch();
session_start();
if(isset($_POST["logout"])){
    session_destroy();
    header("location:../Login.php");
}
if(!isset($_SESSION["isblock"])){
    header("location:../Login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style2.css">
    <link rel="stylesheet" href="../assets/fetchuser1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="data.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>
<script>
$(document).ready(function() {
    $("#sort").on("click", function(ev) {
        let selected = $("#sort :selected").val()
        console.log(selected);
        $.ajax({
            url: "sort.php",
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


<body>
    <form method="post">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <img class="navbar-brand img-responsive" src='../logo.png' height=100 width=200>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto pl-auto text-center" id='active'>
                        <li class="nav-item mr-4">
                            <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ml-2">
                            <a class="nav-link" href='edit_profile.php?id=<?php echo $_SESSION["user_id"] ?>'>Edit
                                Profile</a>
                        </li>

                        <form action="post">
                            <input type="submit" name="logout" value="logout"
                                style="background-color:white;border:none;">
                        </form>
                    </ul>
                </div>
            </nav>
        </div>
    </form>
    <label for="Sorting" style="margin-left:600px">Sort By:</label>
    <select name="sort by" id="sort">
        <option value="date_asc">Date Ascending</option>
        <option value="date_desc">Date Decending</option>
        <option value="fare_asc">Fare Ascending</option>
        <option value="fare_desc">Fare Decending</option>
    </select>
    <table>
        <thead>
            <tr>
                <th>Dates</th>
                <th>From</th>
                <th>To</th>
                <th>Spend On Ride</th>
            </tr>
        </thead>
        <tbody id="show">
            <tr>
                <?php 
            
            $row=$profile->profiles($_SESSION["user_id"]);
            foreach($row as $key=>$value){
                echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td></tr>";
            }
            ?>
            </tr>

        </tbody>
    </table>
    <p id="Price"></p>
</body>

</html>