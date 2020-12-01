<?php 
include_once './class.ride.php';
$ride=new ride();


 if(isset($_POST["submit"])){
     $_SESSION["current"] = $_POST["current"]; 
     $_SESSION["destination"] = $_POST["destination"];
     $_SESSION["total"]=$_POST["price"];
     $_SESSION["cab_type"]=$_POST["cab_type"];

     //check for luggage type if null then
    if( $_SESSION["cab_type"]=="CedMicro"){
        $_SESSION["luggage"]=0;
    }else{
        $_SESSION["luggage"]=$_POST["luggage"];
    }
    if($_SESSION["luggage"]==""){
        $_SESSION["luggage"]=0;
    }
}


   //check if the user is login or not
    if(!isset($_SESSION["isblock"])){
        header("location:../Login.php");
    }
    else{
        if(!isset($_SESSION["booked"])){
            $ride->rider($_SESSION["current"], $_SESSION["destination"],$_SESSION["distance"],$_SESSION["luggage"],$_SESSION["total"],$_SESSION["user_id"]);
            echo "<script>alert('wait for to confirm')</script>";
            echo "<script>alert('Rrefresh Again')</script>";
            
           
        }else{
            $ride->ride_success();
            header("location:../user/user_invoice.php");
          
        }

    }

    //logout
    if(isset($_POST["logout"])){
        session_destroy();
        header("location:../Login.php");
    }

  

  

    
    

   
?>

<?php 

   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>


<body>
    <form method="post">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <img class="navbar-brand img-responsive" src='../logo.png' height=100 width=200>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto pl-auto text-center" id='active'>
                        <li class="nav-item mr-4">
                            <a class="nav-link" href="../user/index.php">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ml-2">
                            <a class="nav-link" href="#">Feature</a>
                        </li>
                        <li class="nav-item ml-4">
                            <a class="nav-link" href="#">Our Services</a>
                        </li>
                        <li class="nav-item ml-4">
                            <input type="submit" class="nav-link" value="Logout" name="logout"
                                style="border:none;background-color:white;">
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

    <?php echo "<h1 style='text-align:center margin-bottom:100px;'>PLEASE WAIT AND REFRESH AGAIN TO GET INVOICE</h1>" ?>

        <footer class="page-footer font-small blue">
            <div class="row">
                <div class="col-sm-4 text-center py-3">
                    <a href="#" class="fa fa-facebook "></a>
                    <a href="#" class="fa fa-twitter "></a>
                    <a href="#" class="fa fa-instagram "></a>
                </div>
                <div class="col-sm-4 copyright" id="">
                    <div class="footer-copyright text-center py-3">© 2020 Copyright:
                        <a href="#">CedCabs</a>
                    </div>
                </div>
                <div class="col-sm-4 px-0 mx-0 copyright">
                    <div class="footer-copyright text-center py-3">Designed By:
                        <a href="#">CedCabs Developer</a>
                    </div>
                </div>

            </div>

        </footer>



</body>

</html>