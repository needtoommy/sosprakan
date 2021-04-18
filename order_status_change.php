<?php
session_start();

if($_SESSION['PERMISSION'] == 'A')
{ 
include 'db.php';
$status = $_POST['status'];

$sql = "UPDATE `order` set status = '$status' where id = ".$_POST['orderid']."";
$q = $pdo->query($sql);

$array = array('success', $_POST['orderid']);
echo json_encode($array);
exit;

}
