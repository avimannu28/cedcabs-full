<?php 
session_start();
    class request{
        var $host="localhost";
        var $user="root";
        var $pass="";
        var $db="cedcabs";    
        public $conn;


        public function __construct()
        {
            $this->conn=mysqli_connect($this->host,$this->user,$this->pass,$this->db); 
        }


        public function user_request(){
            $a=[];
            $sql=mysqli_query($this->conn,"select * from tbl_user where isblock='1'");
            if (mysqli_num_rows($sql) > 0) {
                while($row = mysqli_fetch_assoc($sql)) {
                   array_push($a,$row);
                }
              }
              return $a;
        }


        public function ride_request(){
            $a=[];
            $sql=mysqli_query($this->conn,"select * from tbl_ride where statuss='0'");
            if (mysqli_num_rows($sql)>0) {
                while($row = mysqli_fetch_assoc($sql)) {
                   array_push($a,$row);
                }
              }
              return $a;
        }



        public function access($id){
            $sql=mysqli_query($this->conn,"UPDATE tbl_user SET isblock='0' WHERE user_id=$id");
            header("location:fetch_user_request.php");

        }
    

    public function completedride(){
        $a=[];
        $sql=mysqli_query($this->conn,"select * from tbl_ride where statuss='2'");
            while($row = mysqli_fetch_assoc($sql)) {
                array_push($a,$row);    
          }
          return $a;
    }


    public function alluser(){
        $a=[];
        $sql=mysqli_query($this->conn,"select * from tbl_user where is_admin='0' and isblock='0'");
            if (mysqli_num_rows($sql) > 0) {
                while($row = mysqli_fetch_assoc($sql)) {
                   array_push($a,$row);
                }
            }
            return $a;
        }


    public function deleteuser($value){
        $sql=mysqli_query($this->conn,"UPDATE tbl_user SET isblock='1' WHERE user_id=$value");
        header("location:all_user.php");
    }


    public function request_cab($id){
        $sql=mysqli_query($this->conn,"UPDATE tbl_ride SET statuss='1' WHERE ride_id=$id");
        header("location:fetch_user_ride.php");


    }

    //location
    public function location(){
        $a=[];
        $sql=mysqli_query($this->conn,"select * from tbl_location");
            if (mysqli_num_rows($sql)>0) {
                while($row = mysqli_fetch_assoc($sql)) {
                  array_push($a,$row);
            }
            return $a;
    }}


    public function total_earning(){
        $sql=mysqli_query($this->conn,"SELECT * FROM tbl_ride where statuss='2'");
        $result=$sql->num_rows;
        $sum=0;
        while($data=mysqli_fetch_assoc($sql)){
           $sum+=$data['total_fare'];
        }
       return $sum;
    }


    public function get_location_to_edit($id){
        $sql=mysqli_query($this->conn,"SELECT * FROM tbl_location WHERE id=$id");
        $result=$sql->num_rows;
        if($result==1){
            while($row=mysqli_fetch_assoc($sql)){
                $id= $row["location_name"];
            }
        }
        return $id;
        
    }
    

    public function available($id){
        $a=[];
        $sql=mysqli_query($this->conn,"SELECT * FROM tbl_location Where id=$id");
        $result=$sql->num_rows;
        if($result==1){
            while($row=mysqli_fetch_assoc($sql)){
               array_push($a,$row);
            }
        }
        return($a);
    }


    public function get_distance_to_edit($id){
        $sql=mysqli_query($this->conn,"SELECT * FROM tbl_location WHERE id=$id");
        $result=$sql->num_rows;
        if($result==1){
            while($row=mysqli_fetch_assoc($sql)){
                $distance= $row["distance"];
            }
        }
        return $distance;
    }


    public function updated_location($distance,$available,$id){
        $sql=mysqli_query($this->conn,"UPDATE tbl_location SET distance='$distance',is_available='$available' WHERE id='$id'");
        header("location:./manage_location.php");
    }

    public function delete_location($id){
        $sql=mysqli_query($this->conn,"DELETE FROM tbl_location WHERE id=$id");
        header("location:./manage_location.php");
    }

    public function allrides(){
        $array=[];
        $sql=mysqli_query($this->conn,"SELECT * FROM tbl_ride");
        while($row=mysqli_fetch_assoc($sql)){
            array_push($array,$row);
        }
        return $array;
    }


    public function add_new_location($location,$distance,$available){
        $sql=mysqli_query($this->conn,"INSERT INTO tbl_location (location_name,distance,is_available)
        VALUES ('$location', '$distance', '$available')");
        header("location:./manage_location.php");
        echo $location;
    }

    public function fare_asc(){
        $acending_fare=[];
        $sql=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` where statuss='2' ORDER BY length(total_fare),`total_fare` ASC");
        while($row=mysqli_fetch_assoc($sql)){
          array_push($acending_fare,$row);
        }
        return $acending_fare;
      }
      public function fare_desc(){
        $acending_fare=[];
        $sql=mysqli_query($this->conn," SELECT * FROM `tbl_ride` WHERE statuss='2'  ORDER BY CAST(total_fare AS SIGNED) DESC");
        while($row=mysqli_fetch_assoc($sql)){
          array_push($acending_fare,$row);
        }
        return $acending_fare;
      }

    public function fare_asc_allride(){
        $acending_fare=[];
        $sql=mysqli_query($this->conn,"SELECT * FROM `tbl_ride`  ORDER BY length(total_fare),`total_fare` ASC");
        while($row=mysqli_fetch_assoc($sql)){
          array_push($acending_fare,$row);
        }
        return $acending_fare;

    }
    public function data(){
        $data=[];
        $sql=mysqli_query($this->conn,"SELECT EXTRACT(Day FROM ride_date),total_fare FROM `tbl_ride`");
        while($row=mysqli_fetch_assoc($sql)){
          
        }
        return $data;
    }


    public function fare_desc_allride(){
        $acending_fare=[];
        $sql=mysqli_query($this->conn," SELECT * FROM `tbl_ride` ORDER BY CAST(total_fare AS SIGNED) DESC");
        while($row=mysqli_fetch_assoc($sql)){
          array_push($acending_fare,$row);
        }
        return $acending_fare;
    }


    public function fare_asc_request(){
        $acending_fare=[];
        $sql=mysqli_query($this->conn," SELECT * FROM `tbl_ride` where statuss='0' ORDER BY length(ride_date),`ride_date` ASC");
        while($row=mysqli_fetch_assoc($sql)){
          array_push($acending_fare,$row);
        }
        return $acending_fare;

    }

    public function fare_desc_request(){
        $acending_fare=[];
        $sql=mysqli_query($this->conn," SELECT * FROM `tbl_ride` where statuss='0' ORDER BY length(ride_date),`ride_date` Desc  ");
        while($row=mysqli_fetch_assoc($sql)){
          array_push($acending_fare,$row);
        }
        return $acending_fare;

    }

    public function week_sort($week){
        $weeks=substr($week,6);
        $datas=[];
        $sql=mysqli_query($this->conn," SELECT * FROM `tbl_ride` where WEEK(ride_date)=$weeks");
        while($data=mysqli_fetch_array($sql)){
         array_push($datas,$data);
        } 
        return $datas;
    }


    public function date_desc_allride(){
        $acending_fare=[];
        $sql=mysqli_query($this->conn," SELECT * FROM `tbl_ride` ORDER BY length(ride_date),`ride_date`DESC");
        while($row=mysqli_fetch_assoc($sql)){
          array_push($acending_fare,$row);
        }
        return $acending_fare;

    }


    public function date_asc_allride(){
        $acending_fare=[];
        $sql=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` ORDER BY length(ride_date),`ride_date`ASC");
        while($row=mysqli_fetch_assoc($sql)){
          array_push($acending_fare,$row);
        }
        return $acending_fare;
    }

    public function invoice(){
        $invoice=[];
        $sql=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` where statuss='1' or statuss='2'");
        while($row=mysqli_fetch_assoc($sql)){
            array_push($invoice,$row);
        }
        return $invoice;
    }

    public function invoice_status($id){
        $sql=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` where ride_id=$id");
        while($data=mysqli_fetch_assoc($sql)){
           if($data["statuss"]==1){
               return "Pending";
           }else{
               return "Successfully completed";
           }
        }
    }

    public function from_invoice($id){
        $sql=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` where ride_id=$id");
        while($data=mysqli_fetch_assoc($sql)){
            return $data["from_location"];
         }
    }
    public function to_invoice($id){
        $sql=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` where ride_id=$id");
        while($data=mysqli_fetch_assoc($sql)){
            return $data["to_location"];
         }
    }

    public function fare_invoice($id){
        $sql=mysqli_query($this->conn,"SELECT * FROM `tbl_ride` where ride_id=$id");
        while($data=mysqli_fetch_assoc($sql)){
            return $data["total_fare"];
         }
    }

    public function delete_completed($id){
        $sql=mysqli_query($this->conn,"DELETE FROM tbl_ride where statuss='2' and ride_id=$id");
        header("location:completed_ride.php");
    }

    public function name_sort_asc(){
        $name_asc=[];
        $sql=mysqli_query($this->conn,"SELECT * FROM tbl_user where isblock='0' and is_admin='0' ORDER BY username ASC");
        while($data=mysqli_fetch_assoc($sql)){
            array_push($name_asc,$data);
        }
        return $name_asc;
    }
    public function name_sort_desc(){
        $name_asc=[];
        $sql=mysqli_query($this->conn,"SELECT * FROM tbl_user where isblock='0' and is_admin='0' ORDER BY username desc");
        while($data=mysqli_fetch_assoc($sql)){
            array_push($name_asc,$data);
        }
        return $name_asc;
    }
    public function name_date_desc(){
        $name_asc=[];
        $sql=mysqli_query($this->conn,"SELECT * FROM tbl_user where isblock='0' and is_admin='0' ORDER BY length(dateofsignup),`dateofsignup`DESC");
        while($data=mysqli_fetch_assoc($sql)){
            array_push($name_asc,$data);
        }
        return $name_asc;
    }
    public function name_date_asc(){
        $name_asc=[];
        $sql=mysqli_query($this->conn,"SELECT * FROM tbl_user where isblock='0' and is_admin='0' ORDER BY length(dateofsignup),`dateofsignup` ASC");
        while($data=mysqli_fetch_assoc($sql)){
            array_push($name_asc,$data);
        }
        return $name_asc;
    }
}
?>