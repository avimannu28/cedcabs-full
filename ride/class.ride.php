<?php
session_start();

class ride
{
 public $host = "localhost";
 public $user = "root";
 public $pass = "";
 public $db   = "cedcabs";
 public $conn;
 public function __construct()
 {
  $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
 }
 public function rider($current, $destination, $total_distance, $luggage, $total_fare, $user_id)
 {
  $sql = mysqli_query($this->conn, "INSERT INTO tbl_ride(ride_date,from_location,to_location,total_distance,luggage,total_fare,statuss,customer_user_id)
            VALUES(NOW(),'$current','$destination','$total_distance','$luggage','$total_fare',1,'$user_id')");
  $_SESSION["booked"] = $current;

 }
 public function ride_success()
 {
  $sql = mysqli_query($this->conn, "select * from tbl_ride where customer_user_id=$_SESSION[user_id] and statuss='1'");
  echo "<script>alert('Booked Successfully')</script>";

 }

 public function rideChart()
 {
  $sql = mysqli_query($this->conn, "SELECT ride_date,sum(total_fare) as total_fare FROM tbl_ride where statuss='2' group by ride_date ");
  return $sql;
 }
}
