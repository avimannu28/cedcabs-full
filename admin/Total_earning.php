<?php

include './sidebar.php';
include_once './request.php';
$earning = new request();
$sum     = $earning->total_earning();
echo "<h1 style='text-align:center'>$$sum</h1>";
if (!isset($_SESSION["admin"])) {
 header("location:../Login.php");
}
if (isset($_POST['logout'])) {
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
</head>

<body>
    <div class="container-fluid">

        <!-- plot Graph       -->

        <table class="table table-bordered table-striped table-striped" style="margin-left:200px;width:70%">
            <tr>
                <td><canvas id="bar_canvas"></canvas><br>
                    <b>BAR Chart</b>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $.ajax({
        url: "graph_data.php",
        method: "GET",
        success: function(data) {
            var data = JSON.parse(data);
            console.log(data);
            var date = [];
            var earning = [];

            for (var i in data) {
                sum = 0;
                sum = sum + data[i].earning;
                date.push(data[i].date);
                earning.push(sum);
            }
            console.log(date);

            var chartdata = {
                labels: date,
                datasets: [{
                    label: 'Earning:',
                    backgroundColor: 'rgba(200, 200, 200, 0.75)',
                    borderColor: 'rgba(200, 200, 200, 0.75)',
                    hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                    hoverBorderColor: 'rgba(200, 200, 200, 1)',
                    data: earning
                }]
            };
            var bar_canvas = $("#bar_canvas");
            var barGraph = new Chart(bar_canvas, {
                type: 'bar',
                data: chartdata,

            });
        },
        error: function(data) {
            console.log(data);
        }
    });

});
</script>


</body>

</html>
