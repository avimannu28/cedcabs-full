<?php 
  session_start();
  class User{
    var $host="localhost";
    var $user="root";
    var $pass="";
    var $db="cedcabs";    
    public $conn;
    public function __construct()
	{
        $this->conn=mysqli_connect($this->host,$this->user,$this->pass,$this->db); 
	}
    public function signup($username,$name,$mobile,$password){
        $password=md5($password);
        $sql= mysqli_query($this->conn, "INSERT INTO tbl_user (username,name_user,dateofsignup,mobile,isblock,password,is_admin)
        VALUES('$username','$name',NOW(),'$mobile','1','$password','0')");
        echo $sql;
        header("location:./Login.php");
    }
    public function login($username,$password){
        $password=md5($password);
        $sql=mysqli_query($this->conn,"select * from tbl_user where username='$username' and password='$password'");
        $result=$sql->num_rows;
        if($result==1){
            while($data=mysqli_fetch_assoc($sql)){
                if($data["isblock"]=="0"){
                    if($data["is_admin"]==1){
                        $_SESSION["admin"]=$data["is_admin"];
                        header("location:./admin/index.php");
                      
                    }
                    else{
                        if($data["isblock"]=='0'){
                            $_SESSION["isblock"]=$data["isblock"];
                            $_SESSION["user_id"]=$data["user_id"];
                            header("location:./user/index.php");
                        }   
                    }
                }  
                else if($data["isblock"]=='1'){
                    echo "<script>alert('Wait to admin verify')</script>";
                }   
            }
        }
        if($result==0){
            echo "<script>alert('No user Exist with this credentital')</script>";
        }
    }
}
?>