<?php
session_start();
include_once './fetch.php';
$sort = new Fetch();


if (isset($_POST["filter"])) {
 if ($_POST['cancel'] == 'cancel') {
  $pending = $sort->datefilter($_POST['current'], $_POST['last'], $_SESSION["user_id"]);
  foreach ($pending as $key => $value) {
   if ($value['statuss'] == '0') {
    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Canceled</td></tr>";
   }
  }
 } elseif ($_POST['cancel'] == 'pending') {
  $pending = $sort->datefilter($_POST['current'], $_POST['last'], $_SESSION["user_id"]);
  foreach ($pending as $key => $value) {
   if ($value['statuss'] == '1') {
    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Pending</td></tr>";
   }
  }
 } elseif ($_POST['cancel'] == 'completed') {
  $pending = $sort->datefilter($_POST['current'], $_POST['last'], $_SESSION["user_id"]);
  foreach ($pending as $key => $value) {
   if ($value['statuss'] == '2') {
    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Pending</td></tr>";

   }
  }
 }
}

if (isset($_POST["cancel"])) {
 $value = $_POST["cancel"];
 if ($value == "week_cancel") {
  $weeks = $_POST["weeks"];
  $weeks = $sort->week_cancel($weeks, $_SESSION['user_id']);
  foreach ($weeks as $key => $value) {
   if ($value['statuss'] == '0') {
    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Canceled</td></tr>";
   }
  }
 }
 if ($value == "week_pending") {
  $weeks = $_POST["weeks"];
  $weeks = $sort->week_cancel($weeks, $_SESSION['user_id']);
  foreach ($weeks as $key => $value) {
   if ($value['statuss'] == '1') {
    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Pending</td></tr>";
   }

  }
 }

 if ($value == "week_completed") {
  $weeks = $_POST["weeks"];
  $weeks = $sort->week_cancel($weeks, $_SESSION['user_id']);
  foreach ($weeks as $key => $value) {
   if ($value['statuss'] == '2') {
    echo "<tr><td>$value[ride_date]</td><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[total_fare]</td><td>Completed</td></tr>";
   }

  }
 }
}
