<?php 
    class Fetch{ 
        var $host="localhost";
        var $user="root";
        var $pass="";
        var $db="cedcabs";    
        public $conn;


        public function __construct()
        {
            $this->conn=mysqli_connect($this->host,$this->user,$this->pass,$this->db); 
        }
        public function locations(){
          $array=[];
            $sql=mysqli_query($this->conn,"select * from tbl_location where is_available='1'");
            if (mysqli_num_rows($sql) > 0) {
                while($row = mysqli_fetch_assoc($sql)) {
                  array_push($array,$row);
                }
              }
              return $array;
        }
        public function pickup($current){
            $sql=mysqli_query($this->conn,"select * from tbl_location");
            if (mysqli_num_rows($sql) > 0) {
                while($row = mysqli_fetch_assoc($sql)) {
                  if($row["location_name"]==$current){
                      return $row["distance"];
                  }
                }
              }
        }  
        public function drop($current){
            $sql=mysqli_query($this->conn,"select * from tbl_location");
            if (mysqli_num_rows($sql) > 0) {
                while($row = mysqli_fetch_assoc($sql)) {
                  if($row["location_name"]==$current){
                      return $row["distance"];
                  }
                }
              }
        }     
        
        public function profiles($id){
          $array=[];
          $sql=mysqli_query($this->conn,"select * from tbl_ride where customer_user_id=$id");
          while($row=mysqli_fetch_assoc($sql)){
            array_push($array,$row);
            
          }
          return $array;
        }

        public function date_decending($id){
          $decending_date=[];
          $sql=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE customer_user_id='$id' ORDER BY length(ride_date),`ride_date` DESC");
          while($row=mysqli_fetch_assoc($sql)){
            array_push($decending_date,$row);
          }
          return $decending_date;
        }
        public function date_acending($id){
          $acending_date=[];
          $sql=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE customer_user_id='$id' ORDER BY length(ride_date),`ride_date` ASC");
          while($row=mysqli_fetch_assoc($sql)){
            array_push($acending_date,$row);
          }
          return $acending_date;
        }
        public function fare_desc($id){
          $decending_fare=[];
          $sql=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE  customer_user_id='$id' ORDER BY CAST(total_fare AS SIGNED) DESC");
          while($row=mysqli_fetch_assoc($sql)){
            array_push($decending_fare,$row);
          }
          return $decending_fare;
        }
        public function fare_asc($id){
          $acending_fare=[];
          $sql=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` WHERE customer_user_id='$id' ORDER BY length(total_fare),`total_fare` ASC");
          while($row=mysqli_fetch_assoc($sql)){
            array_push($acending_fare,$row);
          }
          return $acending_fare;
        }

        public function completed($id){
          $completed=[];
          $sql=mysqli_query($this->conn,"SELECT * from tbl_ride where statuss='2' and customer_user_id=$id");
          while($row=mysqli_fetch_assoc($sql)){
            array_push($completed,$row);
          }
          return $completed;
        }
        public function pending($id){
          $completed=[];
          $sql=mysqli_query($this->conn,"SELECT * from tbl_ride where statuss='1' and customer_user_id=$id");
          while($row=mysqli_fetch_assoc($sql)){
            array_push($completed,$row);
          }
          return $completed;
        }
        public function canceled($id){
          $completed=[];
          $sql=mysqli_query($this->conn,"SELECT * from tbl_ride where is_cancel='1' and customer_user_id=$id");
          while($row=mysqli_fetch_assoc($sql)){
            array_push($completed,$row);
          }
          return $completed;
        }

        public function name_for_edit($id){
          $sql=mysqli_query($this->conn,"SELECT * FROM tbl_user where user_id=$id");
          while($row=mysqli_fetch_assoc($sql)){
            return($row["name_user"]);
          }
        }

        public function phone_for_edit($id){
          $sql=mysqli_query($this->conn,"SELECT * FROM tbl_user where user_id=$id");
          while($row=mysqli_fetch_assoc($sql)){
            return($row["mobile"]);
          }
        }


        public function update_profile($name,$phone,$id){
          $sql=mysqli_query($this->conn,"UPDATE tbl_user SET name_user='$name',mobile='$phone' WHERE user_id='$id'");
         

        }
       public function total_ride_of_user($id){
         $sum=0;
         $sql=mysqli_query($this->conn,"SELECT * FROM tbl_ride where customer_user_id=$id and is_cancel='0'");
         while($data=mysqli_fetch_assoc($sql)){
           $sum=$sum+1;
         }
         return $sum;
       }



       public function total_spend_of_user($id){
            $sum=0;
         $sql=mysqli_query($this->conn,"SELECT * FROM tbl_ride where customer_user_id=$id and statuss='2' and is_cancel='0'");
         while($data=mysqli_fetch_assoc($sql)){
           $sum=$sum+$data["total_fare"];
         }
         return $sum;
       }

       public function ride_pending($id){
        $sum=0;
     $sql=mysqli_query($this->conn,"SELECT * FROM tbl_ride where customer_user_id=$id and statuss='1'");
     while($data=mysqli_fetch_assoc($sql)){
       $sum=$sum+1;
     }
     return $sum;
   }
        public function ride_completed($id){
          $sum=0;
          $sql=mysqli_query($this->conn,"SELECT * FROM tbl_ride where customer_user_id=$id and statuss='2'");
          while($data=mysqli_fetch_assoc($sql)){
            $sum=$sum+1;
      }
      return $sum;
}
    public function last_added_id(){
      $sql=mysqli_query($this->conn,"SELECT * FROM tbl_ride ORDER BY ride_id DESC LIMIT 1");
      while($data=mysqli_fetch_assoc($sql)){
        return $data["ride_id"];
      }
    }

    public function cancel_by_user($id){
      $sql=mysqli_query($this->conn,"UPDATE tbl_ride SET is_cancel='0' WHERE ride_id=$id");
     header("location:./index.php");
    }

    public function datefilter($current,$last,$id){
      $date=[];
      $sql=mysqli_query($this->conn,"SELECT * FROM tbl_ride WHERE customer_user_id ='$id' AND ride_date BETWEEN '$current' AND '$last'");
      while($data=mysqli_fetch_assoc($sql)){
      array_push($date,$data);
      }
      return($date);
    }


    }
    
?>