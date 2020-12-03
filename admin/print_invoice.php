<?php
include './request.php';
include_once './sidebar.php';
if ($_GET["id"]) {
 $invoice = new request();
 $status  = $invoice->invoice_status($_GET["id"]);
 $from    = $invoice->from_invoice($_GET["id"]);
 $to      = $invoice->to_invoice($_GET["id"]);
 $fare    = $invoice->fare_invoice($_GET["id"]);
}
if (!isset($_SESSION["admin"])) {
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
<script>
    $(document).ready(function(){
        $("#print").on('click',function(){
            $("#sidebar-wrapper").css("display","none")
            $("#print").css("display","none")
            window.print();
            $("#sidebar-wrapper").css("display","block")
            $("#print").css("display","block")
        })
    })
</script>

<body>

    <div class="container" style="margin-left:200px;">
        <div class="card">
            <div class="card-header">
                <span class="float-left"> <strong>Status:</strong><?php echo $status ?></span>
                <span class="float-right"> <strong>Invoice ID:</strong><?php echo "#" . $_GET["id"] ?></span>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>FROM</th>
                                <th>TO</th>
                                <th class="right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="center">
                                    1
                                </td>
                                <td class="left strong"><?php echo $from ?></td>
                                <td class="left"><?php echo $to ?></td>
                                <td class="right">$<?php echo $fare ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">

                    </div>

                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>

                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong><?php echo $fare ?></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button id='print' style="margin-left:200px;">Print this page</button>

                    </div>

                </div>

            </div>
</body>

</html>