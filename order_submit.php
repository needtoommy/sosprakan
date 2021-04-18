<?php

session_start();
if($_SESSION['PERMISSION'] == 'A')
{ 
include 'db.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$plateid = $_POST['plateid'];
$car_num_body = $_POST['car_num_body'];
$prb = $_POST['prb'];
$lastprice = $_POST['lastprice'];
$payment = $_POST['payment'];
$datetime_getmoney = $_POST['datetime_getmoney'];
$datetime_policy = $_POST['datetime_policy'];
// $datetime_getmoney = date_format(date_create($_POST['datetime_getmoney']),"d-m-Y H:i:s");
$delivery_code = $_POST['delivery_code'];
// $datetime_policy = date_format(date_create($_POST['datetime_policy']),"d-m-Y H:i:s");
$orderid = $_POST['orderid'];

$datetime = date('d-m-Y h:i:s');

$sql = "UPDATE `order` SET firstname='$firstname' , lastname='$lastname' , car_plate='$plateid', car_num_body='$car_num_body', prb='$prb', lastprice='$lastprice', payment='$payment', delivery_code='$delivery_code', datetime_getmoney='$datetime_getmoney', datetime_policy='$datetime_policy', update_datetime='$datetime' WHERE id='$orderid'";

$pdo->query($sql);

header("Location: order_detail.php?orderid=".$orderid);
}
?>