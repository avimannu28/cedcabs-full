<?php
include_once './request.php';
$sort = new request();
if (!isset($_SESSION["admin"])) {
 header("location:../Login.php");
}
if (isset($_POST["selected"])) {
 if ($_POST["selected"] == "fare_asc") {
  if ($_POST["selected"] == "fare_asc") {
   $fare_asc = $sort->fare_asc();
   foreach ($fare_asc as $key => $value) {
    echo "<tr><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[luggage]</td><td>$value[total_fare]</td><td><a href=''>Delete </a></td></tr>";
   }
  }
 }
 if ($_POST["selected"] == "fare_desc") {
  $fare_asc = $sort->fare_desc();
  foreach ($fare_asc as $key => $value) {
   echo "<tr><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[luggage]</td><td>$value[total_fare]</td><td><a href=''>Delete </a></td></tr>";

  }
 }
}
if (isset($_POST["selectedforall"])) {
 if ($_POST["selectedforall"] == "fare_asc") {
  $fare_asc = $sort->fare_asc_allride();
  foreach ($fare_asc as $key => $value) {
   echo "<tr><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[ride_date]</td><td>$value[luggage]</td><td>$value[total_fare]</td></tr>";
  }
 }

 if ($_POST["selectedforall"] == "fare_desc") {
  $fare_desc = $sort->fare_desc_allride();
  foreach ($fare_desc as $key => $value) {
   echo "<tr><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[ride_date]</td><td>$value[luggage]</td><td>$value[total_fare]</td></tr>";
  }
 }

 if ($_POST["selectedforall"] == "date_desc") {
  $date_desc = $sort->date_desc_allride();
  foreach ($date_desc as $key => $value) {
   echo "<tr><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[ride_date]</td><td>$value[luggage]</td><td>$value[total_fare]</td></tr>";
  }
 }
 if ($_POST["selectedforall"] == "date_asc") {
  $date_asc = $sort->date_asc_allride();
  foreach ($date_asc as $key => $value) {
   echo "<tr><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[ride_date]</td><td>$value[luggage]</td><td>$value[total_fare]</td></tr>";
  }
 }
}

if (isset($_POST["riderequest"])) {
 if ($_POST["riderequest"] == "date_asc") {
  $fare_desc = $sort->fare_asc_request();
  foreach ($fare_desc as $key => $value) {
   echo "<tr><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[ride_date]</td><td>$value[luggage]</td><td>$value[total_fare]</td><td><a href='accept_ride.php?id=" . $value['ride_id'] . "'>Confirm </a>|<a href=''> Cancel</a></td></tr>";
  }
 }
 if ($_POST["riderequest"] == "date_desc") {
  $fare_asc = $sort->fare_desc_request();
  foreach ($fare_asc as $key => $value) {
   echo "<tr><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[ride_date]</td><td>$value[luggage]</td><td>$value[total_fare]</td><td><a href='accept_ride.php?id=" . $value['ride_id'] . "'>Confirm </a>|<a href=''> Cancel</a></td></tr>";
  }
 }
}

if (isset($_POST["weeksort"])) {

 $sort_week = $sort->week_sort($_POST["weeksort"]);
 foreach ($sort_week as $key => $value) {
  echo "<tr><td>$value[from_location]</td><td>$value[to_location]</td><td>$value[ride_date]</td><td>$value[luggage]</td><td>$value[total_fare]</td></tr>";
 }
}

if (isset($_POST["unblockuser"])) {
 if ($_POST["unblockuser"] == "name_asc") {
  $name_asc = $sort->name_sort_asc();
  foreach ($name_asc as $key => $value) {
   echo "<tr><td>" . $value["user_id"] . "</td><td>" . $value["username"] . "</td><td>" . $value["name_user"] . "</td><td>" . $value["dateofsignup"] . "</td><td>" . $value["isblock"] . "</td><td><a href='deleteuser.php?id=" . $value['user_id'] . "'>block</a></td></tr>";
  }
 }
 if ($_POST["unblockuser"] == "name_desc") {
  $name_asc = $sort->name_sort_desc();
  foreach ($name_asc as $key => $value) {
   echo "<tr><td>" . $value["user_id"] . "</td><td>" . $value["username"] . "</td><td>" . $value["name_user"] . "</td><td>" . $value["dateofsignup"] . "</td><td>" . $value["isblock"] . "</td><td><a href='deleteuser.php?id=" . $value['user_id'] . "'>block</a></td></tr>";
  }
 }
 if ($_POST["unblockuser"] == "date_desc") {
  $name_asc = $sort->name_date_desc();
  foreach ($name_asc as $key => $value) {
   echo "<tr><td>" . $value["user_id"] . "</td><td>" . $value["username"] . "</td><td>" . $value["name_user"] . "</td><td>" . $value["dateofsignup"] . "</td><td>" . $value["isblock"] . "</td><td><a href='deleteuser.php?id=" . $value['user_id'] . "'>block</a></td></tr>";
  }
 }
 if ($_POST["unblockuser"] == "date_asc") {
  $name_asc = $sort->name_date_asc();
  foreach ($name_asc as $key => $value) {
   echo "<tr><td>" . $value["user_id"] . "</td><td>" . $value["username"] . "</td><td>" . $value["name_user"] . "</td><td>" . $value["dateofsignup"] . "</td><td>" . $value["isblock"] . "</td><td><a href='deleteuser.php?id=" . $value['user_id'] . "'>block</a></td></tr>";
  }
 }

}
