<?php
session_start();
include_once './fetch.php';
if (isset($_GET["id"])) {
 $fetch = new Fetch();
 $name  = $fetch->name_for_edit($_GET["id"]);
 $phone = $fetch->phone_for_edit($_GET["id"]);
}
if (!isset($_SESSION["isblock"])) {
 header("location:../Login.php");
}
if (isset($_POST["logout"])) {
 session_destroy();
 header("location:../Login.php");
}
if (isset($_POST["submit"])) {
 $name  = $_POST["name"];
 $phone = $_POST["phone"];
 if ($name == '' || $phone == '') {
  echo '<script>alert("FILL ALL THE FIELD")</script>';
 } else {
  $fetch->update_profile($name, $phone, $_GET["id"]);
  echo "<script>alert('Sucessfully updated')</scipt>";
  header("location:index.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../assets/form.css">

</head>
<script>
    $(document).ready(function(){
        $("#phone").on("keyup",function(){
            number=$("#phone").val()
            if(isNaN(number)){
                number = number.slice(0, -1);
                $("#phone").val(number);
            }
            if(number>=9999999999){
                number = number.slice(0, -1);
                $("#phone").val(number)
            }
        })
    })
</script>


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
                            <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item mr-4">
                            <a class="nav-link" href="dashboard.php">Dashboard<span class="sr-only">(current)</span></a>
                        </li>
                        <li>
                        <div class="dropdown show">
                            <a class="btn btn-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Edit Profile
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="nav-link" href='edit_profile.php?id=<?php echo $_SESSION["user_id"] ?>'>Update Info</a>

                            <a class="nav-link" href='password.php?id=<?php echo $_SESSION["user_id"] ?>'>Update Password</a>
                            </div>
                        </div>
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
        </div>
    <div class="container-fluid dash_cus">
        <div class="container">
            <div class="row pt-4">
                <div class="col-sm-6">
                    <div class="user_info">
                        <div class="col-sm-12" style="margin-left:490px;width:50%;">
                            <h2 style="color:white">EDIT DATA</h2>
                        </div>
                        <div class="col-sm-12" style="margin-left:400px;">
                            <div class="form-group row">
                                <form method="POST">
                                    <div id="sc-edprofile">
                                        <h1>Edit Profile Form</h1>
                                        <div class="sc-container">
                                            <input type="text" placeholder="Name" name="name"
                                                value=<?php echo $name; ?> />
                                                <input type="text" id="phone" name="phone" placeholder="123-45-678"   value=<?php echo $phone ?> required>
                                            <!-- <input type="number" placeholder="Phone" name="phone"
                                                value=<?php echo $phone ?> /> -->
                                            <input type="submit" value="Update" name="submit" />
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
</body>

</html>