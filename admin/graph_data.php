<?php
include '../ride/class.ride.php';
if (!isset($_SESSION["admin"])) {
 header("location:../Login.php");
}

$graph = new ride();
$data  = $graph->rideChart();
foreach ($data as $value) {
 $date           = $value['ride_date'];
 $earning        = $value['total_fare'];
 $result_array[] = ['date' => $date, 'earning' => $earning];
}
echo json_encode($result_array);
