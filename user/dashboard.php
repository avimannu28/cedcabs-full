<?php 
include_once './fetch.php';
session_start();
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
$total_ride=new Fetch();
$sum=$total_ride->total_ride_of_user($_SESSION["user_id"]);
$total_Spend=$total_ride->total_spend_of_user($_SESSION["user_id"]);
$pendind_ride=$total_ride->ride_pending($_SESSION["user_id"]);
$completed_ride=$total_ride->ride_completed($_SESSION["user_id"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="../assets/user.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="./script/datas.js"></script>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
        <link rel="stylesheet" href="../assets/user.css">
        <link rel="stylesheet" href="../assets/style1.css">
    </head>

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
                            <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                        </li>
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
                            <a class="nav-link" href='edit_profile.php?id=<?php echo $_SESSION["user_id"] ?>'>Edit
                                Profile</a>
                        </li>
                        <li class="nav-item ml-2">

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
    <div id="root">
        <div class="container pt-5">
            <div class="row align-items-stretch">
                <div class="c-dashboardInfo col-lg-3 col-md-6">
                    <div class="wrap">
                        <a href="user_profile.php">
                            <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Total
                                Ride<svg class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24"
                                    aria-hidden="true" role="presentation">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                                    </path>
                                </svg></h4><span
                                class="hind-font caption-12 c-dashboardInfo__count"><?php echo $sum  ?></span>
                    </div>
                    </a>
                </div>
                <div class="c-dashboardInfo col-lg-3 col-md-6">
                    <div class="wrap">
                        <a href="user_profile.php">
                            <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Total
                                Spend<svg class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24"
                                    aria-hidden="true" role="presentation">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                                    </path>
                                </svg></h4><span
                                class="hind-font caption-12 c-dashboardInfo__count"><?php echo $total_Spend ?></span><span
                                class="hind-font caption-12 c-dashboardInfo__subInfo"></span>
                        </a>
                    </div>
                </div>
                <div class="c-dashboardInfo col-lg-3 col-md-6">
                    <div class="wrap">
                        <a href="pending.php">
                            <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">PENDING
                                RIDE<svg class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24"
                                    aria-hidden="true" role="presentation">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                                    </path>
                                </svg></h4><span
                                class="hind-font caption-12 c-dashboardInfo__count"><?php echo $pendind_ride; ?></span>
                        </a>
                    </div>
                </div>
                <div class="c-dashboardInfo col-lg-3 col-md-6">
                    <div class="wrap">
                        <a href="completed.php">
                            <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title">Completed
                                Ride<svg class="MuiSvgIcon-root-19" focusable="false" viewBox="0 0 24 24"
                                    aria-hidden="true" role="presentation">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z">
                                    </path>
                                </svg></h4><span
                                class="hind-font caption-12 c-dashboardInfo__count"><?php echo $completed_ride; ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="page-footer font-small blue mt-4">
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