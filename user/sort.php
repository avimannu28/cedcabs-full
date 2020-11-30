<?php 
session_start();
    include_once './fetch.php';
    $sort=new Fetch();
    if(isset($_POST["selected"])){
        if($_POST["selected"]=="date_desc"){
            $date_desc=$sort->date_decending($_SESSION["user_id"]);
            foreach($date_desc as $key=>$value){
                echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td></tr>";
            }
        }
        if($_POST["selected"]=="date_asc"){
            $date_asc=$sort->date_acending($_SESSION["user_id"]);
            foreach($date_asc as $key=>$value){
                echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td></tr>";
            }
        }

        if($_POST["selected"]=="fare_asc"){
            $fare_asc=$sort->fare_asc($_SESSION["user_id"]);
            foreach($fare_asc as $key=>$value){
                echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td></tr>";
            }
        }

        if($_POST["selected"]=="fare_desc"){
            $fare_desc=$sort->fare_desc($_SESSION["user_id"]);
            foreach($fare_desc as $key=>$value){
                echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td></tr>";
            }

        }
    }
?>