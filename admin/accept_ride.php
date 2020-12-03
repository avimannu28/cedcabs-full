<?php
include_once './request.php';
if (isset($_GET["id"])) {
    $request = new request();
    $request->request_cab($_GET["id"]);
}
if (!isset($_SESSION["admin"])) {
 header("location:../Login.php");
}
