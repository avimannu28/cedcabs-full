<?php
session_start();
require './fetch.php';
$total=0;
$location=new Fetch();
$cal_current=0;
$cal_destination=0;
if(isset($_POST["current"])){
    $current=$_POST["current"];
    $destination=$_POST["destination"];
    $cab=$_POST["selected"];
    $luggages=$_POST["luggages"];
    $pickup=$location->pickup($current);
    $drop=$location->drop($destination);
    $cab_distance=abs($pickup-$drop);
    $distance=$cab_distance;
    $_SESSION["distance"]=$distance;
      
    //Luggages Validation
    if($luggages<=10 && $luggages>0){
        $total=50;
    }
    else if($luggages<=20 && $luggages>10){
        $total=100;
    }
    elseif($luggages>20){
        $total=200;
    }

    //if this cedsuv then luggage charge is double
    if($cab=="CedSUV"){
        $total=$total*2;
    }

    //cedmicro
    if($cab=="CedMicro"){
        $total+=50;
            if($cab_distance>0 && $cab_distance<=10){
                $total+=$cab_distance*13.50;
                $cab_distance=$cab_distance-10; 
                echo($total);
            }
              else if($cab_distance>10&&$cab_distance<=60){
                  $first=$cab_distance-10;
                  $total+=abs(($first*12))+(10*13.50);
                   echo($total);
            }
              else if($cab_distance>60&&$cab_distance<=160){
                  $first=0;
                  $secound=0;
                  $first=$cab_distance-10;
                  $secound=$first-50;
                  $total+=(50*12.0)+(10*13.50)+abs($secound*10.20);
                  echo($total);
            }
              else{
                  $first=$cab_distance-10;
                  $secound=$first-50;
                  $third=abs($secound-100);
                  $total=$total+(10*13.50)+(50*12)+(100*10.20)+($third*8.50);
                  echo $total;
               }
        }

         //cedmini
        if($cab=="CedMini"){
            $total+=150;
            if($cab_distance>0 && $cab_distance<=10){
                $total+=$cab_distance*14.50;
                $cab_distance=$cab_distance-10; 
                echo($total);
            }
            else if($cab_distance>10&&$cab_distance<=60){
                $first=$cab_distance-10;
                $total+=abs(($first*13))+(10*14.50);
                echo($total);
            }
            else if($cab_distance>60&&$cab_distance<=160){
                $first=$cab_distance-10;
                $secound=$first-50;
                $total+=(10*14.50)+(50*13.0)+$secound*11.20;
                echo($total);
            }
            else{
                $first=$cab_distance-10;
                $secound=$first-50;
                $third=$secound-100;
                $total=$total+(10*14.50)+(50*13.0)+(100*11.20)+($third*9.50);
                echo($total);
               }
        }
        //cedroyal
        if($cab=="CedRoyal"){
            $total+=200;
            if($cab_distance>0 && $cab_distance<=10){
                $total+=$cab_distance*15.50;
                $cab_distance=$cab_distance-10; 
                echo($total);
            }
            else if($cab_distance>10&&$cab_distance<=60){
                $first=$cab_distance-10;
                $total+=abs(($first*14))+(10*15.50);
                echo($total);
            }
            else if($cab_distance>60&&$cab_distance<=160){
                $first=$cab_distance-10;
                $secound=$first-50;
                $total+=(10*15.50)+(50*14.0)+$secound*12.20;
                echo($total);
            }
            else{
                $first=$cab_distance-10;
                $secound=$first-50;
                $third=$secound-100;
                $total=$total+(10*15.50)+(50*14.0)+(100*12.20)+($third*10.50);
                echo($total);
               }
        }
      //cedsuv
        if($cab=="CedSUV"){
            $total+=250;
            if($cab_distance>0 && $cab_distance<=10){
                $total+=$cab_distance*16.50;
                $cab_distance=$cab_distance-10; 
                echo($total);
            }
            else if($cab_distance>10&&$cab_distance<=60){
                $first=$cab_distance-10;
                $total+=abs(($first*15))+(10*16.50);
                echo($total);
            }
            else if($cab_distance>60&&$cab_distance<=160){
                $first=$cab_distance-10;
                $secound=$first-50;
                $total+=(10*16.50)+(50*15.0)+$secound*13.20;
                echo($total);
            }
            else{
                $first=$cab_distance-10;
                $secound=$first-50;
                $third=$secound-100;
                $total=$total+(10*16.50)+(50*15.0)+(100*13.20)+($third*11.50);
                echo($total);
            }
        } 
    }
?>