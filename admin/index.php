<?php
include './sidebar.php';
include_once './request.php';
$all = new request();
if (!isset($_SESSION["admin"])) {
 header("location:../Login.php");
}
if (isset($_POST['logout'])) {
 session_destroy();
 header("location:../Login.php");
}
$ride_request = $all->ride_request();
$user_request = $all->user_request();
$user         = $all->alluser();
$ride         = $all->allrides();
$location     = $all->location();
$total        = $all->total_earning();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/admin.css">
</head>

<body>
    <div class="container" style="margin-left:200px;">
        <div class="alert alert-warning fade collapse" role="alert" id="myAlert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Holy guacamole!</strong> It's free.. this is an example theme.
        </div>

        <div class="row mb-3">
            <div class="col-xl-6 col-lg-6 pt-4">
                <a href="fetch_user_ride.php" style="color:black;text-decoration:none">
                    <div class="tiles tiles-inverse tiles-success text-center">
                        <div class="card-block bg-success">
                            <div class="rotate">
                            </div>
                            <h4 class="text-uppercase">Ride Request</h4>
                            <h1 class="display-1"><?php echo count($ride_request); ?></h1>
                        </div>
                    </div>
            </div>
            </a>
            <div class="col-xl-6 col-lg-6  pt-4">
                <a href="allrides.php" style="color:black;text-decoration:none">
                    <div class="tiles tiles-inverse tiles-danger text-center">
                        <div class="tiles-block bg-danger">
                            <div class="rotate">
                            </div>
                            <h4 class="text-uppercase">All Rides</h4>
                            <h1 class="display-1"><?php echo count($ride) ?></h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-6 col-lg-6 pt-4">
                <a href="all_user.php" style="color:black;text-decoration:none">
                    <div class="card card-inverse card-info">
                        <div class="card-block bg-info text-center">
                            <div class="rotate">
                                <i class="fa fa-twitter fa-5x"></i>
                            </div>
                            <h4 class="text-uppercase">All User</h4>
                            <h1 class="display-1"><?php echo count($user); ?></h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-6 col-lg-6 pt-4">
                <a href="fetch_user_request.php" style="color:black;text-decoration:none">
                    <div class="card card-inverse card-warning">
                        <div class="card-block bg-warning text-center">
                            <div class="rotate">
                                <i class="fa fa-share fa-5x"></i>
                            </div>
                            <h4 class="text-uppercase">User Request</h4>
                            <h1 class="display-1"><?php echo count($user_request) ?></h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-6 col-lg-6 pt-4">
                <a href="manage_location.php" style="color:black;text-decoration:none">
                    <div class="card card-inverse card-success">
                        <div class="card-block bg-success text-center">
                            <div class="rotate">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <h4 class="text-uppercase">Total Location</h4>
                            <h1 class="display-1"><?php echo count($location); ?></h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-6 col-lg-6 pt-4">
                <a href="Total_earning.php" style="color:black;text-decoration:none">
                    <div class="card card-inverse card-warning">
                        <div class="card-block bg-warning text-center">
                            <div class="rotate">
                                <i class="fa fa-share fa-5x"></i>
                            </div>
                            <h4 class="text-uppercase">Total Earning</h4>
                            <h1 class="display-1">$ <?php echo $total ?></h1>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>