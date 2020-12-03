<?php
class Fetch
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
 //show the location which is available
 public function locations()
 {
  $array = [];
  $sql   = mysqli_query($this->conn, "select * from tbl_location where is_available='1'");
  if (mysqli_num_rows($sql) > 0) {
   while ($row = mysqli_fetch_assoc($sql)) {
    array_push($array, $row);
   }
  }
  return $array;
 }
 // fetch pickup location distance
 public function pickup($current)
 {
  $sql = mysqli_query($this->conn, "select * from tbl_location");
  if (mysqli_num_rows($sql) > 0) {
   while ($row = mysqli_fetch_assoc($sql)) {
    if ($row["location_name"] == $current) {
     return $row["distance"];
    }
   }
  }
 }
 //fetch drop location distance
 public function drop($current)
 {
  $sql = mysqli_query($this->conn, "select * from tbl_location");
  if (mysqli_num_rows($sql) > 0) {
   while ($row = mysqli_fetch_assoc($sql)) {
    if ($row["location_name"] == $current) {
     return $row["distance"];
    }
   }
  }
 }

 
 

 public function completed($id)
 {
  $completed = [];
  $sql       = mysqli_query($this->conn, "SELECT * from tbl_ride where statuss='2' and customer_user_id=$id");
  while ($row = mysqli_fetch_assoc($sql)) {
   array_push($completed, $row);
  }
  return $completed;
 }
 public function pending($id)
 {
  $completed = [];
  $sql       = mysqli_query($this->conn, "SELECT * from tbl_ride where statuss='1' and customer_user_id=$id");
  while ($row = mysqli_fetch_assoc($sql)) {
   array_push($completed, $row);
  }
  return $completed;
 }
 public function canceled($id)
 {
  $completed = [];
  $sql       = mysqli_query($this->conn, "SELECT * from tbl_ride where statuss='0' and customer_user_id=$id");
  while ($row = mysqli_fetch_assoc($sql)) {
   array_push($completed, $row);
  }
  return $completed;
 }

 public function name_for_edit($id)
 {
  $sql = mysqli_query($this->conn, "SELECT * FROM tbl_user where user_id=$id");
  while ($row = mysqli_fetch_assoc($sql)) {
   return ($row["name_user"]);
  }
 }

 public function phone_for_edit($id)
 {
  $sql = mysqli_query($this->conn, "SELECT * FROM tbl_user where user_id=$id");
  while ($row = mysqli_fetch_assoc($sql)) {
   return ($row["mobile"]);
  }
 }

 public function update_profile($name, $phone, $id)
 {
  $sql = mysqli_query($this->conn, "UPDATE tbl_user SET name_user='$name',mobile='$phone' WHERE user_id='$id'");

 }
 public function total_ride_of_user($id)
 {
  $sum = 0;
  $sql = mysqli_query($this->conn, "SELECT * FROM tbl_ride where customer_user_id=$id and statuss='0'");
  while ($data = mysqli_fetch_assoc($sql)) {
   $sum = $sum + 1;
  }
  return $sum;
 }

 public function total_spend_of_user($id)
 {
  $sum = 0;
  $sql = mysqli_query($this->conn, "SELECT * FROM tbl_ride where customer_user_id=$id and statuss='2'");
  while ($data = mysqli_fetch_assoc($sql)) {
   $sum = $sum + $data["total_fare"];
  }
  return $sum;
 }

 public function ride_pending($id)
 {
  $sum = 0;
  $sql = mysqli_query($this->conn, "SELECT * FROM tbl_ride where customer_user_id=$id and statuss='1'");
  while ($data = mysqli_fetch_assoc($sql)) {
   $sum = $sum + 1;
  }
  return $sum;
 }

 //Completed Ride
 public function ride_completed($id)
 {
  $sum = 0;
  $sql = mysqli_query($this->conn, "SELECT * FROM tbl_ride where customer_user_id=$id and statuss='2'");
  while ($data = mysqli_fetch_assoc($sql)) {
   $sum = $sum + 1;
  }
  return $sum;
 }

 //grab last added id 
 public function last_added_id()
 {
  $sql = mysqli_query($this->conn, "SELECT * FROM tbl_ride ORDER BY ride_id DESC LIMIT 1");
  while ($data = mysqli_fetch_assoc($sql)) {
   return $data["ride_id"];
  }
 }

 public function cancel_by_user($id)
 {
  $sql = mysqli_query($this->conn, "DELETE FROM tbl_ride WHERE ride_id=$id");
  header("location:./index.php");
 }

 public function datefilter($current, $last, $id)
 {
  $date = [];
  $sql  = mysqli_query($this->conn, "SELECT * FROM tbl_ride WHERE customer_user_id ='$id' AND ride_date BETWEEN '$current' AND '$last'");
  while ($data = mysqli_fetch_assoc($sql)) {
   array_push($date, $data);
  }
  return ($date);
 }

//change password
 public function change_password($password, $id)
 {
  $password = md5($password);
  $sql      = mysqli_query($this->conn, "select password from tbl_user WHERE user_id=$id");
  while ($data = mysqli_fetch_assoc($sql)) {
   if ($password == $data["password"]) {
    return 1;
   } else {
    $sql = mysqli_query($this->conn, "UPDATE tbl_user SET password='$password' WHERE user_id=$id");
    return 2;
   }
  }

 }

 public function week_cancel($week,$id){
 $datas=[];
  $sql=mysqli_query($this->conn,"SELECT * from tbl_ride where week(ride_date)=$week and customer_user_id=$id");
  while($data=mysqli_fetch_assoc($sql)){
        array_push($datas,$data);
  }
  return $datas;
 }

 public function rideChart($id){
 $sql = mysqli_query($this->conn, "SELECT ride_date,sum(total_fare) as total_fare FROM tbl_ride where statuss='2' and ride_id=$id group by ride_date");
  return $sql;
 }

}
