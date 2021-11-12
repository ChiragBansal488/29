<?php

session_start();

include 'dbcon.php';

if (isset($_GET['order_id']))
{
    $order_id=$_GET['order_id'];
    $deleteQuery="DELETE FROM invoice_order where order_id=$order_id"; 
    mysqli_query($con, $deleteQuery);
    $delete="DELETE FROM invoice_order_item where order_id=$order_id"; 
    mysqli_query($con, $delete);

    echo "<script>window.location = 'invoice_list.php';</script>";
} else {
    echo "ERR!";
}


?>