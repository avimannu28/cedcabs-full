<?php

  if(isset($_POST['logout'])){
    session_destroy();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../assets/fetchuser.css">
</head>


<body>


    <div id="wrapper" class="active">
        <div id="sidebar-wrapper">
            <ul id="sidebar_menu" class="sidebar-nav">
                <li class="sidebar-brand"><a id="menu-toggle" href="index.php">Menu<span id="main_icon"
                            class="glyphicon glyphicon-align-justify"></span></a></li>
            </ul>
            <ul class="sidebar-nav" id="sidebar">
                <b>
                    <li><a href="#" style="color:aqua">Rides</a></li>
                </b>

                <li><a href="completed_ride.php">>Complet Rides-</a></li>
                <li><a href="allrides.php">>All Rides</a></li>
                <li><a href="fetch_user_ride.php">>Ride Request</a></li>


                <b>
                    <li><a href="#" style="color:aqua">User</a></li>
                </b>

                <li><a href="all_user.php">>Unblocked User</a></li>
                <li><a href="fetch_user_request.php">>Blocked/request</a></li>


                <b>
                    <li><a href="#" style="color:aqua">Location</a></li>
                </b>
                <li><a href="manage_location.php">>Edit Location</a></li>
                <li><a href="add_location.php">>Add Location</a></li>

                <b>
                    <li><a href="#" style="color:aqua">Invoice</a></li>
                </b>
                <li><a href="invoice.php">>User Invoices</a></li>


                <li><a href="Total_earning.php">>Total Earning</a></li>
                <form method="post">
                    <input type="submit" value="Logout" name='logout'
                        style="padding-right:92px;text-align:center;background-color:#252525;color:white">
                </form>

            </ul>
        </div>

        <!-- Page content -->
        <div id="page-content-wrapper">
            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>