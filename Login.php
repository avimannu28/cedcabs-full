<?php
include_once './user.php';
$user = new User();
if (isset($_POST["submit"])) {
 $username = $_POST["username"];
 $password = $_POST["password"];
 $user->login($username, $password);
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
    <link rel="stylesheet" href="./assets/style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./user/datafetch.js"></script>
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
            <a href="index.php"><img class="navbar-brand img-responsive" src='./logo.png' height=100 width=200></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto pl-auto text-center" id='active'>
                    <li class="nav-item mr-4">
                        <a class="nav-link btn btn-dark" href="index.php?data=name" style='color:white'>Book Cab<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item ml-2">
                        <a class="nav-link" href="#">Feature</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
    </form>

    <div class="container-fluid bg-overlay" >
        <div class="row text-center" >
            <div class="col text-center" id="mid">
                <h1>Book a City Taxi to your destination in town</h1>
                <h4>Choose from range of category and prices</h4>
            </div>
        </div>
        <div class="ml-4 pb-4" id="side">
            <div class="container" >
                <div class="row" >
                    <div class="container" >
                        <div class="col col-sm-12 col-12 col-xs-12 mt-4 text-center p-1  py-0" id="book">
                            <p class='pt-2'>CEDCABS</p>
                        </div>
                    </div>
                    <div class="col col-sm-12 col-12 col-xs-12 mt-4">
                        <form method="POST" action="">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter UserName" name="username" pattern="[a-zA-Z][a-zA-Z0-9-_\.]{1,20}"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" name="password"
                                    required>
                            </div>
                            <input type="submit" name="submit" class="btn btn-dark ml-4  pl-4 pr-4 mt-4" value="LogIn">
                            <a href="signup.php" class="btn btn-dark pl-4 pr-4 ml-4 mt-4">SignUp</a>
                        </form>
                        <div class="form-group text-center">

                        </div>
                    </div>
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
