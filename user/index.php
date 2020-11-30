<?php 
session_start();
    include_once './fetch.php';
    $fetch=new Fetch();
    if(isset($_POST["logout"])){
        session_destroy();
        header("location:../Login.php");
    }
    if(isset($_SESSION["distance"])){
        header("location:../ride/ride.php");
    }
    if(!isset($_SESSION["isblock"])){
        header("location:../Login.php");
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
    <script src="data.js"></script>
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
                            <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item ml-2">
                            <a class="nav-link" href='edit_profile.php?id=<?php echo $_SESSION["user_id"] ?>'>Edit
                                Profile</a>
                        </li>
                        <li class="nav-item ml-2">
                            <a class="nav-link" href="user_profile.php">Rides Detail</a>
                        </li>
                        <form action="post">
                            <input type="submit" name="logout" value="logout"
                                style="background-color:white;border:none;">
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
        <div class="ml-4 pb-4" id="side">
            <div class="container">
                <div class="row">
                    <div class="container">
                        <div class="col col-sm-12 col-12 col-xs-12 mt-4 text-center p-1  py-0" id="book">
                            <p class='pt-2'>CEDCABS</p>
                        </div>
                    </div>
                    <div class="col col-sm-12 col-12 col-xs-12 mt-4">
                        <form method="POST" action="../ride/ride.php">
                            <div class="form-group col-xs-12">
                                <label for="exampleFormControlSelect1">Current Location</label>
                                <select class="form-control" name="current" id="current">
                                    <option>SELECT</option>
                                    <?php
                                        $location=$fetch->locations();
                                        foreach($location as $key=>$row){
                                            echo "<option value=$row[location_name]>$row[location_name]</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-xs-12">
                                <label for="exampleFormControlSelect1">Destination Location</label>
                                <select class="form-control" name="destination" id="destination">
                                    <option>SELECT</option>
                                    <?php
                                        foreach($location as $key=>$row){
                                            echo "<option value=$row[location_name]>$row[location_name]</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">CAB TYPE</label>
                                <select class="form-control" name="cab_type" id="datas">
                                    <option>SELECT</option>
                                    <option>CedMicro</option>
                                    <option>CedMini</option>
                                    <option> CedRoyal</option>
                                    <option> CedSUV</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Luggage Weight" name="luggage"
                                    id="luggages">
                            </div>
                            <input type="text" name="price" id="Price" style="display:none;">
                            <input type="submit" class="btn btn-success  pl-4 pr-4 mt-4" name="submit" value='book'
                                id="books" style="display:none;">
                            <button class="btn btn-success  pl-4 pr-4 mt-4" value="Calculate Fare" id="submit">Calculate
                                Fare</button>
                        </form>
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