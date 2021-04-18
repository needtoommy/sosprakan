<?php 
session_start();
if($_SESSION['PERMISSION'] == 'A')
{ 
include 'db.php';
$stmt = $pdo->query('DELETE  FROM product where productid = "'.$_POST['productid'].'"');
echo "success";
}
?>