<?php 
include_once './fetch.php';
 if(isset($_GET['id'])){
    $cancel_ride=new Fetch();
    $cancel_ride->cancel_by_user($_GET['id']);
 }
 if(!isset($_SESSION["isblock"])){
    header("location:../Login.php");
}

?>