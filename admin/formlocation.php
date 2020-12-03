<?php
include_once './request.php';
$distance  = $_POST['distance'];
$available = $_POST['available'];
$id        = $_POST["id"];
$edit      = new request();
$edit->updated_location($distance, $available, $id);
if (!isset($_SESSION["admin"])) {
 header("location:../Login.php");
}