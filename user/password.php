<?php
include_once './fetch.php';
session_start();
if (!isset($_SESSION["isblock"])) {
 header("location:../Login.php");
}
if (isset($_POST["logout"])) {
 session_destroy();
 header("location:../Login.php");
}
if (isset($_GET['id'])) {
 if (isset($_POST["submit"])) {
  $firstpassword = $_POST["firstpassword"];
  $secound       = $_POST["secoundpassword"];
  if ($firstpassword == "" || $secound == "") {
   echo "<script>alert('Fill All The Field')</script>";
  } else {
   if ($firstpassword == $secound) {
    $password = new Fetch();
    $pass=$password->change_password($_POST["secoundpassword"], $_GET["id"]);
    if($pass==1){
     echo "<script>alert('Same password Entered')</script>";
    }
    if($pass==2){
    unset($_SESSION["isblock"]);
    header("location:../Login.php");
    }
   } else {
    echo "<script>alert('BOTH FIELD PASSWORD ARE NOT SAME')</script>";
   }
  }

 }
}

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
    <script src="../script/datafetch.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../assets/password.css">
</head>


<body>
    <form method="post">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a href='index.php'><img class="navbar-brand img-responsive" src='../logo.png' height=100 width=200></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto pl-auto text-center" id='active'>
                        <li class="nav-item mr-4">
                            <a class="nav-link" href="dashboard.php">DashBoard<span class="sr-only">(current)</span></a>
                        </li>
                        <li>
                            <div class="dropdown show">
                                <a class="btn btn-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Edit Profile
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="nav-link"
                                        href='edit_profile.php?id=<?php echo $_SESSION["user_id"] ?>'>Update Info</a>

                                    <a class="nav-link" href='password.php?id=<?php echo $_SESSION["user_id"] ?>'>Update
                                        Password</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item ml-2">

                        <li>
                            <div class="dropdown show">
                                <a class="btn btn-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Ride
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="pending.php">Pending</a>
                                    <a class="dropdown-item" href="canceled.php">Canceled</a>
                                    <a class="dropdown-item" href="completed.php">Completed</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item ml-2">

                        </li>
                        <form action="post">
                            <input type="submit" name="logout" value="logout"
                            style="background-color:white;border:none;border:1px solid black;background-color:black;color:white">
                        </form>
                    </ul>
                </div>
            </nav>
        </div>
    </form>
    <div class="container-fluid bg-overlay">
        <div class="row text-center">
            <div class="col text-center" id="mid">
                <h1>Book a City Taxi to your destination in town</h1>
                <h4>Choose from range of category and prices</h4>
            </div>

        </div>
        <div class="card login-form" style="margin-left:400px;width:40%;margin-top:100px;margin-bottom:100px;">
            <div class="card-body">
                <h3 class="card-title text-center">Change password</h3>

                <!--Password must contain one lowercase letter, one number, and be at least 7 characters long.-->

                <div class="card-text">
                    <form method='post'>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Your new password</label>
                            <input type="password" name="firstpassword" class="form-control form-control-sm" placeholder="enter new password">
                        </div>
                        <div class="form-group" style="margin-bottom:50px;">
                            <label for="exampleInputEmail1">Repeat password</label>
                            <input type="password" name="secoundpassword" class="form-control form-control-sm"  placeholder="re-enter new password">
                        </div>
                        <button type="submit" name="submit" class="btn btn-dark btn-block submit-btn">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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