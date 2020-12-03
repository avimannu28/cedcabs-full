<?php
include_once './request.php';
if (isset($_GET["id"])) {
 $delete = new request();
 $delete->deleteuser($_GET["id"]);

}
if (!isset($_SESSION["admin"])) {
 header("location:../Login.php");
}