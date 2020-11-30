<?php
    include_once './request.php';
    $delete=new request();
    if(isset($_GET["id"])){
        $delete->delete_location($_GET["id"]);
    }
?>