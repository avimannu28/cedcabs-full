<?php
include_once './request.php';
$location = $_POST["location"];
if (!isset($_SESSION["admin"])) {
 header("location:../Login.php");
}

$distance     = $_POST["distance"];
$available    = $_POST["available"];

$add_location = new request();
if ($location == "" || $distance == "" || $available == "") {
 echo "<script>alert('Fill All Field First')</script>";
} else {
 $add_location->add_new_location($location, $distance, $available);
}
