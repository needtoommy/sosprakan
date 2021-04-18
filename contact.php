<?php 
session_start();
include 'connect/db.php';
$db = new DB();

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$detail = $_POST['detail'];

$sql = "INSERT INTO contact (fullname,email,detail) VALUES ('$fullname','$email','$detail')";

if($db->Execute($sql)){
    echo 'success';
}
?>