<?php
session_start();
if($_SESSION['PERMISSION'] == 'A')
{ 
include 'db.php';

$orderid = $_GET['orderid'];
$sql =  "DELETE FROM `order` WHERE id=$orderid";

$pdo->query($sql);

header("Location: order_list.php");
}