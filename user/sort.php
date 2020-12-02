<?php 
session_start();
    include_once './fetch.php';
    $sort=new Fetch();
    if(isset($_POST["selected"])){
        if($_POST["selected"]=="date_desc"){
            $date_desc=$sort->date_decending($_SESSION["user_id"]);
            foreach($date_desc as $key=>$value){
                if($value["statuss"]=='0'){
                    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Wait to confirm</td></tr>";
                }elseif($value["statuss"]=='1'){
                    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Pending</td></tr>";
                }
                else{
                    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Completed</td></tr>";
                }
               
            }
        }
        if($_POST["selected"]=="date_asc"){
            $date_asc=$sort->date_acending($_SESSION["user_id"]);
            foreach($date_asc as $key=>$value){
                if($value["statuss"]=='0'){
                    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Wait to confirm</td></tr>";
                }elseif($value["statuss"]=='1'){
                    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Pending</td></tr>";
                }
                else{
                    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Completed</td></tr>";
                }
               
            }
        }

        if($_POST["selected"]=="fare_asc"){
            $fare_asc=$sort->fare_asc($_SESSION["user_id"]);
            foreach($fare_asc as $key=>$value){
                if($value["statuss"]=='0'){
                    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Wait to confirm</td></tr>";
                }elseif($value["statuss"]=='1'){
                    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Pending</td></tr>";
                }
                else{
                    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Completed</td></tr>";
                }
               
            }
        }

        if($_POST["selected"]=="fare_desc"){
            $fare_desc=$sort->fare_desc($_SESSION["user_id"]);
            foreach($fare_desc as $key=>$value){
                if($value["statuss"]=='0'){
                    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Wait to confirm</td></tr>";
                }elseif($value["statuss"]=='1'){
                    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Pending</td></tr>";
                }
                else{
                    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Completed</td></tr>";
                }
               
            }

        }

        if($_POST['selected']=='completed'){
            $completed=$sort->completed($_SESSION["user_id"]);
            foreach($completed as $key=>$value){
                echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Completed</td></tr>";
        } }
        if($_POST['selected']=='pending'){
            $pending=$sort->pending($_SESSION["user_id"]);
            foreach($pending as $key=>$value){
                echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Pending</td></tr>";
        }
    }
    if($_POST['selected']=='canceled'){
        $pending=$sort->canceled($_SESSION["user_id"]);
        foreach($pending as $key=>$value){
            echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Canceled</td></tr>";
    }
}
       
    }

    if(isset($_POST["filter"])){
        $pending=$sort->datefilter($_POST['current'],$_POST['last'],$_SESSION["user_id"]);
        foreach($pending as $key=>$value){
           
                if($value["statuss"]=='0'){
                    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Wait to confirm</td></tr>";
                }elseif($value["statuss"]=='1' && $value['is_cancel']=='0'){
                    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Pending</td></tr>";
                }elseif($value['is_cancel']=='1'){
                    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Canceled</td></tr>";
                }
                else{
                    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Completed</td></tr>";
                }
    }
    }
?>