<?php


include '../ride/class.ride.php';
$graph=new ride();
$data=$graph->rideChart();
foreach($data as $value){
$date=$value['ride_date'];
$earning=$value['total_fare'];
$result_array[] =['date'=>$date,'earning'=>$earning];
}
echo json_encode($result_array);



?>