<?php
include_once './request.php';
if (isset($_GET["id"])) {
 $completed = new request();
 $completed->delete_completed($_GET["id"]);
}
if (!isset($_SESSION["admin"])) {
 header("location:../Login.php");
}
