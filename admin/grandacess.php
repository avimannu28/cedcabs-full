<?php
include_once 'request.php';
    if(isset($_GET["id"])){
        $acess=new request();
        $acess->access($_GET["id"]);
    }
?>