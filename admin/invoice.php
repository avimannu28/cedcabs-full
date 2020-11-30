<?php

    include './sidebar.php';
    include_once './request.php';
    $ride=new request();
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
</head>

<body>

    <table>
        <thead>
            <tr>
                <th>User Id</th>
                <th>FROM</th>
                <th>To</th>
                <th>Fare</th>
                <th>Print Invoice</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <?php 
        $row=$ride->invoice();
        foreach($row as $key=>$value){
            echo "<tr><td>$value[customer_user_id]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td><a href='print_invoice.php?id=".$value['ride_id']."'>Print</a></td></tr>";
        }
        
        ?>
            </tr>

        </tbody>
    </table>
</body>

</html>