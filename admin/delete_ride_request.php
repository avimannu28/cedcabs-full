<?php
include_once './request.php';
if (isset($_GET["id"])) {
 $cancel_ride = new request();
 $value       = $cancel_ride->cancel_ridereq($_GET["id"]);
 if ($value == 1) {
  header("location:./fetch_user_ride.php");
 }
}
